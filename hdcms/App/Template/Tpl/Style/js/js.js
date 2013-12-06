$(function () {
    $(".tpl-list li").mouseover(function () {
        $(this).css({border: "solid 5px #09AEEF"})
    }).mouseout(function () {
            $(this).css({border: "solid 5px #dcdcdc"})
        })
})
//选择模型
function select_tpl(dir_name) {
    $.ajax({
        url: CONTROL + "&m=select_tpl",
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

