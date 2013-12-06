<?php
/**
 * html模型处理
 * Class HtmlModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class HtmlModel extends CommonModel
{
    //栏目缓存
    public $category;
    //模型缓存
    public $model;
    //栏目cid
    public $cid;

    public function __construct($table = null, $cid)
    {
        parent::__construct(null);
        $this->cid = $cid;
        //模型缓存
        $this->model = F("model", false, MODEL_CACHE_PATH);
        //栏目缓存
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
    }


}