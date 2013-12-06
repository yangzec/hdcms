//------------------------------------------全选与反选  checkbox

$(function () {
    //checkbox选择
    $(".s_all_ck").click(function () {
        $("input[name*='table']").attr("checked", !!$(this).attr("checked"));
    })
    //全选
    $("input.s_all").click(function () {
        $("input[name*='table']").attr("checked", "checked");
    })
    //反选x
    $(".r_select").click(function () {
        $("input[name*='table']").each(function () {
            $(this).attr("checked", !this.checked);
        });
    })
})
//--------------------------------------------------删除与还原
$(function () {
//删除表
    $("#del").click(function () {
        if (check_select_table()) {
            if (confirm("确定删除目录吗？")) {
                $.ajax({
                    type: "POST",
                    url: CONTROL + "&m=del",
                    data: $("[name*='table']:checked").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $.dialog({
                                msg: "删除成功!",
                                type: "success",
                                close_handler: function () {
                                    location.href = METH;
                                }
                            });
                        } else {
                            $.dialog({
                                msg: "删除失败，请检查备份目录权限!",
                                type: "success"
                            });
                        }
                    }
                })
            }
        }
    })
//还原
    $(".recovery").click(function () {
        var dir = $(this).attr("dir");
        $.modal({
            title: "HDCMS提示信息",
            width: 420,
            show: false,
            height: 160,
            button: false,
            content: "<iframe styel='display:none;' src='" + CONTROL + "&m=recovery&dir=" + dir + "' name='dialog_iframe' id='dialog_iframe'></iframe>"
        });
        $("div.modal").show();
        $("div.modal_bg").show();
    })
})

//--------------------------------------------------备份数据
//检查有没有选择表
function check_select_table() {
    if ($("[name*='table']:checked").length == 0) {
        alert("你还没有选择表");
        return false;
    }
    return true;
}
$(function () {
    $.modal({
        title: "HDCMS提示信息",
        width: 420,
        show: false,
        height: 160,
        button: false,
        content: "<iframe styel='display:none;' name='dialog_iframe' id='dialog_iframe'></iframe>"
    });
    $("form").submit(function () {
        if (check_select_table()) {
            $("div.modal").show();
            $("div.modal_bg").show();
            return true;
        }
        return false;
    })
//优化表
    $("#optimize").click(function () {
        if (check_select_table()) {
            $.ajax({
                type: "POST",
                url: CONTROL + "&m=optimize",
                data: $("[name*='table']:checked").serialize(),
                success: function (data) {
                    if (data == 1) {
                        $.dialog({
                            msg: "优化表成功!",
                            type: "success"
                        });
                    }
                }
            })
        }
    })
//修复表
    $("#repair").click(function () {
        if (check_select_table()) {
            $.ajax({
                type: "POST",
                url: CONTROL + "&m=optimize",
                data: $("[name*='table']:checked").serialize(),
                success: function (data) {
                    if (data == 1) {
                        $.dialog({
                            msg: "修复表成功!",
                            type: "success"
                        });
                    }
                }
            })
        }
    })
})