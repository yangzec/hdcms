<?php
/**
 * 后台内容管理
 * Class ContentControl
 * @category admin
 * @author hdxj <houdunwangxj@gmail.com>
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

    }

    //显示文章列表
    public function index()
    {
        $this->display();
    }

    //异步获得目录树，内容左侧目录列表
    public function ajax_category_tree()
    {
        $data = Data::channelLevel(Data::channelList($this->category));
        $data = $this->get_view_tree($data);
        $this->_ajax($data);
    }

    //目录树
    private function get_view_tree($data)
    {
        foreach ($data as $n => $d) {
            $d['text'] = $d['catname'];
            if (!empty($d['data'])) {
                $d["children"] = $this->get_view_tree($d['data']);
            }
            $json[$n] = $d;
        }
        return $json;
    }

    //显示内容页列表
    public function content()
    {
        //获得列表数据
        $data = $this->db->get_list(1, C("ADMIN_LIST_ROW"));
        $this->assign("page", $data['page']);
        $this->assign("content", $data['content']);
        $this->display();
    }
    //显示回收站文章
    public function recycle()
    {
        $data = $this->db->get_list(2);
        $this->assign("page", $data['page']);
        $this->assign("content", $data['content']);
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
            if ($this->db->create() && $res = $this->db->add()) {
                $this->_ajax(1);
            }
            //添加内容
        } else {
            //分配属性
            $flag = $this->db->table("flag")->join(NULL)->all();
            $this->assign("flag", $flag);
            //分配栏目
            $this->assign("category", $this->category[$this->cid]);
            $this->assign("model", $this->model[$this->mid]);
            //自定义字段
            $this->field = new FieldModel("Field", $this->mid);
            $this->assign("custom_field", $this->field->field_view());
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
                $field['cid'] = $field['cid'];
                $field['catname'] = $field['catname'];
                $this->assign("category", $this->category);
                $this->assign("model", $this->model[$this->mid]);
                $this->assign("flag", $this->get_content_flag($aid));
                $field['thumb_src'] = empty($field['thumb']) ? __ROOT__ . '/hdcms/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->assign("field", $field);
                //自定义字段
                $this->field = new FieldModel("field", $this->mid);
                $custom_field = $this->field->field_view($field);
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
            $flag[$n]['status'] = isset($cur[$f['fid']]) ? true : false;
            $flag[$n]['html'] = "
            <input type='hidden' name='content_flag[{$f['fid']}][cid]' value='{$this->cid}'/>
            <label><input type='checkbox' name='content_flag[{$f['fid']}][fid]'
            value='{$f['fid']}' $checked/>" . $f['flagname'] . "</label>";
        }
        return $flag;
    }

    //批量还原数据
    public function recovery()
    {
        $aid = Q("request.aid");
        if (!empty($aid)) {
            if (!is_array($aid)) {
                $aid = array($aid);
            }
            $this->db->join(NULL)->in($aid)->save(array(
                "status" => 1
            ));
            $this->ajax_return(1, "还原文章成功!");
        }
    }



    /**
     * 批量删除文章 支持id=1  或id=array(1,2,3)两种形式
     * @param bool $model true 直接删除文件   false 放入回收站
     */
    public function del($model = false)
    {
        $aid = Q("request.aid");
        if (!empty($aid)) {
            if (!is_array($aid)) {
                $aid = array($aid);
            }
            //直接删除文件
            if ($model || C("DEL_CONTENT_MODEL")==1) {
                if ($this->db->del($aid)) {
                    $this->ajax_return(1, "删除文章成功");
                }
            } else { //放入回收站
                $this->db->join(NULL)->in($aid)->save(array(
                    "status" => 2
                ));
                $this->ajax_return(1, "删除文章成功");
            }
        }
    }

    //删回收站内除文件
    public function direct_del()
    {
        $this->del(true);
    }


}