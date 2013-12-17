<?php
/**
 * 用户表关联模型
 * Class UserModel
 */
class UserModel extends RelationModel
{
    public $table = "user";
    //自动完成
    public $auto = array(
        array("username", "auto_user", 3, 3, "method"),
        array("logintime", "time", 3, 3, "function"),
        array("password", "md5", 3, 3, "function"),
        array("ip", "ip_get_client", 3, 3, "function")
    );
    //自动验证
    public $validate = array(
        array("username", "nonull", "用户名不能为空", 1, 3),
        array("password", "nonull", "密码不能为空", 1, 3),
        array("password", "confirm:c_password", "两次密码不一致", 1, 3),
        array("code", "nonull", "验证码不能为空", 1, 3),
        array("code", "validate_code", "验证码输入错误", 1, 3),
    );

    public function __init()
    {
        if (C("reg_show_code")==1) {
            $this->validate[] = array("code", "nonull", "验证码不能为空", 1, 3);
            $this->validate[] = array("code", "validate_code", "验证码输入错误", 1, 3);
        }
    }

    //验证码验证
    protected function validate_code($name, $value, $msg, $arg)
    {
        if (strtoupper($value) == Q("session.code")) {
            return true;
        }
        return $msg;
    }

    //username自动完成
    protected function auto_user($data)
    {
        return data_format($data);
    }

    public $join = array(
        "member_group" => array(
            "type" => BELONGS_TO,
            "foreign_key" => "gid",
            "parent_key" => "gid"
        ),
        "role" => array(
            "type" => BELONGS_TO,
            'foreign_key' => 'rid',
            'parent_key' => 'rid'
        ),
        "extcredits" => array( //扩展积分表
            "type" => HAS_MANY,
            'foreign_key' => 'uid',
            'parent_key' => 'uid'
        ),
    );
}