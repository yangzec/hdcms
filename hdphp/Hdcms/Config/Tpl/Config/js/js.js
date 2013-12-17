$(function () {
    //添加或修改栏目
    $("form").submit(function () {
        var _post = $(this).serialize();
        $.ajax({
            type: "POST",
            url: METH,
            dataType: "JSON",
            cache: false,
            data: _post,
            success: function (data) {
                if (data.stat == 1) {
                    $.dialog({
                        msg: data.msg,
                        type: "success",
                        close_handler: function () {
                            location.href = METH;
                        }
                    });
                }
            }
        })
        return false;
    })
})
