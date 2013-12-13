$(function () {
    $("[name='from_type']").click(function () {
        var t = parseInt($("[name='from_type']:checked").val());
        $("div#t_aid,div#f_cat").hide().find("textarea,select").attr("disabled", "disabled");
        switch (t) {
            //文章移动
            case 1:
                $("div#t_aid").show().find("textarea").removeAttr("disabled");
                break;
            //栏目移动
            case 2:
                $("div#f_cat").show().find("select").removeAttr("disabled");
                break;
        }
    })
})
//移动
$(function () {
    $("form").submit(function () {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=move_content",
            dataType: "JSON",
            cache: false,
            data: $(this).serialize(),
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "移动成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        msg: "移动失败",
                        type: "error",
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                }
            }
        })
    })
    //关闭窗口
    $("#close_window").click(function(){
        parent.location.reload();
    })
})