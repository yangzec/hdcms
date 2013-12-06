//表单验证
$(function () {
    $("form").validation({
        //验证规则
        username: {
            rule: {
                required: true
            },
            error: {
                required: "用户名不能为空"
            }
        },
        password: {
            rule: {
                required: true
            },
            error: {
                required: "密码不能为空"
            }
        },
        c_password: {
            rule: {
                required: true,
                confirm: "password"
            },
            error: {
                required: "确认密码不能为空",
                confirm: "两次密码不一致"
            }
        },
        qq: {
            rule: {
                regexp: /^\d+$/
            },
            error: {
                regexp: "QQ号只能为数字"
            }
        },
        email: {
            rule: {
                email: true
            },
            error: {
                email: "邮箱格式不正确"
            }
        },
        code: {
            rule: {
                required: true,
                ajax: CONTROL + "&m=check_code"
            },
            error: {
                required: "验证码不能为空",
                ajax: "验证码输入错误"
            }
        }
    })
    //注册
    $("form").submit(function () {
        if ($(this).is_validation()) {
            $.ajax({
                type: "POST",
                url: METH,
                cache: false,
                dataType: "json",
                data: $("form").serialize(),
                success: function (data) {
                    if (data.stat == 1) {
                        $.dialog({
                            msg: data.msg,
                            type: "success",
                            close_handler: function () {
                                location.href = APP;
                            }
                        });
                    } else {
                        $.dialog({
                            msg: data.msg,
                            type: "error"
                        });
                    }
                }
            })
        }
    })
})