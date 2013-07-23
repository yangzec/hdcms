<?php
class LoginControl extends Control
{
    /**
     * 登录页面
     * @access public
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 登录页面显示验证码
     * @access public
     */
    public function code()
    {
        $code = new Code();
        $code->show();
    }

    /**
     * 用户登录处理
     * @access public
     */
    public function Login()
    {

    }
}