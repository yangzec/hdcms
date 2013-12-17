<?php
/**
 * 管理员管理模块
 * Class AdminControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AdminControl extends AuthControl
{
    public $db;

    public function __construct()
    {
        $this->db = K("User");
    }

    //管理员列表
    public function index()
    {
        $rid = Q("get.rid", "", "intval");
        $admin = $this->db->join("role")->where("rid>0")->where(array("rid" => $rid))->all();
        $this->assign("admin", $admin);
        $this->display();
    }

    //验证用户是否存在
    public function check_admin()
    {
        $username = Q("post.username", NULL, "trim");
        if (is_null($username) || !$this->db->join()->where("status=1")->find("username='$username'")) {
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
            if ($this->db->save(array("uid" => $uid, "rid" => 0))) {
                $this->_ajax(1);
            }
        }
    }

    //添加管理员
    public function add()
    {
        if (IS_POST) {
            $username = Q("post.username");
            if ($this->db->join(NULL)->where("username='$username'")->save()) {
                $this->_ajax(array("stat" => 1, "msg" => "添加管理员成功！"));
            }

            $this->_ajax(array("stat" => 0, "msg" => "添加管理员失败！"));
        } else {
            $role = $this->db->table("role")->all();
            $this->assign("role", $role);
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit()
    {
        if (IS_POST) {
            //不需要自动验证处理
            $this->db->validate = array();
            $this->db->auto = array(array("password", "md5", 3, 3, "function"));
            if ($this->db->create()) {
                if ($this->db->save()) {
                    $this->_ajax(array("stat" => 1, "msg" => "修改管理员成功！"));
                }
            }
            $this->_ajax(array("stat" => 0, "msg" => $this->db->error));
        } else {
            $uid = Q("request.uid", null, "intval");
            if ($uid) {
                //会员信息
                $field = $this->db->find($uid);
                //所有角色
                $role = $this->db->table("role")->all();
                foreach ($role as $n => $r) {
                    $role[$n]["selected"] = "";
                    if ($r['rid'] == $field['rid']) {
                        $role[$n]["selected"] = "selected='selected'";
                    }
                }
                $this->assign("field", $field);
                $this->assign("role", $role);
                $this->display();
            }
        }
    }
}
