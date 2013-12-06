//删除属性
function del_flag(fid) {
    if (!confirm("确定要删除属性吗？")) {
        return false;
    }
    $.ajax({
        type: "POST",
        url: CONTROL + "&m=del_flag",
        dataType: "JSON",
        data: {fid: fid},
        success: function (data) {
            var type = data.stat == 1 ? "success" : "error";
            $.dialog({
                "msg": data.msg,
                "type": type,
                "timeout": 1,
                "close_handler": function () {
                    window.location.reload();
                }
            });
        }

    })
}
//修改属性
$(function () {
    $("form#edit_form").submit(function () {
        var post_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=edit",
            dataType: "JSON",
            data: post_data,
            success: function (data) {
                var type = data.stat == 1 ? "success" : "error";
                $.dialog({
                    "msg": data.msg,
                    "type": type,
                    "timeout": 1,
                    "close_handler": function () {
                        window.location.reload();
                    }
                });
            }

        })
        return false;
    })
})
//添加属性
function add_flag() {
    $.modal({
        title: "添加属性",
        width: 550,
        height: 200,
        button: false,
        content: "<iframe scrolling='yes' style='height:100%;' src='" + CONTROL + "&m=add'></iframe>"
    });
}
//添加属性ajax
$(function () {
    $("form#add_form").submit(function () {
        if ($.trim($("[name='flagname']").val())) {
            var post_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: CONTROL + "&m=add",
                dataType: "JSON",
                data: post_data,
                success: function (data) {
                    alert(data.msg);
                    parent.window.location.reload();
                }

            })
        } else {
            parent.window.location.reload();
        }
        return false;
    })
})