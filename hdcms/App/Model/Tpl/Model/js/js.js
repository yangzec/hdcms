//表单验证
$(function () {
    $("form").validation({
        //验证规则
        model_name: {
            rule: {
                required: true,
                ajax: {url: CONTROL + "&m=check_model_name", field: ["mid"]}
            },
            error: {
                required: "模型名称不能为空",
                ajax: "模型已经存在"
            }
        },
        tablename: {
            rule: {
                required: true,
                ajax: {url: CONTROL + "&m=check_table_name", field: ["mid"]}
            },
            error: {
                required: "表名不能为空",
                ajax: "数据表已经存在"
            }
        },
        description: {
            rule: {
                required: false
            },
            error: {
                required: "模型描述不能为空"
            }
        },
        control: {
            rule: {
                required: true
            },
            error: {
                required: "处理程序不能为空"
            }
        }
    })
})
//删除模型
function delModel(mid) {
    $.ajax({
        type: "GET",
        url: CONTROL + "&m=del",
        data: {mid: mid},
        dataType: "JSON",
        success: function (data) {
            if (data.stat == 1) {
                $.dialog({
                    msg: "删除模型成功",
                    type: "success",
                    timeout: 2,
                    close_handler: function () {
                        location.href = CONTROL;
                    }
                });
            } else {
                $.dialog({
                    msg: data.msg,
                    type: "error",
                    timeout: 2
                });
            }
        }
    })
}
//===========================添加&修改模型==========================
//Ajax提交
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
//更新缓存
function update_cache() {
    $.ajax({
        type: "POST",
        url: CONTROL + "&m=update_cache",
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