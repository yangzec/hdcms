<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Field/Tpl/Field/js/images.js"></script>
<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">文本框长度</td>
                    <td><input type="text"  name="set[input_width]" class="w150 images_input_width" value="100"/> </td>
                </tr>
                <tr>
                    <td class="w100">图片宽度</td>
                    <td>
                        <label>宽 <input type="text" class="w30 image_height" name="set[width]" value="260"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">图片高度</td>
                    <td>
                        <label>高 <input type="text" class="w30 image_width" name="set[height]" value="260"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>允许上传的个数</td>
                    <td>
                        <input type="text" class="w30 images_num" name="set[num]" value="10"/>
                    </td>
                </tr>
                <tr>
                    <td>是否添加水印</td>
                    <td>
                        <label><input type="radio" name="set[ispasswd]" value="1" checked="checked"/> 是</label>
                        <label><input type="radio" name="set[ispasswd]" value="0"/> 否</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>