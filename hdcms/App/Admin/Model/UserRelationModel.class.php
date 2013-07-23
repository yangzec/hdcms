<?php
class UserRelationModel extends RelationModel
{
    public $join = array(
        "news" => array(
            "type" => "HAS_MANY",
            "foreign_key" => "cid"
        )
    );
}

?>