<?php
/**
 * 会员登录
 * Class LoginControl
 */
class LoginControl extends MemberAuthControl
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

    //校验验证码
    public function check_code()
    {
        if ($_SESSION['code'] == strtoupper($_POST['code'])) {
            echo 1;
            exit;
        }
    }

    //注册
    public function reg()
    {
        if (IS_POST) {
            //会员注册状态  审核或不审核
            $_POST['status'] = C("member_verify");
            $_POST['gid'] = C("DEFAULT_USER_GROUP");
            if ($this->db->create()) {
                if ($uid = $this->db->join()->add()) {
                    $user = $this->db->join("member_group")->find($uid);
                    $_SESSION['uid'] = $uid;
                    $_SESSION['gid'] = $user['gname'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['favicon'] = __ROOT__ . "/hdcms/static/img/avatar.jpg";
                    $this->ajax_return(1, "注册成功");
                }
            } else {
                $this->ajax_return(0, $this->db->error);
            }
        } else {
            $this->display();
        }
    }

    /**
     * 用户登录处理
     * @access public
     */
    public function Login()
    {
        if (IS_POST) {
            $username = Q("post.username", NULL, "strip_tags,htmlspecialchars,addslashes");
            $password = Q("post.password", NULL, "md5");
            $user = $this->db->where("username='$username' AND password='$password'")->find();
            if ($user) {
                $_SESSION = array_merge($_SESSION, array(
                    "uid" => $user['uid']
                ));
                $_SESSION['username'] = $user['username'];
                $_SESSION['rid'] = $user['rid'];
                $_SESSION['rname'] = $user['rname'];
                $_SESSION['favicon'] = empty($user['favicon']) ? __ROOT__ . "/hdcms/static/img/avatar.jpg" : __ROOT__ . '/' . $user['favicon'];
                //修改登录IP与时间
                $this->db->save(array(
                    "uid" => $user['uid'],
                    "logintime" => time(),
                    "ip" => ip_get_client()
                ));
                $this->ajax_return(1, "登录成功");
            }
            $this->ajax_return(0, "用户名或密码输入错误");
        } else {
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