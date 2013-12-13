//更换模板
function select_template(input_id) {
    if ($("#select_template").length == 0) {
        var html = '<div id="select_template" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"\
        aria-hidden="true">\
            <div class="modal-body" style="height: 400px;">\
            </div>\
            <div class="modal-footer">\
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>\
            </div>\
            </div>';
        $("body").append(html);
    }
    window.input_id = input_id;
    $('#select_template').modal({remote: WEB + '?a=Template&c=Template&m=select_tpl'})
}

<!--选择封面模板-->

//function select_tpl(input_id) {
//    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
//        <div class="modal-header">
//            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
//            <h3 id="myModalLabel">选择模板</h3>
//        </div>
//        <div class="modal-body">
//            <p>One fine body…</p>
//        </div>
//        <div class="modal-footer">
//            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
//            <button class="btn btn-primary">Save changes</button>
//        </div>
//    </div>
//
//    $.modal({
//        title: "选择模板",
//        width: 650,
//        height: 500,
//        button: true,
//        content: "<iframe scrolling='yes' style='height:100%;' src='" + APP + "&a=Template&c=Template&m=select_tpl&input_id=" + input_id + "'></iframe>"
//    });
//}
/**
 * 自定义字段验证
 * @param obj 表单
 * @param validataion 验证规则
 * @param msg 默认信息
 * @param error 错误信息
 * @param required 是否必须输入
 */
function field_check(obj, validataion, msg, error, required) {
    //没有验证规则
    if (validataion == '')return;
    //表单值
    var _val = $.trim($(obj).val());
    //提示信息span表单
    var _span = $(obj).next("span");
    $(obj).attr("validation", 1);
    _span.removeClass("error success");
    //表单为空且为非必填项时返回真
    if (!required && !_val) {
        _span.html(msg);
        return true;
    }
    //验证
    if (validataion.test(_val)) {
        $(obj).attr("validation", 1);
        _span.addClass("success");
        _span.text(msg);
    } else {
        $(obj).attr("validation", 0);
        _span.addClass("error").text(error || "输入错误");
    }
}
/**
 * 裁切图片
 * @param id img标签id
 */
function crop_image(id) {
    var src = WEB + "?a=Upload&c=Upload&m=crop_image&id=" + id;
    $.modal({
        title: false,
        width: 650,
        height: 500,
        button: false,
        content: "<iframe scrolling='yes' style='height:100%;' src='" + src + "'></iframe>"
    });
}
//移除缩略图
function remove_thumb(obj) {
    $(obj).siblings("img").attr("src", ROOT + "/hdcms/static/img/upload-pic.png");
    $(obj).siblings("input").val("");
}
/**
 * 文件上传
 * @param id    id
 * @param type 上传类型 thumb 缩略图  images多图
 * @param num 上传数量
 * @param name 表单名
 */
function file_upload(id, type, num, name) {
    var url = WEB + "?a=Upload&c=Upload&id=" + id + "&type=" + type + "&num=" + num + "&name=" + name;
    //创建modal_file
    if ($("#modal_file").length == 0) {
        var html = '<div id="modal_file" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"\
        aria-hidden="true" style="height: 420px;width: 600px;">\
            <div class="modal-body" style="padding: 10px;height: 450px;">\
            <iframe src="' + url + '" style="width:100%;height:400px;"></iframe>\
            </div>\
        </div>';
        $("body").append(html);
    }
    $('#modal_file').modal()
//    $.modal({
//        title: false,
//        width: 650,
//        height: 500,
//        button: false,
//        content: "<iframe scrolling='yes' style='height:100%;' src='" + src + "'></iframe>"
//    });
}
//function file_upload(id, type, num, name) {
//    var src = WEB + "?a=Upload&c=Upload&id=" + id + "&type=" + type + "&num=" + num + "&name=" + name;
//    $.modal({
//        title: false,
//        width: 650,
//        height: 500,
//        button: false,
//        content: "<iframe scrolling='yes' style='height:100%;' src='" + src + "'></iframe>"
//    });
//}
//image || images上传图片显示预览
$(function () {
    $("input.images").live("mouseover",function () {
        if ($("#img_view").length == 0) {
            var div = "<div id='img_view' style='position:absolute;border:solid 5px #dcdcdc;padding:0px;'><img src='' width='205' height='183'/></div>";
            $("body").append(div);
        }
        var offset = $(this).offset();
        var _l = parseInt(offset.left) + 420;
        var _t = parseInt(offset.top) - 50;
        $("#img_view").css({left: _l, top: _t}).find("img").attr("src", $(this).attr("src")).end().fadeIn(200);

    }).live("mouseout", function () {
            $("#img_view").hide();
        })
})
/**
 * 删除图片
 * @param obj 按钮对象
 */
function remove_upload(obj) {
    $(obj).parent().remove();
}
