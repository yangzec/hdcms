<js file="__TPL__/Field/js/image.js"/>
<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">图片宽度</td>
                    <td>
                        <label>宽 <input type="text" class="w30 image_height" name="set[width]" value="<?php echo $field['set']['width'];?>"/> px</label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">图片高度</td>
                    <td>
                        <label>高 <input type="text" class="w30 image_width" name="set[height]" value="<?php echo $field['set']['height'];?>"/> px</label>
                    </td>
                </tr>
                <tr>
                    <td>是否添加水印</td>
                    <td>
                        <label><input type="radio" name="set[water]" value="1" <?php if($field['set']['ispasswd']==1){?>checked="checked"<?php }?>/> 是</label>
                        <label><input type="radio" name="set[water]" value="0" <?php if($field['set']['ispasswd']==0){?>checked="checked"<?php }?>/> 否</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>