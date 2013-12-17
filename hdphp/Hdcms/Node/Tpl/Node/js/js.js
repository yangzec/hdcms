//表单验证
function add_validate() {
    $("form").validation({
        //验证规则
        title: {
            rule: {
                required: true
            },
            error: {
                required: "名称不能为空"
            }
        },
        app: {
            rule: {
                required: true
            },
            error: {
                required: "项目不能为空"
            }
        },
        control: {
            rule: {
                required: true
            },
            error: {
                required: "模块不能为空"
            }
        },
        method: {
            rule: {
                required: true
            },
            error: {
                required: "方法不能为空"
            }

        }
    })
}
//等级为3时添加控制器
var control="";
function set_control(obj) {
    if ($("option:selected", obj).attr("level") == 2) {
        var _html = '<table>\
                <tr>\
                <td class="w100">项目:</td>\
                <td>\
                <input type="text" name="app" class="w200"/>\
            </td>\
            </tr>\
                <tr>\
                    <td>模块:</td>\
                    <td>\
                        <input type="text" name="control" class="w200"/>\
                    </td>\
                </tr>\
                <tr>\
                    <td>方法:</td>\
                    <td>\
                        <input type="text" name="method" class="w200"/>\
                    </td>\
                </tr>\
                <tr>\
                    <td>参数:</td>\
                    <td>\
                        <input type="text" name="param" class="w300"/>\
                        <span class="message">例:cid=1&mid=2</span>\
                    </td>\
                </tr></table>';
        if (control) {
            $("#control").html(control);
        } else {
            $("#control").html(_html);
        }
    } else {
        $("#control").html("");
    }
}
$(function () {
    control = $.trim($("#control").html());
    $("[name='pid']").trigger("change");
})
//添加或修改菜单
$(function () {
    $("form").submit(function () {
        add_validate();
        if ($(this).is_validation()) {
            var _post = $(this).serialize();
            $.ajax({
                type: "POST",
                url: METH,
                dataType: "JSON",
                cache: false,
                data: _post,
                success: function (stat) {
                    if (stat == 1) {
                        $.dialog({
                            msg: "操作成功,请刷新页面!",
                            type: "success",
                            close_handler: function () {
                                location.href = CONTROL;
                            }
                        });
                    } else {
                        $.dialog({
                            msg: "操作失败!",
                            type: "error"
                        });
                    }
                }
            })
        }
        return false;
    })
})

//删除菜单
function del(nid) {
    if (confirm("确定删除菜单吗?")) {
        $.get(CONTROL + "&m=del&nid=" + nid, function (stat) {
            if (stat == 1) {
                $.dialog({
                    "msg": "删除成功,请刷新页面!",
                    "type": "success",
                    "close_handler": function () {
                        window.location.reload();
                    }
                });
            } else {
                $.dialog({
                    "msg": "请先删除子菜单",
                    "type": "error"
                });
            }
        })
    }
}
//编辑时验证pid是否合法
function check_pid() {
    //菜单id
    var nid = $("input[name='nid']").val();
    var pid = $("[name='pid']").val();
    $.ajax({
        type: "POST",
        url: CONTROL + "&m=check_pid",
        data: {nid: nid, pid: pid},
        cache: false,
        success: function (stat) {
            //删除提示信息span
            $("td.pid span").remove();
            $("td.pid").append("<span id='hd_pid' class='validation'>项目不能为空</span>");
            if (stat == 1) {
                $("[name='pid']").removeAttr("validation");
                $("td.pid span").removeClass("error").html("");
                return true;
            } else {
                $("[name='pid']").attr("validation", 0);
                $("td.pid span").addClass("error").html("不能为子菜单或自身");
                return false;
            }
        }
    });
}
//更改列表排序
function update_order() {
    var data = $("[name*='list_order']").serialize();
    $.post(CONTROL + "&m=update_order", data, function (stat) {
        if (stat == 1) {
            $.dialog({
                "msg": "排序修改成功,请刷新页面!",
                "type": "success",
                "close_handler": function () {
                    location.href = URL;
                }
            });
        } else {
            $.dialog({
                "msg": "排序修改失败",
                "type": "error"
            });
        }
    })
}

//更新缓存
function update_cache() {
    $.ajax({
        url: CONTROL + "&m=update_cache",
        cache: false,
        success: function (stat) {
            if (stat == 1) {
                $.dialog({
                    msg: "缓存更新成功,请刷新页面!",
                    type: "success",
                    close_handler: function () {
                        location.href = METH;
                    }
                });
            } else {
                $.dialog({
                    msg: "缓存更新失败!",
                    type: "error"
                });
            }
        }
    })
}




































