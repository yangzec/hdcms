$(function () {
    $("form").validation({
        //验证规则
        old_password: {
            rule: {
                required: true,
                ajax: CONTROL + "&m=check_password"
            },
            error: {
                required: "旧密码不能为空",
                ajax: "密码输入错误"
            }
        },
        password: {
            rule: {
                required: true,
                regexp: /^\w{5,}$/
            },
            error: {
                required: "密码不能为空",
                regexp: "密码不能小于5位"
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
        }
    })
})

$(function () {
    $("form").submit(function () {
        if ($(this).is_validation()) {
            var post = $(this).serialize();
            $.ajax({
                type: "POST",
                url: METH,
                cache: false,
                data: post,
                success: function (stat) {
                    if (stat == 1) {
                        $.dialog({
                            msg: "修改成功!",
                            type: "success",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    } else {
                        $.dialog({
                            msg: "修改失败",
                            type: "success"
                        });
                    }
                }
            })
        }
    })
})