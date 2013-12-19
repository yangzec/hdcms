//表单验证
$(function () {
    $("form").validation({
        //验证规则
        name: {
            rule: {
                required: true
            },
            error: {
                required: "JS名称不能为空"
            }
        }
    })
})
//删除标签
function del(id) {
    if (confirm('确定要删除吗？')) {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=del&id=" + id,
            dataType: "JSON",
            cache: false,
            success: function (data) {
                if (data.stat == 1) {
                    $.dialog({
                        msg: data.msg,
                        type: "success",
                        close_handler: function () {
                            location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        msg: "操作失败",
                        type: "error"
                    });
                }
            }
        })
    }
}