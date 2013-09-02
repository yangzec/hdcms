<?php
class LoginControl extends Control
{

    /**
     * 登录页面
     * @access public
     */
    public function index()
    {
        if(isset($_SESSION['uid']) && isset($_SESSION['RBAC'])){
            go("index/index");
        }
        $this->display();
    }

    /**
     * 登录页面显示验证码
     * @access public
     */
    public function code()
    {
        C(array(
            "CODE_BG_COLOR" => "#ffffff",
            "CODE_FONT_COLOR" => "",
            "CODE_LEN" => 4,
            "CODE_FONT_SIZE" => 22,
            "CODE_WIDTH" => 150,
            "CODE_HEIGHT" => 45,
        ));
        $code = new Code();
        $code->show();
    }

    /**
     * 验证码验证
     */
    public function checkCode()
    {
        if (strtoupper($_POST['code']) == $_SESSION['code']) {
            echo 1;
            exit;
        }
    }

    /**
     * 用户登录处理
     * @access public
     */
    public function Login()
    {
        $username = $this->_post("username");
        $password = md5($_POST['password']);
        if (!Rbac::login($username, $password, 'admin')) {
            $this->error(Rbac::$error, 'index/login');
        }
        $user = M("user")->find(session("uid"));
        $role = M("role")->find($_SESSION['rid']);//角色信息
        $_SESSION['type'] = $role['type']; //帐号类型 1后台管理 2 普通用户
        session("realname", $user['realname']);
        go("Index/index");
    }

    /**
     * 退出
     */
    public function out()
    {
        //清空SESSION
        session(NULL);
        echo "<script>
            window.top.location.href='".U("index")."';
        </script>";
    }
}