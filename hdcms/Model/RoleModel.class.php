<?php
/**
 * 角色模型
 * Class RoleModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class RoleModel extends CommonModel
{
    public $join = array(
        "access" => array(
            "type" => HAS_MANY,
            "foreign_key" => "rid",
            "parent_key" => "rid"
        ),
        "user_role" => array(
            "type" => "HAS_MANY",
            "foreign_key" => "rid",
            "parent_key" => "rid"
        )
    );
}