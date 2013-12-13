<?php
class ContentFlagModel extends ViewModel
{
    public $table = "content_flag";
    public $view = array(
        "flag" => array(
            "type"=>INNER_JOIN,
            "foreign_key" => "fid",
            "parent_key" => "fid",
            "on" => "content_flag.fid=flag.fid"
        )
    );
}