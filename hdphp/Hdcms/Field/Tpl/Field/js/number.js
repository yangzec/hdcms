//表单验证
$(function () {
    $("form").validation({
        num_integer: {//整数位数
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            }
        },
        num_decimal: {//小数位数
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            }
        },
        num_size: {//小数位数
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            },
            message: "px"
        },
        number_validation: {//验证规则
            rule: {
                regexp: /^\/.+\/$/
            },
            error: {
                regexp: "请输入正则"
            }
        }
    })
})