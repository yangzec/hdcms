<?php
class FieldModel extends Model
{
    public $table = "model_field";

    /**
     * 添加一个字段
     * @param array $field 字段信息
     * @return bool
     */
    public function addField($field)
    {
        //获得表名
        $db = M("model")->find($field['mid']);
        $table = $field['is_main_table'] ? $db['tablename'] : $db['tablename'] . '_data';
        //清除表缓存
        F(C("DB_DATABASE") . C("DB_PREFIX") . $table, NULL, TABLE_PATH);
        //字段所在表
        $field['table_name'] = $table;
        //字段html视图显示信息
        $this->alterTable($field);
        //添加字段信息到model_field表
        $field['set'] = var_export($field['set'], true);
        //根据参数$_POST['is_main_table']修改请表或副表的表结构
        $this->add($field);
        //将字段信息缓存，缓存名是模型mid
        return $this->updateCache($field['mid']);
    }

    /**
     * 修改字段
     * @param array $field 字段信息
     * @return bool 成功或失败
     */
    public function editField($field)
    {
        //获得表名
        $db = M("model")->find($field['mid']);
        //清除表缓存
        F(C("DB_DATABASE") . C("DB_PREFIX") . $field['table_name'], NULL, TABLE_PATH);
        //修改字段
        $this->alterTable($field, false);
        //添加字段信息到model_field表
        $field['set'] = var_export($field['set'], true);
        //修改model_field信息
        $this->save($field);
        //将字段信息缓存，缓存名是模型mid
        return $this->updateCache($field['mid']);
    }

    /**
     * 修改表结构
     * @param array $field 字段信息
     * @param boolean $addField 添加或修改字段
     */
    private function alterTable($field, $addField = true)
    {
        switch ($field['field_type']) {
            case "char":
            case "varchar":
                if (!isset($field['field_size']) || $field['field_size']) {
                    $field['field_size'] = 255;
                }
                $_field = $field['field_name'] . " " . $field['field_type'] . "(" . $field['field_size'] . ")";
                break;
            case "text":
                $_field = $field['field_name'] . " " . $field['field_type'];
                break;
            case "decimal":
                $_field = $field['field_name'] . " " . $field['field_type'] . "(" . $field['set']['integer'] . "," . $field['set']['decimal'] . ")";
                break;
            default:
                $_field = $field['field_name'] . " " . $field['field_type'];
                break;
        }
        //修改或添加字段
        if ($addField) {
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $field['table_name'] . " ADD " . $_field;
        } else {
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $field['table_name'] . " CHANGE " . $field['field_old_name'] . " " . $_field;
        }
        $this->exe($sql);
    }

    /**
     * 更新字段缓存
     * @param int $mid 模型mid
     * @return bool
     */
    public function updateCache($mid)
    {
        //获得当前模型所有表单信息
        $field = M("model_field")->all("mid=$mid");
        if (empty($field)) {
            return F($mid, NULL, './data/field/');
        }
        foreach ($field as $k => $f) {
            eval("\$field[\$k]['set']=" . $f['set'] . ';');
            $field[$k]['html'] = $this->getHtml($field[$k]);
        }
        //缓存字段信息
        return F($mid, $field, './data/field/');
    }

    /**
     * 获得表单的Html表示
     * @param array $f 表单信息
     * @return string
     */
    private function getHtml($f)
    {
        $html = '';
        //表单name值
        $name = $f['is_main_table'] == 1 ? $f['field_name'] : $f['table_name'] . "[{$f['field_name']}]";
        $validation = !empty($f['validation']) ? "checkField(this,{$f['required']},{$f['validation']},'{$f['message']}','{$f['error']}');" : "";
        switch ($f['show_type']) {
            case "input":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><input name='$name' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}' onblur=\"$validation\" onfocus=\"checkFieldMsg(this,'{$f['message']}')\"/><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "image":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><input name='$name' readonly='readonly'  lab='pic_{$f['field_name']}' style='width:300px' value='{FIELD_VALUE}'/>
                 <input class='inputbut' type='button' onclick='selectImage(this)' value='浏览...'>
                 <img lab='upload_field_img' align='middle' id='{$name}_thumb' width='10' height='10' src='{FIELD_VALUE}'/>
                 </td></tr>";
                break;
            case "textarea":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><textarea onblur=\"$validation\" onfocus=\"checkFieldMsg(this,'{$f['message']}')\" name='$name' style=\"width:{$f['set']['width']}px;height:{$f['set']['height']}px;\"
                 css='{$f['css']}'/>{FIELD_VALUE}</textarea><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "num":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><input onblur=\"$validation\"  onfocus=\"checkFieldMsg(this,'{$f['message']}')\" name='$name' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}'/><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "datetime":
                $html = "<tr><th>{$f['title']}</th>
                <td><input name='$name' id='date_$name' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}'/><span class='validation'>{$f['message']}</span>";
                $html .= "<script>
                        $(function(){
                        var dateFormat = {
                        dateFormat: 'yy-mm-dd'
                        ,monthNames: [ '一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月' ]
                        ,dayNamesMin: [ '日', '一', '二', '三', '四', '五', '六' ]
                        };
                        $('#date_$name').datepicker(dateFormat);
                        });
                        </script>";
                $html .= "</td></tr>";
                break;
            case "select":
                $param = explode(",", $f['set']['param']);
                $html = "";
                foreach ($param as $p) {
                    $s = explode("|", $p); //男|1,女|0
                    if ($f['set']['type'] == 'select') {
                        $selected = $f['set']['default'] == $s[1] ? "selected='selected'" : "";
                    } else {
                        $checked = $f['set']['default'] == $s[1] ? "checked='checked'" : "";
                    }
                    switch ($f['set']['type']) {
                        case "radio":
                            $html .= " <input type='radio' name='$name' value='{$s[1]}' {$checked} css='{$f['css']}'/> " . $s[0];
                            break;
                        case "checkbox":
                            $html .= " <input type='checkbox' name='$name' value='{$s[1]}' {$checked} css='{$f['css']}'/> " . $s[0];
                            break;
                        case "select":
                            $html .= " <option value='{$s[1]}' $selected>{$s[0]}</option>";
                            break;
                    }
                }
                if ($f['set']['type'] == 'select') {
                    $html = "<select name='$name'><option value=''>===选择===</option>" . $html . "</select>";
                }
                $html = "<tr><th>{$f['title']}</th><td>" . $html;
                $html .= "<span class='validation'>{$f['message']}</span></td></tr>";
                break;
            case "editor":
                $html = "<tr><th>{$f['title']}</th><td>";
                $html .= <<<str
<script id="hd_$name" name="$name" type="text/plain"></script>
    <script type="text/javascript">
        var ue = UE.getEditor("hd_$name",{
        imageUrl:CONTROL+'&m=editorUploadImg&water=0&width=600&height=600'//处理上传脚本
        ,catcherUrl:CONTROL+'&m=editorCatcherUrl&water=0'
        ,zIndex : 0
        ,autoClearinitialContent:false
        ,initialFrameWidth:"100%" //宽度1000
        ,initialFrameHeight:'{$f["set"]["height"]}' //宽度1000
        ,autoHeightEnabled:false //是否自动长高,默认true
        ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
        ,initialContent:'{FIELD_VALUE}' //初始化编辑器的内容 也可以通过textarea/script给值
    });
        </script>
str;
                $html .= "</td></tr>";
                break;
        }
        return $html;
    }

    /**
     * 格式化表单，替换初始值等操作
     */
    public function replaceValue($field, $value = null)
    {
        //默认值
        $_replaceValue = $value == null ? $field['set']['default'] : $value;
        $html = '';
        switch ($field['show_type']) {
            case "input":
            case "textarea":
            case "num":
            case "editor":
            case "datetime":
            case "image":
                if ($_replaceValue) {
                    $html = str_replace(10,80,$field['html']);
                    $html = str_replace("{FIELD_VALUE}", $_replaceValue, $html);
                }else{
                    $html = preg_replace('@src="{FIELD_VALUE}"@',__ROOT__."/data/img/upload_img_default.png",$field['html']);
                    $html = str_replace("{FIELD_VALUE}",'' ,$html);
                }
                break;
            case "select":
                if ($value) {
                    switch ($field['set']['type']) {
                        case "radio":
                        case "checkbox":
                            $field['html'] = str_replace('checked="checked"', '', $field['html']);
                            $field['html'] = str_replace('value="' . $value . '"', 'value="' . $value . '" checked="checked"', $field['html']);
                            break;
                        case "select":
                            $field['html'] = str_replace('selected="selected"', '', $field['html']);
                            $field['html'] = str_replace('value="' . $value . '"', 'value="' . $value . '" selected="selected"', $field['html']);
                            break;
                    }
                } else {
                    $html = $field['html'];
                }
        }
        return $html;
    }
}

?>