//表单验证
$(function () {
    $("form").validation({
        //验证规则
        username: {
            rule: {
                required: true
            },
            error: {
                required: "反馈者不能为空"
            }
        },
        email: {
            rule: {
                required: true
            },
            error: {
                required: "邮箱不能为空"
            }
        },
        content: {
            rule: {
                required: true
            },
            error: {
                required: "内容不能为空"
            }
        }
    })
})