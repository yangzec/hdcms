<?php
class ContentViewModel extends ViewModel
{
    //栏目id
    protected $cid;
    //模型mid
    protected $mid;
    //模型缓存
    protected $model;
    //栏目缓存
    protected $category;

    //获得内容
    public function __construct()
    {
        $this->cid = intval(Q("get.cid") ? Q("get.cid") : Q("post.cid"));
        $this->mid = intval(Q("get.mid") ? Q("get.mid") : Q("post.mid"));
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $this->model = F("model", false, MODEL_CACHE_PATH);
        if (!$this->cid && !$this->mid) {
            error("ContentViewModel没有可操作的cid");
        }
        if ($this->cid) {
            $this->mid = $this->category[$this->cid]['mid'];
        }
        if ($this->mid) {
            //模型表
            $this->table = $this->model[$this->mid]['tablename'];
            //关联栏目表
            $this->view = array(
                "category" => array(
                    "type" => INNER_JOIN,
                    "on" => $this->table . ".cid=category.cid"
                )
            );
            //副表关联
            if ($this->model[$this->mid]['type'] == 1) {
                $this->view [$this->table . '_data'] = array(
                    "type" => INNER_JOIN,
                    "on" => $this->table.".aid={$this->table}_data.aid"
                );
            }
            //属性表
            $this->view['content_flag'] = array(
                "type" => LEFT_JOIN,
                "on" => $this->table.".aid=content_flag.aid"
            );
            $this->run($this->table);
        }
    }

}