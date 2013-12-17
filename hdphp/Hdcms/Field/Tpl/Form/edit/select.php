<js file="__TPL__/Field/js/select.js"/>
<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">选项列表</td>
                    <td>
                        <textarea name="set[options]" class="w300 h100 select_options"><?php echo $field['set']['options'];?></textarea>
                        <span class="message">例：男|1,女|2</span>
                    </td>
                </tr>
                <tr>
                    <td class="w100">选项类型</td>
                    <td>
                        <label><input type="radio" name="set[form_type]" value="radio" <?php if($field['set']['form_type']=='radio'){?>checked="checked"<?php }?>/> 单选按钮</label>
                        <label><input type="radio" name="set[form_type]" value="checkbox" <?php if($field['set']['form_type']=='checkbox'){?>checked="checked"<?php }?>/> 复选框</label>
                        <label><input type="radio" name="set[form_type]" value="select" <?php if($field['set']['form_type']=='select'){?>checked="checked"<?php }?>/> 下拉框</label>
                    </td>
                </tr>
                <tr>
                    <td>默认值</td>
                    <td><input type="text" name="set[default]" class="w100 select_default" value="<?php echo $field['set']['default'];?>"/></td>
                </tr>
            </table>
        </td>
    </tr>
</table>