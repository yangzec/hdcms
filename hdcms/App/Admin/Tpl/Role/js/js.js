//表单验证 添加管理员
$(function () {
    $("form").validation({
        //验证规则
        rname: {
            rule: {
                required: true,
                ajax: {url: CONTROL + "&m=check_role", field: ["rid"]}
            },
            error: {
                required: "角色名不能为空",
                ajax: "角色已经存在"
            }
        }
    })
})
//删除角色 角色列表页
function del(rid) {
    if (confirm("确定删除角色吗？")) {
        $.get(CONTROL + "&m=del&rid=" + rid, function (data) {
            if (data.stat == 1) {
                $.dialog({
                    "msg": data.msg,
                    "type": "success",
                    "close_handler": function () {
                        window.location.reload();
                    }
                });
            }
        }, "JSON")
    }
}

//添加与修改管理员
$(function () {
    $("form").submit(function () {
        if ($(this).is_validation()) {
            $.ajax({
                type: "POST",
                url: METH,
                cache: false,
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    if (data.stat == 1) {
                        $.dialog({
                            msg: data.msg,
                            type: "success",
                            close_handler: function () {
                                location.href = CONTROL;
                            }
                        });
                    } else {
                        $.dialog({
                            msg: data.msg,
                            type: "error"
                        });
                    }
                }
            });
        }
        return false;
    })
})
//显示会员
function user_list(rid){

}







































