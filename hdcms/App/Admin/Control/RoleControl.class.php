<?php
/**
 * 后台RBAC角色管理
 * Class RoleControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class RoleControl extends AuthControl
{
    protected $db;
    //角色rid
    protected $rid;

    public function __init()
    {
        $this->db = K("User");
        $this->rid = Q("request.rid", null, "intval");
    }

    public function index()
    {
        $role = M("role")->all();
        $this->assign("role", $role);
        $this->display();
    }

    //添加角色
    public function add()
    {
        if (IS_POST) {
            if ($this->db->create()) {
                if ($aid = $this->db->add()) {
                    $this->_ajax(array("stat" => 1, "msg" => "添加角色成功！"));
                }
            }
        } else {
            $this->display();
        }
    }

    //验证角色是否存在
    public function check_role()
    {

        $rname = Q("post.rname", NULL, "trim");
        $rid = Q("post.rid", NULL, "intval,trim");
        //编辑时验证
        if (is_null($rname)) {
            $this->_ajax(0);
        } else if (!is_null($rid)) {
            if ($this->db->join(NULL)->where("rid=$rid AND rname='$rname'")->find()) {
                $this->_ajax(1);
            } else if ($this->db->join(NULL)->where("rname ='$rname'")->find()) {
                $this->_ajax(0);
            }
        } else if (!$this->db->join(NULL)->where("rname ='$rname'")->find()) {
            $this->_ajax(1);
        }
        $this->_ajax(0);
    }

    /**
     * 编辑角色
     */
    public function edit()
    {
        if (Q("post.rid")) {
            $db = M("role");
            $db->save();
            $this->_ajax(array("stat" => 1, "msg" => "修改角色成功！"));
        } else {
            $this->assign("field", M("role")->find($this->rid));
            $this->display();
        }
    }

    //删除角色
    public function del()
    {
        $rid = Q("get.rid", null, "intval");
        if ($rid) {
            //用户组关联表
            if ($this->db->del($rid)) {
                $this->_ajax(array("stat" => 1, "msg" => "删除角色成功！"));
            }
        }
    }


}

?>