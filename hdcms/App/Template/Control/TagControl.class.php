<?php
/**
 * 模板标签
 * Class TagControl
 */
class TagControl extends AuthControl
{
    protected $db;

    public function __init()
    {
        parent::__init();
        $this->db = K("TemplateTag");
    }

    //显示所有标签
    public function index()
    {

    }

    //添加标签
    public function add()
    {
        $this->display();
    }
}