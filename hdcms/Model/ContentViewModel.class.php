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
    public function __construct($mid = null, $cid = null)
    {
        $this->cid = is_null($cid) ? Q("request.cid", null, "intval") : intval($cid);
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $this->model = F("model", false, MODEL_CACHE_PATH);
        if (!is_null($mid)) {
            $this->mid = $mid;
        } else if (!is_null($this->cid)) {
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
            //属性表
            $this->view['content_flag'] = array(
                "type" => LEFT_JOIN,
                "on" => $this->table . ".aid=content_flag.aid AND content_flag.cid=category.cid"
            );
            //副表关联
            if ($this->model[$this->mid]['type'] == 1) {
                $this->view [$this->table . '_data'] = array(
                    "type" => INNER_JOIN,
                    "on" => $this->table . ".aid=" . $this->table . "_data.aid"
                );
            }
            $this->run($this->table);
        }
    }

    //获得栏目路径 首页 » 栏目
    public function get_category_path($cid)
    {
        $cat = Data::parentChannel($this->category, $cid);
    }


}