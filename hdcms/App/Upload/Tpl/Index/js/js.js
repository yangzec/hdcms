//预览
function view(path) {
    $.modal({
        title: "预览",
        width: 550,
        height: 450,
        button: true,
        content: "<div style='height:360px;overflow: hidden;vertical-align: middle;'><img src='" + path + "' style='width:550px;'/></div>"
    });
}
//删除
function del(id) {
    $.ajax({
        url: CONTROL + "&m=del&id=" + id,
        data: {id: id},
        dataType: "JSON",
        success: function (data) {
            if (data.stat == 1) {
                $.dialog({
                    msg: data.msg,
                    type: "success",
                    timeout: 3,
                    close_handler: function () {
                        location.href = URL;
                    }
                });
            } else {
                $.dialog({
                    msg: data.msg,
                    type: "error"
                });
            }
        }
    })
}