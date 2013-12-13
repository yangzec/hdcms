<?php

class ContentControl extends MemberAuthControl
{
    //栏目缓存
    protected $category = array();
    //模型缓存
    protected $model = array();
    //栏目cid
    protected $cid;
    //当前模型
    protected $db = null;
    //当cid存在时创建mid
    protected $mid;
    //文章主表
    protected $table;

    //构造函数
    public function __init()
    {
        //父类构造函数
        parent::__init();
        //模型缓存
        $this->model = F("model", false, MODEL_CACHE_PATH);
        //栏目缓存
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        //栏目cid
        $this->cid = Q("request.cid", NULL, "intval");
        $this->mid = Q("request.mid", NULL, "intval");
        if ($this->cid) {
            if (!isset($this->category[$this->cid])) {
                $this->error("栏目不存在！");
            }
            $this->mid = $this->category[$this->cid]['mid'];
        }
        if ($this->cid or $this->mid) {
            //模型对象
            $this->db = K("Content");
        }
        //分配模型数据
        $this->assign("model_list", $this->model);
    }

    //显示内容页列表
    public function content()
    {
        $status = Q("status", 1, "intval");
        $db = new ContentViewModel($_GET['mid']);
        $field = "aid,category.cid,title,mid,catname,addtime,updatetime";
        //已审核文章
        $count = $db->join("category")->order("aid desc")->field($field)->where("username='" . $_SESSION['username'] . "'")->where("status=$status")->count();
        $page = new Page($count, 15);
        $data = $db->join("category")->order("aid desc")->field($field)->where("username='" . $_SESSION['username'] . "'")->where("status=$status")->limit($page->limit())->all();
        $this->assign("page", $page->show());
        $this->assign("content", $data);
        $this->display();
    }

    //显示文章列表
    public function index()
    {
        $mid = Q("get.mid", 1, "intval");
        $status = Q("get.status", 1, "intval");
        go(U("content", array("mid" => $mid, "status" => $status)));
    }

    //投稿栏目选择
    public function select_category()
    {
        $db = K("CategoryView");
        $mid = Q("mid", NULL, "intval");
        if ($mid) {
            $category = $db->join(NULL)->where("mid=$mid")->all();
            //树状结构
            $data = Data::channelList($category, 0, "─", 'cid');
            $category = Data::tree($data, "catname", "cid");
            $html = "<ul>";
            foreach ($category as $n => $v) {
                $disabled = $v['cattype'] != 1 ? "class='disabled'" : "class='enabled'";
                $html .= "<li cid='{$v['cid']}' $disabled>{$v['catname']}</li>";
            }
            $html .= "</ul>";
            $this->assign("category", $html);
            $this->display();
        }
    }

    //添加文章
    public function add()
    {
        if (IS_POST) {
            $_POST['status'] = C("MEMBER_CONTENT_STATUS");
            if ($this->db->create() && $res = $this->db->add()) {
                $this->ajax_return(1, "添加文章成功");
            }
            //添加内容
        } else {
            //分配栏目
            $this->assign("category", $this->category[$this->cid]);
            $this->assign("model", $this->model[$this->mid]);
            //自定义字段
            $_field = new FieldModel();
            $_field->mod_id = $this->mod_id;
            echo $this->mod_id;exit;
            $this->assign("custom_field", $_field->field_view());
            //添加正文视图
            $this->display();
        }
    }

    //修改文章
    public function edit()
    {
        //添加文章神图
        if (IS_POST) {
            $aid = Q("request.aid", 0, "intval");
            if ($aid && $this->db->create() && $this->db->save()) {
                $this->ajax_return(1, "编辑文章成功");
            }
        } else {
            $aid = Q("request.aid", null, "intval");
            if ($aid) {
                $field = $this->db->find($aid);
                $field['cid'] = $field['cid'];
                $field['catname'] = $field['catname'];
                $this->assign("category", $this->category);
                $this->assign("model", $this->model[$this->mid]);
                $field['thumb_src'] = empty($field['thumb']) ? __ROOT__ . '/hdcms/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->assign("field", $field);
                //自定义字段
                $this->field = new FieldModel();
                $custom_field = $this->field->field_view($field);
                $this->assign("custom_field", $custom_field);
                $this->display();
            }
        }
    }

    //删除文章
    public function del()
    {
        $aid = Q("get.aid", null, "intval");
        if ($aid && $this->db->del($aid)) {
            $this->_ajax(1);
        }
    }
}