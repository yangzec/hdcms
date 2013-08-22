<?php

class AdminControl extends RbacControl
{
    public function index()
    {
        $db = M();
        $rid = $this->_get("rid", "intval");
        $where = $rid ? " WHERE r.rid=$rid AND r.type=2 " : " WHERE r.type=1";
        $pre = C("DB_PREFIX");
        $sql = "SELECT u.uid,username,rname,ip,email,realname,email,r.rid FROM " . $pre . "user AS u JOIN " . $pre . "user_role AS ur ";
        $sql .= " JOIN " . $pre . "role AS r ON u.uid=ur.uid and ur.rid =r.rid " . $where;
        $this->assign("user", $db->query($sql));
        $this->display();
    }

    /**
     * 验证用户是否存在
     */
    public function checkUser()
    {
        $username = $_POST['username'];
        if (!M("user")->find("username='$username'")) {
            echo 1;
            exit;
        }
    }

    /**
     * 添加管理员
     */
    public function add()
    {
        if (isset($_POST['username'])) {
            $db = M("user");
            if (M("user")->find("username='{$_POST['username']}'")) {
                $this->error("管理员已经存在");
            }
            $_POST['password'] = md5($_POST['password']);
            $uid = $db->add();
            $db->table("user_role")->add(array("uid" => $uid, "rid" => $_POST['rid']));
            $this->success("管理员添加成功", "index");
        } else {
            //type=1 管理员角色  type=0 前台会员
            $this->assign("role", M("role")->all("type=1"));
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit()
    {
        if (isset($_POST['username'])) {
            $db = M("user");
            $_POST['uid'] = $this->_post("uid", "intval");
            $_POST['username'] = $this->_post("username");
            $_POST['password'] = md5($_POST['password']);
            $_POST['rid'] = $this->_post("rid", "intval");
            $db->where = "uid={$_POST['uid']} and username='{$_POST['username']}'";
            if ($db->save() !== false) {
                //更改角色
                $db->table("user_role")->where("uid={$_POST['uid']}")->save();
            }
            $this->success("修改成功", "index");
        } else {
            $uid = $this->_get("uid", "intval");
            $uid or exit();
            $pre = C("DB_PREFIX");
            $sql = "SELECT u.uid,username,rname,ip,email,realname,email,r.rid FROM " . $pre . "user AS u JOIN " . $pre . "user_role AS ur ";
            $sql .= " JOIN " . $pre . "role AS r ON u.uid=ur.uid and ur.rid =r.rid WHERE u.uid=$uid";
            //type=1 管理员角色  type=0 前台会员
            $data = M()->query($sql);
            if (empty($data)) {
                $this->error("管理员不存在", "index");
            }
            $this->assign("field", $data[0]);
            $this->assign("role", M("role")->all("type=1"));
            $this->display();
        }
    }
}

?>