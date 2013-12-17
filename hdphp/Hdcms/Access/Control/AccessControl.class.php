<?php
/**
 * 后台rbac权限管理
 * Class AccessControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AccessControl extends AuthControl
{
    //模型
    public $db;
    //角色rid
    public $rid;

    public function __init()
    {
        parent::__init();
        $this->db = K("Access");
    }

    //设置权限
    public function set_access()
    {
        if (IS_POST) {
            $rid = Q("post.rid");
            $this->db->where(array("rid" => $rid))->del();
            if (!empty($_POST['nid'])) {
                foreach ($_POST['nid'] as $v) {
                    $this->db->add(
                        array("rid" => $rid, "nid" => $v)
                    );
                }
            }
            $this->_ajax(1);
        } else {
            $rid = Q("get.rid");
            $node = $this->db->table("node")->where("menu_type=1")->all();
            $access = array();
            foreach ($node as $v) {
                $t=$this->db->table("access")->find(array("rid"=>$rid,"nid"=>$v['nid']));
                $v['f_html'] = $t?
                    "<label><input type='checkbox' name='nid[]' checked='checked' value='{$v['nid']}'/> {$v['title']}</label>" :
                    "<label><input type='checkbox' name='nid[]' value='{$v['nid']}'/>  {$v['title']}</label>";
                $access[] = $v;
            }
            $access = Data::channelList($access, 0, "─", 'nid');
            $access = Data::tree($access, false, "nid");
            $access = Data::channelLevel($access, 0, "", "nid");
            $this->assign("rid", $rid);
            $this->assign("node", $access);
            $this->display();
        }
    }
}

?>