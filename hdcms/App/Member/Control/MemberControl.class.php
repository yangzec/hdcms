<?php
class MemberControl extends AuthControl
{
    protected $db;

    public function __init()
    {
        parent::__init();
        $this->db = K("User");
    }

    //会员列表
    public function index()
    {
        $user = $this->db->where("rid=0")->all();
        $this->assign("user", $user);
        $this->display();
    }

    //需要审核会员列表
    public function verify()
    {
        $user = $this->db->where("rid=0 and status!=1")->all();
        $this->assign("user", $user);
        $this->display();
    }

    //验证用户是否存在
    public function check_admin()
    {
        $username = Q("post.username", NULL, "trim");
        if ($this->db->join()->find("username='$username'")) {
            $this->_ajax(0);
        } else {
            $this->_ajax(1);
        }
    }

    //删除管理员
    public function del()
    {
        $uid = Q("POST.uid", null, "intval");
        if ($uid) {
            //用户组关联表
            if ($this->db->where("uid=$uid AND uid!=1")->del()) {
                $this->_ajax(array("stat" => 1, "msg" => "删除管理员成功！"));
            }
        }
        $this->_ajax(array("stat" => 0, "msg" => "删除管理员失败！"));
    }

    //添加管理员
    public function add()
    {
        if (IS_POST) {
            if ($this->db->create()) {
                if ($this->db->join(NULL)->add()) {
                    $this->_ajax(1);
                }
            }
        } else {
            $group = $this->db->table("member_group")->all();
            $this->assign("group", $group);
            $this->display();
        }
    }

    //修改用户资料
    public function edit()
    {
        if (IS_POST) {
            //不需要自动验证处理
            $this->db->validate = array();
            $this->db->auto = array(array("password", "md5", 3, 3, "function"));
            if ($this->db->create()) {
                if ($this->db->save()) {
                    $this->_ajax(1);
                }
            }
        } else {
            $uid = Q("request.uid", null, "intval");
            if ($uid) {
                //会员信息
                $field = $this->db->find($uid);
                //所有角色
                $group = $this->db->table("member_group")->all();
                foreach ($group as $n => $r) {
                    $group[$n]["selected"] = "";
                    if ($r['gid'] == $field['gid']) {
                        $group[$n]["selected"] = "selected='selected'";
                    }
                }
                $this->assign("field", $field);
                $this->assign("group", $group);
                $this->display();
            }
        }
    }

    //锁定用户
    public function lock_user()
    {
        $uid = Q("uid", 0, "intval");
        if ($this->db->save(array("uid" => $uid, "status" => 2))) {
            $this->_ajax(1);
        }
    }

    //解锁用户
    public function unlock_user()
    {
        $uid = Q("uid", 0, "intval");
        if ($this->db->save(array("uid" => $uid, "status" => 1))) {
            $this->_ajax(1);
        }
    }
}