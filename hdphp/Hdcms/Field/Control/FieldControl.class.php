<?php
/**
 * 模型字段管理
 * Class ModelControl
 */

class FieldControl extends AuthControl
{
    //模型mid
    private $mid;
    //模型缓存
    private $model;
    //字段缓存
    private $field;
    //模型对象
    private $db;
    //字段fid
    private $fid;

    //构造函数
    public function __init()
    {
        parent::__init();
        //模型mid
        $this->mid = Q("request.mid", null, "intval");
        //验证模型mid
        if (!$this->mid) {
            $this->error("模型不存在！");
        }
        //当前字段模型缓存
        $this->model = F("model", false, MODEL_CACHE_PATH);
        //字段缓存
        $this->field = F($this->mid, false, FIELD_CACHE_PATH);
        //字段fid
        $this->fid = Q("request.fid", null, "intval");
        $this->db = K("Field");
        //分配mid，全局使用
        $this->assign("mid", $this->mid);
    }

    /**
     * 字段列表
     */
    public function index()
    {
        $this->assign("field", $this->field);
        $this->display();
    }

    /**
     * 更新字段排序
     */
    public function updateFieldSort()
    {
        $orders = Q("post.fieldsort");
        if ($orders) {
            $db = K("Field");
            foreach ($orders as $k => $v) {
                $db->save(array("fid" => $k, "fieldsort" => $v));
            }
            $db->updateCache(intval($_GET['mid']));
            $this->_ajax(1, "text");
        }
    }

    /**
     * 添加字段
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add_field()) {
                $this->_ajax(1);
            }
        } else {
            $this->assign("model", $this->model[$this->mid]);
            $this->display();
        }
    }

    //验证字段是否已经存在
    public function field_is_exists()
    {
        //字段名
        $field_name = Q("request.field_name");
        $table = array();
        $table[] = $this->model[$this->mid]['tablename'];
        if ($this->model[$this->mid]['type'] == 1) {
            $table[] = $this->model[$this->mid]['tablename'] . "_data";
        }
        //检查主，副表
        foreach ($table as $t) {
            if ($this->db->fieldExists($field_name, $t)) {
                $this->_ajax(0);
            }
        }
        $this->_ajax(1);
    }

    //选择字段类型模板
    public function get_field_tpl()
    {
        //字段类型如input textarea
        $field_type = Q("post.field_type");
        //模板类型如add edit select number
        $tpl_type = Q("post.tpl_type");
        $this->display(TPL_PATH . "Form/{$tpl_type}/" . $field_type);
    }

    //删除字段
    public function del_field()
    {
        if ($this->fid) {
            if ($this->db->del_field($this->fid))
                $this->_ajax(1);
        }
    }

    //修改字段
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->create() && $this->db->save()) {
                $this->_ajax(1);
            }
        } else {
            if ($this->fid) {
                $field = $this->field[$this->fid];
                /**
                 * 设置validation的默认值
                 * 在js的field_check表单验证函数中validation不能为空,所以validation不能为空
                 * 在编辑时如果validation=="''"时，表单显示空
                 */
                $field['set']['validation'] = $field['set']['validation'] == "false" ? "" : $field['set']['validation'];
                $this->assign("field", $field);
                $this->assign("model", $this->model[$this->mid]);
                $this->display();
            } else {
                $this->error("你要修改的字段不存在");
            }
        }
    }

    //更新字段缓存
    public function update_cache()
    {
        $this->db->update_field_cache();
        $this->_ajax(1);
    }
}