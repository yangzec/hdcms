//发表文章选择栏目
function select_category(mid) {
    var src = CONTROL + "&m=select_category&mid=" + mid;
    $.modal({
        title: "请选择栏目(灰色栏目不可选)",
        width: 450,
        height: 300,
        content: "<iframe scrolling='yes' style='height:100%;' src='" + src + "'></iframe>"
    });
    return false;
}

//添加或修改文章
$(function () {
    $("form").submit(function () {
        //验证标题
        if (!$.trim($("[name='title']").val())) {
            alert('标题不能为空');
            return false;
        }
        //验证内容
        if ($("[id^='hd_content_data']").length > 0 && !UE.getEditor('hd_content_data[content]').hasContents()) {
            alert("内容不能为空");
            return false;
        }
        if ($(this).is_validation()) {
            var _post = $(this).serialize();
            dialog_message("正在发表...");
            $.ajax({
                type: "POST",
                url: METH,
                dataType: "JSON",
                cache: false,
                data: _post,
                success: function (data) {
                    dialog_message("", true);
                    if (data.stat == 1) {
                        $.modal({
                            width: 230, height: 180, button: true,
                            title: '消息', cancel_title: "返回列表",
                            send_title: "继续发表",
                            message: data.msg,
                            type: "success",
                            send: function () {
                                window.location.reload();
                            },
                            cancel: function () {
                                top.location.href = CONTROL + "&m=index&mid=" + mid;
                            }

                        })
                    } else {
                        $.dialog({
                            msg: data.msg,
                            type: "error",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        }
        return false;
    })
})


//删除文章
function del(method, cid, aid) {
    if (confirm("确定要删除文章吗?")) {
        $.ajax({
            type: "get",
            url: CONTROL + "&m=" + method + "&cid=" + cid,
            dataType: "JSON",
            cache: false,
            data: {aid: aid},
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "删除成功！",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                }
            }
        })
    }
}