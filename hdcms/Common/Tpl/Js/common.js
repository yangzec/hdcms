/**
 * 缩略图上传
 * @param obj [input:type=file]表单对象
 * @param action form表单提交的action
 * @param target iframe元素
 * @param _input 记录图片地址的input表单
 * @param picdiv 显示缩略图的div元素
 */
function thumbUpload(obj, action, target, _input, picdiv) {
    var form = $(obj).parents("form");//表单
    $action = form.attr("action");//原action
    form.attr("action", action + "&name=" + _input + "&div=" + picdiv);
    form.attr("target", target);//更改上传地址为，iframe
    form.submit();//上传
    form.attr("action", $action);//将原来的action还原回来
    form.removeAttr("target");//清除target
    var _div = $("." + picdiv);//放置图片的div
    _div.append('图片上传中...');
}
/**
 * 选择颜色
 * @param obj 颜色选择对象，按钮对象
 * @param _input 颜色name=color表单
 */
function selectColor(obj, _input) {
    if ($("div.colors").length == 0) {
        var _div = "<div class='colors' style='width:80px;height:160px;position: absolute;z-index:999;'>";//颜色块
        var colors = ["#f00f00", "#272964", "#4C4952", "#74C0C0", "#3B111B", "#147ABC", "#666B7F", "#A95026", "#7F8150"
            , "#F09A21", "#7587AD", "#231012", "#DE745C", "#ED2F8D", "#B57E3E", "#002D7E", "#F27F00", "#B74589"
        ];
        for (var i = 0; i < 16; i++) {
            _div += "<div color='" + colors[i] + "' style='background:" + colors[i] + ";width:20px;height:20px;float:left;cursor:pointer;'></div>"
        }
        _div += "</div>";
        $("body").append(_div);
        $(".colors").css({top: $(obj).offset().top + 30, left: $(obj).offset().left});
    }
    $("div.colors").show();
    $("div.colors div").click(function () {
        $("div.colors").hide();
        var _c = $(this).attr("color");
        $("[name='" + _input + "']").val(_c);
        $("[name='title']").css({color: _c});
    })
}

/** 图片上传***/
function selectImage(obj) {
    var inputlab = $(obj).prev().attr("lab");
    window.open(CONTROL + "&m=uploadImage&lab=" + inputlab, 'newwindow', 'height=400,width=650,top=100,left=200,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');
}
/**
 在弹出窗体中选择上传图片，修改父级input
 */
function updateImageInput(obj) {
    var path = $(obj).attr("path");
    var inputLab = $(obj).attr("inputlab");
    $(opener.document).find("input[lab='" + inputLab + "']").val(path);
    var img_id = "#" + $(opener.document).find("input[lab='" + inputLab + "']").attr("name") + "_thumb";
    $(opener.document).find(img_id).attr("src", ROOT + "/" + path).css({width: 80, height: 80});
    window.close();

}
/**
 * 自定义上传图片字段，当鼠标移动到上面时，显示放大图片，移出图片时放大图片隐藏
 */
$(function () {
    $("img[lab='upload_field_img']").mouseover(function (event) {
        var _top = $(window).height() - 450;
        var _src = $(this).attr("src");
        var _div = "<div id='upload_field_thumb' style='position: absolute;'><img src='" + _src + "' width='260' height='260'/></div>";
        $("body").append(_div);
        var _offset = $(this).offset();
        $("#upload_field_thumb").css({top: _offset.top-50,left: _offset.left+90,"z-index":100});
    })
    $("img[lab='upload_field_img']").mouseout(function (event) {
        $("#upload_field_thumb").remove();
    });
})
/**
 * 自定义字段验证
 * @param obj 表单对象
 * @param required 是否必须验证
 * @param validation 验证正则
 * @param message 提示文字
 * @param error 出错提示文字
 * @returns {boolean}
 */
function checkField(obj, required, validation, message, error) {
    //移除validation属性，必须验证与验证不通过的表单会添加validation且属性值为0
    $(obj).removeAttr("validation");
    var _val = $(obj).val();
    //如果内容为空并且不是必须输入时
    if (_val == '' && !required) {
        $(obj).next("span").html(message).removeClass("error").removeClass("success");
        return true;
    }
    //必须验证字段 验证失败
    if (!validation.test(_val)) {
        $(obj).next("span").html(error).removeClass("success").addClass("error");
        $(obj).attr("validation", 0);//验证失败添加属性
        return false;
    }
    $(obj).next("span").html("输入正确").removeClass("error").addClass("success");
    return false;
}
/**
 * 验证表单获利焦点时设置提示内容
 * @param message
 */
function checkFieldMsg(obj, message) {
    message && $(obj).next("span").html(message).removeClass("error").removeClass("success");
}

//选择模板
$(function () {
    $("button.select_tpl").click(function () {
        $.modal({
            content: "<iframe src='#'></iframe>"
        });
        $("div.modal iframe").attr("src", CONTROL + "&m=selectTpl&action=" + $(this).attr('action'), {"action": $(this).attr("list_tpl")});
        $("div.modal").show();
    })
})
//弹窗IFRAME中选择模板
$(function () {
    $("a.select").click(function () {
        //父层表单名称
        var input_name = $(this).attr("action");
        $(window.parent.document.body).find("input[name='" + input_name + "']").val($(this).attr("href"));
        $(window.parent.document.body).find("div.modal").hide();
        $(window.parent.document.body).find("div.modal .content").html("<iframe src='#'></iframe>");
        return false;
    })
})
