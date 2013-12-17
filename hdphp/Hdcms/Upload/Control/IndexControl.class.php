<?php
class IndexControl extends Control
{
    protected $db;

    public function __construct()
    {
        $this->db = K("Upload");
    }

    public function index()
    {
        $count = $this->db->count();
        $page = new Page($count);
        $this->assign("page", $page->show());
        $upload = $this->db->order("id desc")->limit($page->limit())->all();
        $this->assign("upload", $upload);
        $this->display();
    }

    //删除附件
    public function del()
    {
        $id = Q("request.id", null, "intval");
        if ($id) {
            $file = $this->db->find($id);
            @unlink($file['path']);
            $this->db->del($id);
            $this->_ajax(array(
                "stat" => 1,
                "msg" => "删除成功!"
            ));
        }
        $this->_ajax(array(
            "stat" => 0,
            "msg" => "删除失败!"
        ));
    }
}