<?php
class AuthControl extends CommonControl
{
    public function __init()
    {
        parent::__init();
        header("Cache-Control: no-cache, must-revalidate");
        header("Cache-control: private");
        if (!$this->checkAdminAccess()) {
            $this->error("你没有访问权限");
        }
    }

    //后台权限验证
    private function checkAdminAccess()
    {
        //站长放行
        if (session("WEB_MASTER") || session("admin")) {
            return TRUE;
        }
        //没有登录用户或非后台管理员跳转到登录入口
        if (!isset($_SESSION['uid']) or !isset($_SESSION['admin'])) {
            echo "<script>top.location.href='?a=Hdcms&c=Login'</script>";
            exit;
        }
        //检测后台权限
        $db = M("node");
        $db->where = array(
            "app" => APP,
            "control" => CONTROL,
            "method" => METHOD,
        );
        $node = $db->field("nid")->find();
        //node不存在的节点自动通过验证
        if (is_null($node)) {
            return true;
        } else {
            $db->table("access");
            $db->where = array(
                "nid" => $node['nid'],
                "rid" => session("rid")
            );
            return $db->find();
        }
    }
}