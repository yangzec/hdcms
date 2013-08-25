<?php
class RoleControl extends RbacControl
{
    public function index()
    {
        $role = M("role")->where("type=1")->all();
        $this->assign("role", $role);
        $this->display();
    }

    /**
     * 添加角色
     */
    public function add()
    {
        if (isset($_POST['rname'])) {
            $db = M("role");
            $db->add();
            $this->success("角色添加成功", "index");
        } else {
            $this->display();
        }
    }

    /**
     * 编辑角色
     */
    public function edit()
    {
        if (isset($_POST['rid'])) {
            $db = M("role");
            $db->save();
            $this->success("角色修改成功", "index");
        } else {
            $rid = $this->_get("rid", "intval");
            $this->assign("field", M("role")->find($rid));
            $this->display();
        }
    }

    /**
     * 删除角色
     */
    public function del()
    {
        $rid = $this->_get("rid", "intval");
        $rid or $this->error("非法操作");
        $db = M("user_role");
        if ($db->where("rid=$rid")->find()) {
            $this->error("当前角色有用户，不可以删除", "index");
        }
        //没有用户存在，可以删除角色
        $db->table("role")->del($rid);
        $this->success("角色删除成功", "index");
    }

}

?>