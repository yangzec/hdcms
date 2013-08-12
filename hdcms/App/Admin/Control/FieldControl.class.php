<?php
/**
 * 模型字段管理
 * Class ModelControl
 */
class FieldControl extends RbacControl
{
    /**
     * 字段列表
     */
    public function index()
    {error(1);
        $mid = $this->_get("mid");
        $field = M("model_field")->order("fieldsort ASC")->all("mid=$mid");
        $this->assign("fields", $field);
        $this->display();
    }

    /**
     * 验证字段是否存
     */
    public function checkFieldName()
    {
        $mid = $this->_get("mid", "intval");
        $db = M("model_field");
        if (!$db->where("mid={$mid} and field_name='{$_POST['field_name']}'")->find()) {
            $this->_ajax(1);
        }
    }


    /**
     * 添加字段
     */
    public function add()
    {
        if (isset($_POST['field_name'])) {
            //检测字段是否存在
            $db = M("model");
            $model = $db->find($this->_post("mid"));
            $table = $_POST['is_main_table'] == 1 ? $model['tablename'] : $model['tablename'] . '_data';
            if ($db->fieldExists($_POST["field_name"], $table)) {
                $this->_ajax(array('stat' => 0, "msg" => "字段已经存在"));
            }
            //添加字段
            $db = k("Field");
            $db->addField($_POST);
            $this->_ajax(array("stat" => 1));
        } else {
            $mid = $this->_get("mid");
            $model = M("model")->find($mid);
            $this->assign("model", $model);
            $this->display();
        }
    }

    /**
     * 删除字段
     */
    public function del()
    {
        $table_name = $this->_get("table_name");
        $field_name = $this->_get("field_name");
        $fid = $this->_get("fid", "intval");
        $mid = $this->_get("mid", "intval");
        if (!$table_name || !$field_name || !$fid || !$mid) {
            $this->error("非法传参数");
        }
        $db = K("Field");
        //如果表中有字段则删除
        if ($db->fieldExists($field_name, $table_name)) {
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $table_name . " DROP $field_name";
            //删除表字段
            $db->exe($sql);
        }
        //删除表model_field中记录
        $db->del("fid=$fid");
        //修改表缓存
        $db->updateCache($mid);
        $this->success("删除字段成功", U("index", "mid=$mid"), 1);
    }

    /**
     * 修改字段
     */
    public function edit()
    {
        if ($this->_post("title")) {
            //检测字段是否存在
            $db = M("model_field");
            $field_name = $this->_post("field_name");//字段名
            $fid = $this->_post("fid","intval");//字段fid
            if($db->where("field_name='$field_name' AND fid<>$fid")->find()){
                $this->_ajax(array('stat' => 0, "msg" => "字段已经存在"));
            }
            //修改字段
            $db = k("Field");
            $db->editField($_POST);
            $this->_ajax(array("stat" => 1));
        } else {
            $fid = $this->_get("fid");
            $field = M("model_field")->find($fid);
            if ($field) {
                eval('$field["set"]=' . $field['set'] . ';');
                $this->assign("field", $field);
                $this->display();
            } else {
                $this->error("你要修改的字段不存在");
            }
        }
    }
}