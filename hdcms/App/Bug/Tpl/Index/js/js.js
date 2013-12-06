function del() {
    $.ajax({
        url: CONTROL + "&m=del",
        data: $("input").serialize(),
        type: "post",
        success: function (stat) {
            if (stat == 1) {
                $.dialog({
                    msg: "操作成功",
                    type: "success",
                    close_handler: function () {
                        location.href = URL;
                    }
                });
            }
        }
    })
}
//全选
function select_all(obj) {
    $("input[name*='bid']").attr("checked",$(obj).attr("checked") == "checked");
}