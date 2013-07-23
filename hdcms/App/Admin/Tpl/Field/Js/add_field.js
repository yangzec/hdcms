//验证
$(function () {
    //表单验证
    $("form").validation({
        //验证规则
        rules: {
            field_name: {
                message: {default: "只能由英文字母、数字或下划线组成", empty: "请输入字段名称", success: "字段名设置正确", error: "字段已经存在或设置错误"},
                rule: {required: true, regexp: /^[a-z0-9_]+$/, ajax: CONTROL + "&m=check_field_name&mid=" + mid}
            },
            title: {
                message: {default: "例：文章标题,请输入中文", empty: "请输入字段标题", "error": "必须输入标题"},
                rule: {required: true}
            },
            description: {
                message: {default: "模型描述(可以输入中文)"}
            }
        }
    });
})
//验证select选择器
$(function(){
    $("#validation_select").click(function(){
        var reg = $(this).val();
        $("input[name='validation']").val(reg);
    })
})
//选择字段
$(function () {
    $("#field_select").change(function () {
        var type = $(this).val();
        var field_set = '';//字段设置表格
        $("input").parents("tr").show();
        $("textarea").parents("tr").show();
        switch (type) {
            case "input":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">文本框长度</td>' +
                    '<td><input type="text" name="set[size]" class="w200" value="30"/></td></tr>' +
                    '<tr><td style="width:100px;">默认值</td>' +
                    '<td><input type="text" name="set[default]" class="w200"/></td></tr>' +
                    '<tr><td style="width:100px;">字段类型</td>' +
                    '<td>' +
                    '<input type="radio" name="field_type" value="char" checked="checked"/> char ' +
                    '<input type="radio" name="field_type" value="varchar"/> varchar ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">字段长度</td>' +
                    '<td><input type="text" name="field_size" class="w200" value="50"/></td></tr>' +
                    '<tr><td style="width:100px;">是否为密码</td>' +
                    '<td><input type="radio" name="set[ispasswd]"  value="1"/> 是 ' +
                    '<input type="radio" name="set[ispasswd]"  value="0" checked="checked"/> 否</td></tr>' +
                    '</table>';
                break;
            case "textarea":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">宽度</td>' +
                    '<td><input type="text" name="set[width]" class="w100" value="400"/> px</td></tr>' +
                    '<tr><td style="width:100px;">高度</td>' +
                    '<td><input type="text" name="set[height]" class="w100" value="80"/> px</td></tr>' +
                    '<tr><td style="width:100px;">默认值</td>' +
                    '<td><textarea cols="50" rows="3" name="set[default]"></textarea></td></tr>' +
                    '<tr><td style="width:100px;">字段类型</td>' +
                    '<td>' +
                    '<input type="radio" name="field_type" value="char"/> char ' +
                    '<input type="radio" name="field_type" value="varchar" checked="checked"/> varchar ' +
                    '<input type="radio" name="field_type" value="text"/> text ' +
                    '</td></tr>' +
                    '</table>';
                break;
            case "num":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">整数位</td>' +
                    '<td><input type="text" name="set[integer]" class="w100" value="5"/></td></tr>' +
                    '<tr><td style="width:100px;">小数位</td>' +
                    '<td><input type="text" name="set[decimal]" value="0" class="w100">' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">默认值</td>' +
                    '<td>' +
                    '<input type="text" name="set[default]" class="w100"/>' +
                    '<input type="hidden" name="field_type" value="decimal"/></td></tr>' +
                    '<tr><td style="width:100px;">文本框长度</td>' +
                    '<td><input type="text" name="set[size]" class="w100" value="30"/> px</td></tr>' +
                    '</table>';
                break;
            case "datetime":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">格式设置</td>' +
                    '<td>' +
                    '<input type="radio" name="field_type" value="date"/> 日期 (2013-6-18)<br/>' +
                    '<input type="radio" name="field_type" value="datetime"/> 日期+时间 (2013-6-18 16:22:28)<br/>' +
                    '<input type="radio" name="field_type" value="int" checked="checked"/> 数字 (2013-6-18 16:22:28)<br/>' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">文本框长度</td>' +
                    '<td><input type="text" name="set[size]" class="w100" value="30"/> px' +
                    '<input type="text" name="set[default]" value=""/></td></tr>' +
                    '</table>';
                break;
            case "select":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">选项类型</td>' +
                    '<td><input type="radio" name="set[type]" value="radio" checked="checked"/> 单选框 ' +
                    '<input type="radio" name="set[type]" value="checkbox"/> 多选框 ' +
                    '<input type="radio" name="set[type]" value="select"/> 下拉列表 ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">选项列表</td>' +
                    '<td><textarea cols="50" rows="3" name="set[param]">选项名称1|选项值1,选项名称2|选项值2</textarea></td></tr>' +
                    '<tr><td style="width:100px;">默认值</td>' +
                    '<td><input type="text" name="set[default]" class="w100"/>' +
                    '<input type="hidden" name="field_type" value="tinyint"/></td></tr>' +
                    '</table>';
                break;
            case "editor":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">样式</td>' +
                    '<td><input type="radio" name="set[style]" value="small"/> 精简 ' +
                    '<input type="radio" name="set[style]" value="full"  checked="checked"/> 完整 ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">默认值</td>' +
                    '<td><textarea cols="50" rows="3" name="set[default]"></textarea></td></tr>' +
                    '<tr><td style="width:100px;">编辑器高度</td>' +
                    '<td><input type="text" name="set[height]" value="200" class="w100"/> px' +
                    '<input type="hidden" name="field_type" value="text"/></td></tr>' +
                    '</table>';
                $("input[name='css']").parents("tr").hide();
                break;
            case "image":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">允许大小</td>' +
                    '<td><input type="text" name="set[upload_size]" value="5" class="w100"/> MB ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">允许上传图片类型</td>' +
                    '<td><input type="text" name="set[allow_upload_type]" value="*.gif;*.jpg;*.png;*.jpeg" class="w300"/>' +
                    '<input type="hidden" name="field_type" value="char"/>' +
                    '<input type="hidden" name="field_size" value="200"/></td></tr>' +
                    '</table>';
                $("input[name='css']").parents("tr").hide();
                $("input[name='validation']").parents("tr").hide();
                $("input[name='required']").parents("tr").hide();
                $("input[name='error']").parents("tr").hide();
                $("textarea[name='message']").parents("tr").hide();
                break;
            case "images":
                field_set = '<table class="table">' +
                    '<tr><td style="width:100px;">允许大小</td>' +
                    '<td><input type="text" name="set[upload_size]" value="5" class="w100"/> MB ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">上传数量</td>' +
                    '<td><input type="text" name="set[upload_num]" value="1" class="w100"/> 个 ' +
                    '</td></tr>' +
                    '<tr><td style="width:100px;">允许上传图片类型</td>' +
                    '<td><input type="text" name="set[allow_upload_type]" value="*.gif;*.jpg;*.png;*.jpeg" class="w300"/>' +
                    '<input type="hidden" name="field_type" value="char"/>' +
                    '</td></tr>' +
                    '</table>';
                $("input[name='css']").parents("tr").hide();
                $("input[name='validation']").parents("tr").hide();
                $("input[name='required']").parents("tr").hide();
                $("input[name='error']").parents("tr").hide();
                $("textarea[name='message']").parents("tr").hide();
                break;
        }
        //写入表格
        $("#field_set").html(field_set);
    })
    //默认为文本框
    $("#field_select").trigger("change");
})