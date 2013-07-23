//选择模板
$(function () {
    $("button.select_tpl").click(function () {
        $.modal({
            content: "<iframe src='#'></iframe>"
        });
        $("div.modal iframe").attr("src", CONTROL + "&m=selectTpl&action=" + $(this).attr('action'), {"action": $(this).attr("list_tpl")});
        $("div.modal").show();
    })
})
//弹窗IFRAME中选择模板
$(function () {
    $("a.select").click(function () {
        //父层表单名称
        var input_name = $(this).attr("action");
        $(window.top.document.body).find("input[name='" + input_name + "']").val($(this).attr("href"));
        $(window.parent.document.body).find("div.modal").hide();
        $(window.parent.document.body).find("div.modal .content").html("<iframe src='#'></iframe>");
        return false;
    })
})
//删除栏目
$(function () {
    $("a.del_category").click(function () {
        var stat = confirm("确定删除栏目" + $(this).attr("cat_name") + "吗？");
        if (stat) {
            $.post($(this).attr("href"), function (data) {
                if (data) {
                    dialog("删除成功", 2);
                }
            })
        }
        return false;
    })
})