<?php
class AccessControl extends RbacControl
{
    /**
     * 权限设置
     */
    public function edit()
    {
        if (isset($_POST['node'])) {

            $rid = $this->_post("rid", "intval");
            $db = M("access");
            $db->delete("rid=$rid");
            foreach ($_POST['node'] as $n) {
                $d = explode("|", $n);
                $db->add(array("rid" => $rid, "nid" => $d[0], "level" => $d[1]));
            }
            $this->success("权限设置成功", U("Role/index"));
        } else {
            $rid = $this->_get("rid", "intval");
            if (!$rid) exit;
            $node = Rbac::getNodeList($rid);
            //分配level==2以下的节点 不包含Admin应用
            $this->assign("node", $node[1]['node']);
            $this->display();
        }
    }
}

?>