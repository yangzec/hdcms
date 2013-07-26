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
    {
        $mid = $this->_get("mid");
        $this->assign("fields", M("model_field")->order("fieldsort ASC")->all());
        $this->display();
    }

    /**
     * 验证字段是否存
     */
    public function check_field_name()
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
            $db = k("Field");
            if ($db->addField($_POST)) {
                $this->success("表字段修改成功", U("index", array("mid" => $_POST['mid'])));
            } else {
                $this->error("表字段修改失败", U("index", array("mid" => $_POST['mid'])));
            }
        } else {
            $this->display();
        }
    }
}