//表单验证 添加管理员
$(function () {
    $("form").validation({
        //验证规则,
        password: {
            rule: {
                regexp: /^\w{5,}$/
            },
            error: {
                regexp: "密码不能小于5位"
            },
            message:"不修改密码请留空"
        },
        c_password: {
            rule: {
                confirm: "password"
            },
            error: {
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