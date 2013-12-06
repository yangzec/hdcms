<?php
/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthControl extends CommonControl
{
    public function __init()
    {
        //会员中心是否关闭
        if (C("member_open") == 0 && !isset($_SESSION['rid'])) {
            $this->display("./data/Template/close_member");
            exit;
        } else if (CONTROL == 'Login') {

        } else if (!isset($_SESSION['uid'])) {
            $this->error("你还没有登录", "Login/login");
        }
    }

}