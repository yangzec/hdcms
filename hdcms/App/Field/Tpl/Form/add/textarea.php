<js file="__TPL__/Field/js/textarea.js"/>
<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">宽度</td>
                    <td><input type="text" name="set[width]" class="w100 textarea_width" value="500"/> </td>
                </tr>
                <tr>
                    <td>高度</td>
                    <td><input type="text" name="set[height]" class="w100 textarea_height" value="100"/> </td>
                </tr>
                <tr>
                    <td>默认值</td>
                    <td><textarea class="w300 h60" name="set[default]"></textarea></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>表单样式名</td>
        <td>
            <input type="text" name="set[css]" class="w100"/>
        </td>
    </tr>
    <tr>
        <td>表单验证</td>
        <td>
            <input type="text" name="set[validation]" class="w250 textarea_validation"/>
            <select id="field_check">
                <option value="/^\d+$/">验证规则</option>
                <option value="/^\d+$/">数字</option>
                <option value="/^(http[s]?:)?(\/{2})?([a-z0-9]+\.)?[a-z0-9]+(\.(com|cn|cc|org|net|com.cn))$/i">
                    网址
                </option>
                <option value="/(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}/">电话</option>
                <option value="/^\d{11}$/">手机</option>
                <option value="/^[0-9]{1,20}$/">QQ</option>
            </select>
            <span id="hd_textarea_validation"></span>
        </td>
    </tr>
    <tr>
        <td>必须输入</td>
        <td>
            <input type="radio" name="set[required]" value="1"/> 是
            <input type="radio" name="set[required]" value="0" checked="checked"/> 否
        </td>
    </tr>
    <tr>
        <td>错误提示</td>
        <td>
            <input type="text" name="set[error]" class="w300"/>
        </td>
    </tr>
</table>