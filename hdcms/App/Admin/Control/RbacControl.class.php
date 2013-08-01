<?php
require GROUP_PATH . 'Common/Control/CommonControl.class.php';
class RbacControl extends CommonControl
{
    public function __init()
    {
        $this->checkAccess();
        header("Cache-control: private");
    }

    /**
     * 权限验证
     */
    private function checkAccess()
    {

        if(!isset($_SESSION['uid'])){
            go(U("Login/index"));
        }
        if (!Rbac::checkAccess()) {
            $this->error("对不起你没有操作权限");
        }
//        p(session());
    }
}