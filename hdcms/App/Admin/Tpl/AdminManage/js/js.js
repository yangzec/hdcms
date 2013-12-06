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
                        msg: "修改成功!",
                        type: "success",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        msg: "修改失败",
                        type: "success"
                    });
                }
            }
        })
    })
})