<js file="__TPL__/Field/js/images.js"/>
<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">文本框长度</td>
                    <td><input type="text"  name="set[input_width]" class="w100 images_input_width" value="<?php echo $field['set']['input_width'];?>"/> px</td>
                </tr>
                <tr>
                    <td class="w100">图片宽度</td>
                    <td>
                        <label><input type="text" class="w100 image_height" name="set[width]" value="<?php echo $field['set']['width'];?>"/> px
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">图片高度</td>
                    <td>
                        <label><input type="text" class="w100 image_width" name="set[height]" value="<?php echo $field['set']['height'];?>"/> px
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>允许上传的个数</td>
                    <td>
                        <input type="text" class="w100 images_num" name="set[num]" value="<?php echo $field['set']['num'];?>"/> 个
                    </td>
                </tr>
                <tr>
                    <td>是否添加水印</td>
                    <td>
                        <label><input type="radio" name="set[ispasswd]" value="1" <?php if($field['set']['ispasswd']==1){?>checked="checked"<?php }?>/> 是</label>
                        <label><input type="radio" name="set[ispasswd]" value="0" <?php if($field['set']['ispasswd']==0){?>checked="checked"<?php }?>/> 否</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>