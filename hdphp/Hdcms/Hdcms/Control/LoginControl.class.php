<?php
/**
 * 登录处理模块
 * Class LoginControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class LoginControl extends CommonControl
{
    //模型
    protected $db;

    //构造函数
    public function __init()
    {
        parent::__init();
        //实例模型对象
        $this->db = K("User");
    }

    /**
     * 登录页面
     * @access public
     */
    public function index()
    {
        go("login");
    }

    /**
     * 登录页面显示验证码
     * @access public
     */
    public function code()
    {
        C(array(
            "CODE_BG_COLOR" => "#ffffff",
            "CODE_LEN" => 4,
            "CODE_FONT_SIZE" => 20,
            "CODE_WIDTH" => 120,
            "CODE_HEIGHT" => 35,
        ));
        $code = new Code();
        $code->show();
    }

    /**
     * 用户登录处理
     * @access public
     */
    public function Login()
    {
        if (IS_POST) { //错误码 stat 状态  msg 错误信息
            $username = Q("post.username", NULL, "strip_tags,htmlspecialchars,addslashes");
            $user = $this->db->where("username='$username'")->find();
            if (!$user) {
                $stat = array("stat" => 0, "msg" => "帐号输入错误");
            } else if ($user['password'] != md5($_POST['password'])) {
                $stat = array("stat" => 0, "msg" => "密码输入错误");
            } else {
                $_SESSION = array_merge($_SESSION, array(
                    "uid" => $user['uid'],
                    "admin" => 1,
                ));
                //是否为超级管理员
                $_SESSION['WEB_MASTER'] = C("WEB_MASTER") == $user['username'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['realname'] = $user['realname'];
                $_SESSION['rid'] = $user['rid'];
                $_SESSION['rname'] = $user['rname'];
                $_SESSION['favicon'] = empty($user['favicon']) ? __ROOT__ . "/hdcms/static/img/avatar.jpg" : __ROOT__ . '/' . $user['favicon'];
                //获得角色信息
                $stat = array("stat" => 1, "msg" => "正在登录...");
                //修改登录IP与时间
                $this->db->save(array(
                    "uid" => $user['uid'],
                    "logintime" => time(),
                    "ip" => ip_get_client()
                ));
            }
            $this->assign("stat", json_encode($stat));
            $this->display("auth");
        } else {
            //已经登录的管理员直接登录后台
            if (isset($_SESSION['WEB_MASTER']) or isset($_SESSION['admin'])) {
                go("Hdcms/Index/index");
            }
            $this->display();
        }
    }

    /**
     * 退出
     */
    public function out()
    {
        //清空SESSION
        session(NULL);
        echo "<script>
            window.top.location.href='" . U("index") . "';
        </script>";
    }
}