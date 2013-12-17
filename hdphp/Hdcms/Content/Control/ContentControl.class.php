<?php
/**
 * 后台内容管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentControl extends AuthControl
{
    //栏目缓存
    protected $category = array();
    //模型缓存
    protected $model = array();
    //栏目cid
    protected $cid;
    //当前模型
    protected $db = null;
    //模型mid
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

    }

    //显示文章列表
    public function index()
    {
        $this->display();
    }

    //异步获得目录树，内容左侧目录列表
    public function ajax_category_tree()
    {
        $data = Data::channelLevel($this->category);
        $data = $this->get_view_tree($data);
        $this->_ajax($data);
    }

    //目录树
    private function get_view_tree($data)
    {
        foreach ($data as $n => $d) {
            $d['text'] = $d['title'];
            if (!empty($d['data'])) {
                $d["children"] = $this->get_view_tree($d['data']);
            }
            $json[$n] = $d;
        }
        return $json;
    }

    //待审核文章
    public function audit()
    {
        $_GET['status'] = 0;
        $this->content();
    }

    //已审核文章内容页列表
    public function content()
    {
        $db = K("ContentView");
        //获得列表数据
        $where = array();
        $pri = $db->table . ".aid";
        if (!empty($_POST['search_begin_time'])) {
            $where[] = "addtime>=" . strtotime($_POST['search_begin_time']);
        }
        if (!empty($_POST['search_end_time'])) {
            $where[] = "addtime<=" . strtotime($_POST['search_end_time']);
        }
        if (!empty($_POST['search_flag'])) {
            $where[] = C("DB_PREFIX") . "content_flag.fid=" . $_POST['search_flag'];
        }
        $search_type = Q("post.search_type");
        $search_keyword = Q("post.search_keyword");
        if (!empty($search_type) && !empty($search_keyword)) {
            switch ($search_type) {
                case 1:
                    $where[] = $db->tableFull . ".title like '%{$search_keyword}%'";
                    break;
                case 2:
                    $where[] = $db->tableFull . ".description like '%{$search_keyword}%'";
                    break;
                case 3:
                    $where[] = $db->tableFull . ".username like '%{$search_keyword}%'";
                    break;
                case 4:
                    $where[] = $db->tableFull . ".aid=" . intval($search_keyword);
                    break;
            }
        }
        //文章状态：已审核或未审核
        $status = Q("get.status", 1, "intval");
        $where[] = "status=$status";
        $where[] = C("DB_PREFIX") . "category.cid=" . $this->cid;
        //总条数
        $count = $db->where($where)->group($pri)->count($pri);
        $page = new Page($count, C("ADMIN_LIST_ROW"));
        //字段集
        $field = $db->table . ".aid,title,arc_sort,status,category.cid,catname,username,updatetime";
        $data = $db->field($field)->where($where)->group($pri)->limit($page->limit())->all();
        if (!empty($data)) {
            $flag = K("ContentFlag");
            foreach ($data as $n => $d) {
                $f = $flag->field("flagname")->where(array("aid" => $d['aid'], 'cid' => $this->cid))->all();
                if (!empty($f) && is_array($f)) {
                    $s_flag = "[<font color='red'>";
                    foreach ($f as $_f) {
                        $s_flag .= $_f['flagname'] . "&nbsp;";
                    }
                    $data[$n]['flag'] = substr($s_flag, 0, -6) . "]</font>";
                }
            }
        }
        $this->assign("flag", $this->db->table("flag")->all());
        $this->assign("page", $page->show());
        $this->assign("content", $data);
        $this->display();
    }

    //更新排序
    public function update_order()
    {
        $arc_order = Q("post.arc_order");
        if (!empty($arc_order)) {
            foreach ($arc_order as $aid => $order) {
                $aid = intval($aid);
                $order = intval($order);
                $data = array("aid" => $aid, "arc_sort" => $order);
                $this->db->join(NULL)->save($data);
            }
        }
        $this->ajax_return(1, "更改排序成功");
    }


    //添加文章
    public function add()
    {
        if (IS_POST) {
            if ($this->db->create() && $this->db->add()) {
                $this->_ajax(1);
            }
        } else {
            //分配属性
            $flag = $this->db->table("flag")->join(NULL)->all();
            $this->assign("flag", $flag);
            //分配栏目
            $this->assign("category", $this->category[$this->cid]);
            $this->assign("model", $this->model[$this->mid]);
            //自定义字段
            $_field = new FieldModel();
            $_field->mid = $this->mid;
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
                $this->_ajax(1);
            }
        } else {
            $aid = Q("request.aid", null, "intval");
            if ($aid) {
                $field = $this->db->find($aid);
                $this->assign("category", $this->category);
                $this->assign("model", $this->model[$this->mid]);
                $this->assign("flag", $this->get_content_flag($aid));
                $field['thumb_img'] = empty($field['thumb']) ? __ROOT__ . '/hdcms/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->assign("field", $field);
                //自定义字段
                $_field = new FieldModel();
                $_field->mid = $this->mid;
                $custom_field = $_field->field_view($field);
                $this->assign("custom_field", $custom_field);
                $this->display();
            }
        }
    }

    //编辑文章获得属性flag
    private function get_content_flag($aid)
    {
        $db = K("Flag");
        $flag = $db->all();
        $data = $db->table("content_flag")
            ->where(array("aid" => $aid, "cid" => $this->cid))->all();
        $cur = array();
        if ($data) {
            foreach ($data as $d) {
                $cur[$d['fid']] = $d;
            }
        }
        foreach ($flag as $n => $f) {
            $checked = isset($cur[$f['fid']]) ? "checked='checked'" : "";
            $flag[$f['fid']]['status'] = isset($cur[$f['fid']]) ? true : false;
            $flag[$f['fid']]['html'] = "
            <input type='hidden' name='content_flag[{$f['fid']}][cid]' value='{$this->cid}'/>
            <label class='checkbox inline'><input type='checkbox' name='content_flag[{$f['fid']}][fid]'
            value='{$f['fid']}' $checked/> " . $f['flagname'] . "</label>";
        }
        return $flag;
    }


    //删除文章
    public function del()
    {
        $aid = Q("request.aid");
        if (!empty($aid)) {
            if (!is_array($aid)) {
                $aid = array($aid);
            }
            $this->db->del($aid);
            $this->_ajax(1);
        }
    }

    //审核或取消审核
    public function set_status()
    {
        $status = Q("get.status", 1, "intval");
        $aids = Q("post.aid");
        foreach ($aids as $aid) {
            $this->db->join()->trigger()->save(array("aid" => $aid, "status" => $status));
        }
        $this->_ajax(1);
    }

    //移动文章
    public function move_content()
    {
        if (IS_POST) {
            //移动方式
            $from_type = Q("post.from_type", NULL, "intval");
            $to_cid = Q("post.to_cid", NULL, 'intval');
            $from_cid = Q("post.from_cid", NULL);
            switch ($from_type) {
                //移动aid
                case 1:
                    $aid = Q("post.aid", NULL, "trim");
                    $aid = explode("|", $aid);
                    if ($aid) {
                        foreach ($aid as $id) {
                            $this->db->trigger()->join()->save(array("aid" => $id, "cid" => $to_cid));
                        }
                    }
                    break;
                //移动栏目
                case 2:
                    //移动栏目
                    if ($from_cid) {
                        foreach ($from_cid as $fcid) {
                            $this->db->trigger()->join()->where("cid=$fcid")->save(array("cid" => $to_cid));
                        }
                    }
                    break;
            }
            $this->_ajax(1);
        } else {
            $category = $this->category;
            foreach ($category as $n => $v) {
                $category[$n]['selected'] = "";
                if ($this->cid == $v['cid']) {
                    $category[$n]['selected'] = "selected";
                }
                //非本栏目模型关闭
                if ($this->mid != $v['mid']) {
                    $category[$n]['disabled'] = 'disabled';
                }
            }
            $this->assign("mid", $this->mid);
            $this->assign("category", $category);
            $this->display();
        }
    }

}








































