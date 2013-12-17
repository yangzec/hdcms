//预览
function view(url) {
    $("#view .modal-body").html("<img src='" + url + "'/>");
    $("#view").modal();
}
//删除
function del(id) {
    if (confirm("确定删除吗?")) {
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
}