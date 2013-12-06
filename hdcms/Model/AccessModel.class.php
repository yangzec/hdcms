<?php
/**
 * 权限模型
 * Class AccessModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class AccessModel extends ViewModel
{
    public $table = "access";
    public $view = array(
        "node" => array(
            "type" => RIGHT_JOIN,
            "on" => "access.nid=node.nid"
        )
    );
}