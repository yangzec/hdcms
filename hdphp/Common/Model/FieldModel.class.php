<?php
//表字段缓存
class FieldModel extends Model
{
    //表
    public $table = "field";
    //模型mid
    public $mid;
    //字段缓存
    private $field_cache;
    //模型缓存
    private $model_cache;
    //添加表单时的set值
    private $set;
    //自动完成
    public $auto = array(
        //模型表名小写
        array("table_name", "_field_table_name", 2, 3, "method"),
        //控制器首字母大写
        array("set", "_field_set", 2, 3, "method"),
    );
    //自动验证
    public $validate = array(
        array("title", "nonull", "标题不能为空", 3, 3),
        array("field_name", "nonull", "字段名不能为空", 3, 3)
    );

    //构造函数
    public function __construct()
    {
        $this->mid = Q("request.mid", null, "intval");
        //字段所在表模型信息
        $this->model_cache = F("model", false, MODEL_CACHE_PATH);
        //字段缓存
        $this->field_cache = F($this->mid, false, FIELD_CACHE_PATH);
        parent::__construct();
    }

    //添加字段时，通过自动完成设置表名
    public function _field_table_name($tablename)
    {
        $p_table = $this->model_cache[$this->mid]['tablename'];
        return Q("post.is_main_table", NULL, "intval") == 1 ? $p_table : $p_table . "_data";
    }

    //提交$_POST['set']自动完成处理
    public function _field_set($set)
    {
        $set['message'] = isset($set['message']) ? $set['message'] : "";
        $set['error'] = isset($set['error']) ? $set['error'] : "";
        $set['css'] = isset($set['css']) ? $set['css'] : "";
        $set['validation'] = empty($set['validation']) ? "false" : $set['validation'];
        $set['width'] = isset($set['width']) ? $set['width'] : "";
        $set['height'] = isset($set['height']) ? $set['height'] : "";
        $set['default'] = isset($set['default']) ? $set['default'] : "";
        $set['required'] = isset($set['required']) ? $set['required'] : "";
        $set['options'] = isset($set['options']) ? String::toSemiangle($set['options']) : "";
        $this->set = $set;
        return var_export($set, true);
    }
    //添加表字段
    public function alter_table_field()
    {
        //s 附表  p 请表
        $table_type = isset($_POST['table_type']) && $_POST['table_type'] == 2 ? "s" : "p";
        //主表
        $_t = $this->model_cache[$_POST['mid']]['tablename'];
        $table = $table_type == 'p' ? $_t : $_t . '_data';
        switch ($_POST['show_type']) {
            case "input":
                $_field = $_POST['field_name'] . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "number":
                $p = $this->set['num_integer'];
                $e = $this->set['num_decimal'];
                $_field = $_POST['field_name'] . " DECIMAL({$p},{$e}) NOT NULL DEFAULT 0";
                break;
            case "textarea":
                $_field = '`' . $_POST['field_name'] . '`' . " TEXT";
                break;
            case "editor":
                $_field = '`' . $_POST['field_name'] . '`' . " TEXT";
                break;
            case "image":
                $_field = '`' . $_POST['field_name'] . '`' . " VARCHAR(100) NOT NULL DEFAULT ''";
                break;
            case "images":
                $_field = '`' . $_POST['field_name'] . '`' . " MEDIUMTEXT";
                break;
            case "select":
                $_field = '`' . $_POST['field_name'] . '`' . " CHAR(80) NOT NULL DEFAULT ''";
                break;
            case "date":
                $_field = '`' . $_POST['field_name'] . '`' . " int(10) NOT NULL DEFAULT 0";
                break;
        }
        //修改或添加字段
        $sql = "ALTER TABLE " . C("DB_PREFIX") . $table . " ADD " . $_field;
        return $this->exe($sql);
    }

    //更新字段缓存
    public function update_field_cache()
    {
        F($this->mid, NULL, FIELD_CACHE_PATH);
        $field = $this->where("mid={$this->mid}")->all();
        $_cache = array();
        if (is_array($field) && !empty($field)) {
            foreach ($field as $f) {
                if (isset($f['set']) && !empty($f['set'])) {
                    eval('$f["set"]=' . $f['set'] . ';');
                } else {
                    $f['set'] = array();
                }
                $_cache[$f['fid']] = $f;
            }
        }
        return F($this->mid, $_cache, FIELD_CACHE_PATH);
    }

    /**
     * 字段视图显示
     * @param array $data 编辑数据时的数据
     * @return string
     */
    public function field_view($data = array())
    {
        $field = F($this->mid, false, FIELD_CACHE_PATH);
        $h = "";
        if (is_array($field) and !empty($field)) {
            foreach ($field as $f) {
                $ac = "_" . $f['show_type'];
                //值
                $value = isset($data[$f['field_name']]) ? $data[$f['field_name']] : $f['set']['default'];
                $h .= $this->$ac($f, $value);
            }
        }
        return $h;
    }

    //文本框
    private function _input($f, $value)
    {
        $set = $f['set'];
        //表单类型
        $type = $set['ispasswd'] == 1 ? "password" : "text";
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input onblur=\"{$valid}\" style=\"width:{$set['size']}px\" type=\"{$type}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" value=\"$value\"/>";
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //选项列表
    private function _select($f, $value)
    {
        $set = $f['set'];
        //表单值
        $_v = explode(",", $set['options']);
        $options = array();
        foreach ($_v as $n => $p) {
            $p = explode("|", $p);
            $options[$p[0]] = $p[1];
        }
        $h = "<tr><th>{$f['title']}</th><td>";
        //select添加select
        if ($set['form_type'] == 'select') {
            $h .= "<select name='{$f['field_name']}'>";
        }
        foreach ($options as $text => $v) {
            switch ($set['form_type']) {
                case "radio":
                    $checked = $value == $v ? "checked='checked'" : "";
                    $h .= "<label><input type='radio' name=\"{$f['field_name']}\" value=\"{$v}\" {$checked}/> {$text}</label> ";
                    break;
                case "checkbox":
                    $s = explode(",", $value);
                    $checked = in_array($v, $s) ? "checked='checked'" : "";
                    $h .= "<label><input type='checkbox' name=\"{$f['field_name']}[]\" value=\"{$v}\" {$checked}/> {$text}</label> ";
                    break;
                case "select":
                    $selected = $value == $v ? "selected='selected'" : "";
                    $h .= "<option name=\"{$f['field_name']}\" value=\"{$v}\" {$selected}> {$text}</option>";
                    break;
            }
        }
        if ($set['form_type'] == 'select') {
            $h .= "</select>";
        }
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //数字
    private function _number($f, $value)
    {
        $set = $f['set'];
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input onblur=\"{$valid}\" style=\"width:{$set['size']}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" value=\"$value\"/>";
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //文本域
    private function _textarea($f, $value)
    {
        $set = $f['set'];
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        //默认值
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<textarea onblur=\"{$valid}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" style=\"width:{$set['width']}px;height:{$set['height']}px\">{$value}</textarea>";
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //文本域
    private function _editor($f, $value)
    {
        $set = $f['set'];
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= tag("ueditor", array("name" => $f['field_name'], "content" => $value, "height" => $set['height']));
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //单图
    private function _image($f, $value)
    {
        $set = $f['set'];
        $id = "img_" . $f['field_name'];
        $h = "<tr><th>{$f['title']}</th><td>";
        $path = isset($value) ? $value : "";
        $src = !empty($value) ? __ROOT__ . '/' . $value : "";
        $h .= "<input id='$id' type='text' name='" . $f['field_name'] . "'  value='$path' src='$src' class='w300 images'/> ";
        $h .= "<button class='btn' onclick='file_upload(\"$id\",\"image\",1,\"{$f['field_name']}\")' type='button'>上传图片</button>";
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //多图
    private function _images($f, $value)
    {
        $set = $f['set'];
        $id = "img_" . $f['field_name'];
        //允许上传数量
        $num = $set['num'];
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<fieldset class='img_list'>
<legend style='font-size: 14px;line-height: 25px;padding: 5px 3px; text-indent: 10px;margin: 0px;'>图片列表</legend>
<center>
<div class='onShow'>
您最多可以同时上传
<font color='red'>$num</font>
张
</div>
</center>
<div id='$id' class='picList'>";
        if (!empty($value)) {
            $img = unserialize($value);
            if (!empty($img) && is_array($img)) {
                $h .= '<ul>';
                foreach ($img as $i) {
                    if (!empty($i['path'])) {
                        $h .= "<li><input type='text' name='" . $f['field_name'] . "[url][]'  value='" . $i['path'] . "' src='" . __ROOT__ . '/' . $i['path'] . "' class='w400 images'/> ";
                        $h .= "<input type='text' name='" . $f['field_name'] . "[alt][]' class='w200' value='" . $i['alt'] . "'/>";
                        $h .= " <a href='javascript:;' class='remove_images' onclick='remove_upload(this);'>移除</a>";
                        $h .= "</li>";
                    }
                }
                $h .= '</ul>';
            }
        }
        $h .= "</div>
</fieldset>
<button class='btn' onclick='file_upload(\"$id\",\"images\",$num,\"{$f['field_name']}\")' type='button'>上传图片</button>";
        $h .= " <span class='{$f['field_name']}'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }
    //时间
    private function _date($f, $value)
    {

        $set = $f['set'];
        $format = array("Y-m-d", "Y/m/d H:i:s", "H:i:s");
        $value = empty($value) ? "" : date($format[$set['format']], $value);
        //默认值
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input type='text' id='{$f['field_name']}' name='{$f['field_name']}' value='$value' class='w150'/>";
        $format = array("yyyy-MM-dd", "yyyy/MM/dd HH:mm:ss", "HH:mm:ss");
        $h .= "<script>$('#{$f['field_name']}').calendar({format: '" . $format[$set['format']] . "'});</script>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //魔术方法
    public function __after_del()
    {
        $this->update_field_cache();
    }

    //魔术方法
    public function __after_add()
    {
        $this->update_field_cache();
    }

    //魔术方法
    public function __after_update()
    {
        $this->update_field_cache();
    }
}