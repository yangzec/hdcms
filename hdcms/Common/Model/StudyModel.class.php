<?php
//DEBUG
class StudyModel extends ViewModel
{
//    public $table=TABLE;
    public $view = array(
        'user_role' => array(
            "on" => "user_role.uid=user.uid",
        ),
        'role'=>array(
            "on"=>"role.rid=user_role.rid"
        ),
        'flag_relation'=>array(
            "on"=>'.aid=flag_relation.aid'
        )
    );
}