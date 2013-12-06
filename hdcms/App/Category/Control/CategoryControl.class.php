<?php
class CategoryControl extends AuthControl
{
    //模型
    protected $db;
    //栏目cid
    protected $cid;
    //栏目缓存
    protected $category;
    //模型缓存
    protected $model;

    //构造函数
    public function __init()
    {
        parent::__init();
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $this->model    = F("model", false, MODEL_CACHE_PATH);
        $this->db       = K("Category");
        $this->cid      = Q("request.cid", null, "intval");
        if ($this->cid && !isset($this->category[$this->cid])) {
            $this->error("栏目不存在！");
        }
    }

    /**
     * 显示栏目列表
     */
    public function index()
    {
        $category = $this->db->get_tree();
        $this->assign("category", $category);
        $this->display();
    }

    //将栏目名称转拼音做为静态目录
    public function get_catdir()
    {
        //栏目名称
        $catname = Q("post.catname");
        //普通栏目进行处理
        if ($catname) {
            $catdir = String::pinyin($catname);
        }
        echo $catdir;
        exit;
    }

    //添加栏目到表
    public function add()
    {
        //添加栏目
        if (IS_POST) {
            if ($this->db->create()) {
                if ($this->db->add()) {
                    $this->ajax_return(1, "添加栏目成功!");
                }
            }
            $this->ajax_return(0, "添加栏目失败!");
        } else {
            $category = $this->db->get_tree();
            //添加子栏目时增加selected属性
            $pid = Q("get.pid", 0, "intval");
            foreach ($category as $n=>$c) {
                $category[$n]["selected"] = "";
                if ($c['cid'] == $pid) {
                    $category[$n]["selected"] = "selected='selected'";
                }
            }
            $this->assign("category", $category);
            $this->assign("model", $this->model);
            $this->display();
        }
    }

    //修改栏目到表
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->create()) {
                if ($this->db->save()) {
                    $this->ajax_return(1, "修改栏目成功!");
                }
            }
            $this->ajax_return(0, "修改栏目失败");
        } else {
            //当前栏目信息
            $field = $this->db->find($this->cid);
            $category = $this->db->get_tree();
            foreach ($category as $n => $v) {
                $category[$n]['selected'] = "";
                if ($field['pid'] == $v['cid']) {
                    $category[$n]['selected'] = "selected='selected'";
                }
            }
            $model = $this->model;
            foreach ($model as $n => $m) {
                $model[$n]['selected'] = "";
                if ($field['mid'] == $m['mid']) {
                    $model[$n]['selected'] = "selected='selected'";
                }
            }
            $this->assign("field", $field);
            $this->assign("category", $category);
            $this->assign("model", $model);
            $this->display();
        }
    }

    //更新栏目排序
    public function update_order()
    {
        $list_order = q("post.list_order");
        if (!empty($list_order)) {
            foreach ($list_order as $cid => $order) {
                $cid = intval($cid);
                $order = intval($order);
                $data = array("cid" => $cid, "catorder" => $order);
                $this->db->save($data);
            }
            //更新缓存
            $this->db->update_cache();
            $this->ajax_return(1, "更改排序成功");
        }
    }


    /**
     * 更新栏目缓存
     */
    public function update_cache()
    {
        $this->db->update_cache();
        $this->ajax_return(1, "更新栏目缓存成功");
    }

    //删除栏目
    public function del()
    {
        if ($this->db->join(NULL)->find("pid=" . $this->cid)) {
            $this->ajax_return(0, "请先删除子栏目");
        } else if ($this->db->del_category()) {
            $this->ajax_return(1, "栏目删除成功");
        } else {
            $this->ajax_return(0, "栏目删除失败");
        }
    }
}
































