<?php
/**
 * 用户表关联模型
 * Class UserModel
 */
class UserViewModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        "member_group" => array(
            "type" => INNER_JOIN,
            "on" => "user.gid=member_group.gid"
        )
    );
}