//删除管理员  管理员列表页
function del(uid) {
    if (confirm("确定删除管理员吗？")) {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=del",
            cache: false,
            dataType: "JSON",
            data: {uid: uid},
            success: function (data) {
                if (data.stat == 1) {
                    $.dialog({
                        msg: data.msg,
                        type: "success",
                        close_handler: function () {
                            location.href = CONTROL;
                        }
                    });
                } else {
                    $.dialog({
                        msg: data.msg,
                        type: "error"
                    });
                }
            }
        });
    }
}

//添加与修改管理员
$(function () {
    $("form").submit(function () {
        if ($(this).is_validation()) {
            $.ajax({
                type: "POST",
                url: METH,
                cache: false,
                data: $(this).serialize(),
                success: function (stat) {
                    if (stat == 1) {
                        $.dialog({
                            msg: "操作成功!",
                            type: "success",
                            close_handler: function () {
                                location.href = CONTROL;
                            }
                        });
                    } else {
                        $.dialog({
                            msg: "操作失败",
                            type: "error"
                        });
                    }
                }
            });
        }
        return false;
    })
})
//锁定用户
function lock_user(uid) {
    $.ajax({
        url: CONTROL + "&m=lock_user&uid=" + uid,
        cache: false,
        success: function (stat) {
            if (stat == 1) {
                $.dialog({
                    msg: "操作成功!",
                    type: "success",
                    close_handler: function () {
                        location.href = CONTROL;
                    }
                });
            } else {
                $.dialog({
                    msg: "操作失败",
                    type: "error"
                });
            }
        }
    });
}
//解锁用户
function unlock_user(uid) {
    $.ajax({
        url: CONTROL + "&m=unlock_user&uid=" + uid,
        cache: false,
        success: function (stat) {
            if (stat == 1) {
                $.dialog({
                    msg: "操作成功!",
                    type: "success",
                    close_handler: function () {
                        location.href = CONTROL;
                    }
                });
            } else {
                $.dialog({
                    msg: "操作失败",
                    type: "error"
                });
            }
        }
    });
}







































