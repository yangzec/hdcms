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

        if(!isset($_SESSION['uid']) || !isset($_SESSION['RBAC'])){
            go(U("Login/index"));
        }
        //不需要验证的方法
        $noAuth=array(
            "thumbUpload",
            "updateFlag",
            "editorUploadImg",
            "selectTpl",
        );
        if(in_array(METHOD,$noAuth)){
            return true;
        }else if (!Rbac::checkAccess()) {
            $this->error("对不起你没有操作权限");
        }
    }
}