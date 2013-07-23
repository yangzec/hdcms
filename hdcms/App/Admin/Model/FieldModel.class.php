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
        $data = $field;
        $data['set'] = var_export($data['set'], true);
        $this->add($data);
        //修改表结构
        $this->alterTable($field);
        //更新缓存
        return $this->updateCache($field);
    }

    /**
     * 修改表结构
     * @param array $field 字段信息
     */
    private function alterTable($field)
    {
        $db = M("model")->find($field['mid']);
        $table = $field['is_main_table'] ? $db['tablename'] : $db['tablename'] . '_data';
        switch ($field['field_type']) {
            case "char":
            case "varchar":
                $_field = $field['field_name'] . " ".$field['field_type']."(255)";
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
        //是否已经存在字段
        $is_have = $this->is_field($field['field_name'], $table);
        if ($is_have) {
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $table . " CHANGE " . $field['field_name'] . " " . $_field;
        } else {
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $table . " ADD " . $_field;
        }
        $this->exe($sql);
    }

    /**
     * 更新字段缓存
     * @param array $field 字段信息
     * @return bool
     */
    private function updateCache($field)
    {
        $data=F($field['mid'],false,'./data/field');
        if(empty($data))$data=array();
        //获得表单的html
        $field['html'] = $this->getHtml($field);
        $data[] = $field;
        F($field['mid'],$data,'./data/field');
    }

    /**
     * 获得表单的Html表示
     * @param array $f 表单信息
     * @return string
     */
    private function getHtml($f)
    {
        $html = '';
        switch ($f['show_type']) {
            case "input":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><input name='{$f['field_name']}' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}'/><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "textarea":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><textarea name='{$f['field_name']}' style=\"width:{$f['set']['width']}px;height:{$f['set']['height']}px;\"
                 css='{$f['css']}'/>{FIELD_VALUE}</textarea><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "num":
                $html = "<tr>
                <th>{$f['title']}</th>
                <td><input name='{$f['field_name']}' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}'/><span class='validation'>{$f['message']}</span>
                 </td></tr>";
                break;
            case "datetime":
                $html = "<tr><th>{$f['title']}</th>
                <td><input name='{$f['field_name']}' id='date_{$f['field_name']}' value='{FIELD_VALUE}' size='{$f['set']['size']}'
                 css='{$f['css']}'/><span class='validation'>{$f['message']}</span>";
                $html .= "<script>
                        $(function(){
                        var dateFormat = {
                        dateFormat: 'yy-mm-dd'
                        ,monthNames: [ '一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月' ]
                        ,dayNamesMin: [ '日', '一', '二', '三', '四', '五', '六' ]
                        };
                        $('#date_{$f['field_name']}').datepicker(dateFormat);
                        });
                        </script>";
                $html .= "</td></tr>";
                break;
            case "select":
                $param = explode(",", $f['set']['param']);
                $html = "<tr>
                <th>{$f['title']}</th><td>";
                if ($f['set']['type'] == 'select') {
                    "<select name='{$f['field_name']}'>";
                }
                foreach ($param as $p) {
                    $s = explode("|", $p); //男|1,女|0
                    $checked = $f['set']['default'] == $s[1] ? "checked='checked'" : "";
                    switch ($f['set']['type']) {
                        case "radio":
                            $html .= " <input type='radio' name='{$f['field_name']}' value='{$s[1]}' {$checked} css='{$f['css']}'/> " . $s[0];
                            break;
                        case "checkbox":
                            $html .= " <input type='checkbox' name='{$f['field_name']}' value='{$s[1]}' {$checked} css='{$f['css']}'/> " . $s[0];
                            break;
                        case "select":
                            $html .= " <option value='{$s[1]}' $checked>{$s[0]}</option>";
                            break;
                    }
                }
                if ($f['set']['type'] == 'select') {
                    "</select>";
                }
                $html .= "<span class='validation'>{$f['message']}</span></td></tr>";
                break;
            case "editor":
                $html = "<tr><th>{$f['title']}</th><td>";
                $html .= <<<str
<script id="hd_{$f['field_name']}" name="{$f['field_name']}" type="text/plain"></script>
    <script type='text/javascript'>
        var ue = UE.getEditor('hd_{$f['field_name']}',{
        imageUrl:url_method//处理上传脚本
        ,zIndex : 0
        ,autoClearinitialContent:false
        ,initialFrameWidth:"100%" //宽度1000
        ,initialFrameHeight:"{$f['set']['height']}" //宽度1000
        ,autoHeightEnabled:false //是否自动长高,默认true
        ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
        ,initialContent:'{FIELD_VALUE}' //初始化编辑器的内容 也可以通过textarea/script给值
    });
        </script>
str;
                $html .= "<span class='validation'>{$f['message']}</span>";
                $html .= "</td></tr>";
                break;
            case "image":
            case "images":
                $name = $f['field_name'];
                $upload_num = $f['show_type'] == "image" ? 1 : $f['set']['upload_num'];
                $html = "<tr><th>{$f['title']}</th><td>";
                $html .= <<<str
                <script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;
        hd_uploadify_options.fileSizeLimit  ="{$f['set']['upload_size']}MB";
        hd_uploadify_options.fileTypeExts   ="{$f['set']['allow_upload_type']}";
        hd_uploadify_options.queueID        ="hd_uploadify_{$name}_queue";
        hd_uploadify_options.showalt        =false;
        hd_uploadify_options.uploadLimit    ={$upload_num};
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData       ={image : "1", someOtherKey:1,SESSION_NAME:"+SESSION_ID+",upload_dir:"",hdphp_upload_thumb:""};
        hd_uploadify_options.thumb_width          =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;
        hd_uploadify_options.showalt = 0;

        $("#hd_uploadify_{$name}").uploadify(hd_uploadify_options);
    });
</script>
<input type="file" name="up" id="hd_uploadify_{$name}"/>
<div tool="hd_uploadify_{$name}_msg uploadify_upload_msg">
</div>
<div id="hd_uploadify_{$name}_queue"></div>
<div class="hd_uploadify_{$name}_files uploadify_upload_files" input_file_id ="hd_uploadify_{$name}">
    <ul></ul>
    <div style="clear:both;"></div>
</div>
str;

                $html .= "</td></tr>";
                break;
        }
        return $html;
    }

    /**
     * 格式化表单，替换初始值等操作
     */
    public function replaceValue($field)
    {
        $html = '';
        switch ($field['show_type']) {
            case "input":
                $html = str_replace("{FIELD_VALUE}", $field['set']['default'], $field['html']);
                break;
            case "textarea":
                $html = str_replace("{FIELD_VALUE}", $field['set']['default'], $field['html']);
                break;
            case "num":
                $html = str_replace("{FIELD_VALUE}", $field['set']['default'], $field['html']);
                break;
            case "select":
                $html = $field['html'];
                break;
            case "editor":
                $html = str_replace("{FIELD_VALUE}", $field['set']['default'], $field['html']);
                break;
            case "image":
                $html = $field['html'];
                break;
            case "images":
                $html = $field['html'];
                break;
            case "datetime":
                $html = str_replace("{FIELD_VALUE}", $field['set']['default'], $field['html']);
                break;
        }
        return $html;
    }
}

?>