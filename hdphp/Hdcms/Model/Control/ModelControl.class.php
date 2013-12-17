<?php
/**
 * 内容模型管理模块
 * Class ModelControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ModelControl extends AuthControl
{
    //模型对象
    private $db;
    //模型id
    private $mid;

    /**
     * 显示模型列表
     */
    public function __init()
    {
        parent::__init();
        $this->db = K("Model");
        $this->mid = Q("request.mid");

    }

    public function index()
    {
        $model = F("model", false, MODEL_CACHE_PATH);
        $this->assign("model", $model);
        $this->display();
    }

    /**
     * 添加模型时Ajax验证模型是否存在
     */
    public function check_model()
    {
        $db = M("model");
        if (isset($_POST['tablename'])) {
            if (!$db->find("tablename='{$_POST['tablename']}'")) {
                $this->_ajax(1);
            }
        }
    }

    //更新缓存
    public function update_cache()
    {
        if ($this->db->update_cache()) {
            $this->_ajax(1);
        }
    }

    /**
     * 删除模型
     */
    public function del()
    {
        if ($this->mid) {
            if (M("category")->find("mid={$this->mid}")) {
                $this->_ajax(2);
            }
            $model = $this->db->find($this->mid);
            //删除主表与表字段缓存
            if ($this->db->exe("DROP TABLE IF EXISTS " . C("DB_PREFIX") . $model['tablename'])) {
                //删除附表与表字段缓存
                if ($model['type'] == 1) {
                    $this->db->exe("DROP TABLE IF EXISTS " . C("DB_PREFIX") . $model['tablename'] . '_data');
                }
                //删除表记录
                $this->db->del($this->mid);
                $this->db->table("field")->where("mid={$this->mid}")->del();
                $this->_ajax(1);
            }
        }
    }

    /**
     * 添加模型
     */
    public function add()
    {
        if (IS_POST) {
            //创建模型表
            if ($this->db->create_model_table() && $this->db->add()) {
                $this->_ajax(1);
            }
        } else {
            $this->display();
        }
    }

    /**
     * 编辑模型
     */
    public function edit()
    {
        if (IS_POST) {
            //异步提交返回信息
            if ($this->db->save()) {
                $this->_ajax(1);
            }
        } else {
            $field = $this->db->find($this->mid);
            $this->assign("field", $field);
            $this->display();
        }
    }

    //验证模型名是否存在
    public function check_model_name()
    {
        $model_name = Q("post.model_name");
        if ($this->mid) {
            if (!$this->db->find(array("model_name" => $model_name, "mid" => array("neq" => $this->mid)))) {
                $this->_ajax(1);
            }
        } else {
            if (!$this->db->find(array("model_name" => $model_name))) {
                $this->_ajax(1);
            }
        }
        $this->_ajax(0);
    }

    //验证模型表名是否已经存在
    public function check_table_name()
    {
        $tablename = Q("post.tablename");
        if (!$this->db->find(array("tablename" => $tablename))) {
            $this->_ajax(1);
        }
        $this->ajax(0);
    }


}