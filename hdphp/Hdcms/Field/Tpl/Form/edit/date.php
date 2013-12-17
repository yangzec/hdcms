<table class="table1">
    <tr class="input action">
        <td class="w100">参数</td>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">时间格式</td>
                    <td>
                        <label><input type="radio" value="1" name="set[format]"  <?php if($field['set']['format']==1){?>checked="checked"<?php }?>/> 日期+24小时制时间（2013-11-19 05:10:27）<br/></label>
                        <label><input type="radio" value="0" name="set[format]"  <?php if($field['set']['format']=='0'){?>checked="checked"<?php }?>/> 日期（2013-11-19）<br/></label>
                        <label><input type="radio" value="2" name="set[format]"  <?php if($field['set']['format']==2){?>checked="checked"<?php }?>/> 时间（05:10:27）</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>