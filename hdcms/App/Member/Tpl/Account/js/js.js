$(function () {
    $("li.list-item").click(function () {
        $("li.list-item a").removeClass("active");
        $("a", this).addClass("active");
        var i = $(this).index();
        $("ul.tab_menu li").eq(i).trigger("click");
    })
    $("li.list-item a.action").click();
})
//表单验证
$(function () {
    $("form").validation({
        //验证规则
        realname: {
            rule: {
                required: true
            },
            error: {
                required: "呢称不能为空"
            }
        },
        email: {
            rule: {
                required: true
            },
            error: {
                required: "邮箱不能为空"
            }
        }
    })
})