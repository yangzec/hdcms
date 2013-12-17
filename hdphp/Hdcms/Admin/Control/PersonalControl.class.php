<?php
/**
 * 管理员个人信息管理模块
 * Class AdminControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class PersonalControl extends AuthControl
{
    public $db;

    public function __construct()
    {
        $this->db = K("User");
    }

    //编辑个人信息
    public function edit_info()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->_ajax(array("stat"=>1,"msg"=>"修改个人资料成功"));
            }
        } else {
            $user = $this->db->join(NULL)->find(session("uid"));
            $this->assign("user", $user);
            $this->display();
        }
    }

    //修改密码
    public function edit_password()
    {
        if (IS_POST) {
            Q("post.password", "", "md5");
            if ($this->db->save()) {
                $this->_ajax(1);
            }
        } else {
            $user = $this->db->join(NULL)->find(session("uid"));
            $this->assign("user", $user);
            $this->display();
        }
    }

    //验证密码
    public function check_password()
    {
        $uid = Q("session.uid");
        $old_password = Q("post.old_password", "", "md5");
        if ($this->db->join(NULL)->where(array("password" => $old_password, "uid" => $uid))->find()) {
            $this->_ajax(1);
        }
    }
}
