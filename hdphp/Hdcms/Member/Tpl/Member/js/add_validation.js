//表单验证 添加管理员
$(function () {
    $("form").validation({
        //验证规则
        username: {
            rule: {
                required: true,
                ajax: CONTROL + "&m=check_admin"
            },
            error: {
                required: "会员名不能为空",
                ajax: "会员已经存在"
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
        },
        email: {
            rule: {
                email: true
            },
            error: {
                email: "邮箱输入错误"
            }

        }
    })
})