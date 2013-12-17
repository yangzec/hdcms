$(function () {
    $(".tpl-list li").mouseover(function () {
        $(this).addClass("active")
    }).mouseout(function () {
            $(this).removeClass("active")
        })
})
//选择模板
function select_style(dir_name) {
    $.ajax({
        url: CONTROL + "&m=select_style",
        dataType: "JSON",
        cache: false,
        data: {dir_name: dir_name},
        success: function (stat) {
            if (stat == 1) {
                $.dialog({
                    msg: "操作成功",
                    type: "success",
                    close_handler: function () {
                        location.href = URL;
                    }
                });
            } else {
                $.dialog({
                    msg: "操作失败",
                    type: "error"
                });
            }
        }
    })
}

