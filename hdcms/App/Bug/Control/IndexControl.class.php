<?php
/**
 *
 * Class IndexControl
 */
class IndexControl extends AuthControl
{
    //模型
    public $db;
    //角色rid
    public $rid;

    public function __init()
    {
        parent::__init();
        $this->db = M("Bug");
    }

    //反馈建议
    public function index()
    {
        $where = "status=1";
        $status = Q("get.status", NULL, "intval");
        if ($status) {
            $where = "status=" . $status;
        }
        $count = $this->db->where($where)->count();
        $page = new Page($count);
        $data = $this->db->where($where)->limit($page->limit())->order("bid DESC")->all();
        $this->assign("page", $page->show());
        $this->assign("data", $data);
        $this->display();
    }

    //解决反馈
    public function resolve()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->success("处理成功", "index", 1);
            }
        } else {
            $bid = Q("bid", NULL, "intval");
            if ($bid) {
                $field = $this->db->find($bid);
                $this->assign("field", $field);
                $this->display();
            }
        }
    }

    //删除反馈
    public function del()
    {
        $bid = Q("post.bid", NULL);
        if ($this->db->del($bid)) {
            $this->_ajax(1);
        }
    }
}

?>