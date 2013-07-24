/**
 * 添加栏目验证
 */
$(function () {
    $("form").validation({
        //验证规则
        rules: {
            cat_name: {//验证id为email的表单
                message: {default: "栏目名称（可以输入中文）", "success": "输入正确", "error": "栏目名称不能为空"},
                rule: {required: true}
            },
            html_dir: {//静态目录
                message: {"error": "目录已经使用或目录名输入错误"},
                rule: {required: true, regexp: /^[a-z0-9]+$/i},
            },
            arc_dir: {//验证id为email的表单
                message: { "error": "输入错误"},
                rule: {required: true}
            },
            list_tpl: {//验证id为email的表单
                message: {"error": "输入错误"},
                rule: {required: true}
            },
            arc_tpl: {//验证id为email的表单
                message: { "error": "输入错误"},
                rule: {required: true}
            },
            list_html_url: {//验证id为email的表单
                message: { "error": "不能为空"},
                rule: {required: true}
            },
            arc_html_url: {//验证id为email的表单
                message: {  "error": "不能为空"},
                rule: {required: true}
            }

        }
    });
})
//验证错误处理程序
