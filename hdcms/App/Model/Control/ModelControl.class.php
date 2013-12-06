<?php
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
        if (!$model) {
            $model = $this->db->update_model_cache();
        }
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
            $this->_ajax(array("stat" => 1, "msg" => "删除模型成功！"));
        } else {
            $this->_ajax(array("stat" => 0, "msg" => "删除模型失败！"));
        }
    }

    /**
     * 删除模型
     */
    public function del()
    {
        if ($this->mid) {
            if (M("category")->find("mid={$this->mid}")) {
                $this->_ajax(array("stat" => 0, "msg" => "请先删除模型的栏目！"));
            }
            $model = $this->db->find($this->mid);
            //删除主表与表字段缓存
            if ($this->db->exe("DROP TABLE " . C("DB_PREFIX") . $model['tablename'])) {
                //删除附表与表字段缓存
                if ($model['type'] == 1) {
                    if ($this->db->exe("DROP TABLE " . C("DB_PREFIX") . $model['tablename'] . '_data')) {
                        //删除表记录
                        $this->db->del($this->mid);
                        $this->db->table("field")->del($this->mid);
                        //删除缓存  等待。。。。

                        $this->_ajax(array("stat" => 1, "msg" => "删除模型成功！"));
                    } else {
                        $this->_ajax(array("stat" => 0, "msg" => "模型数据表删除失败！"));
                    }
                }
            } else {
                $this->_ajax(array("stat" => 0, "msg" => "模型主表删除失败！"));
            }
        }
    }

    /**
     * 添加模型
     */
    public function add()
    {
        if (IS_POST) {
            //插入模型记录
            if ($this->db->add()) {
                //创建模型表
                if ($this->db->create_model_table()) {
                    $this->_ajax(array("stat" => 1, "msg" => "添加模型成功!"));
                }
            } else {
                $this->ajax(array("stat" => 0, "msg" => "添加模型失败!"));
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
                $this->_ajax(array("stat" => 1, "msg" => "修改模型成功!"));
            } else {
                $this->_ajax(array("stat" => 0, "msg" => "修改模型失败!"));
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