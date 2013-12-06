//收缩
$(function () {
    $("span.add").click(function () {
        if ($(this).text() == '+') {
            $(this).parents("li").find("ul").show();
            $(this).parents("li").find("span.add").text("-");
            $(this).text("-");
        } else {
            $(this).parents("li").find("ul").hide();
            $(this).parents("li").find("span.add").text("+");
            $(this).text("+");
        }
    })
})
//复选框选后，将子集checked选中
$(function () {
    $("input").click(function () {
        var _obj = $(this);
        //将所有子节点选中
        $(this).parents("li").eq(0).find("input").not($(this)).each(function (i) {
            $(this).attr("checked", _obj.attr("checked") == "checked");
        });
        //将父级NID选中
        if ($(this).attr("checked")) {
            $(this).parents("li").each(function (i) {
                $(this).children("label,div").find("input").attr("checked", "checked");
            })
        }
    })
})
//修改权限
$(function () {
    $("form").submit(function () {
        var post = $(this).serialize();
        $.ajax({
            type: "POST",
            url: METH,
            dataType: "JSON",
            cache: false,
            data: post,
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "操作成功",
                        type: "success",
                        close_handler: function () {
                            location.href = APP + "&c=Role";
                        }
                    });
                }
            }
        })
        return false;
    })
})