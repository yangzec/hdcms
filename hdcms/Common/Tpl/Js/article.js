$(function () {
    //不能选择封面栏目
    $("select[name='cid']").change(function () {
        if ($("select[name='cid'] option:selected").attr('cattype') == 2) {
            alert("栏目不能为频道封面，请更改");
        }
    })
    $("form").submit(function () {
        //对form表单验证  对图片上传form不验证
        if (!$(this).attr("target")) {
            //验证标题不能为空
            if (!$("input[name='title']").val()) {
                alert("标题不能为空");
                return false;
            }
            //验证标题不能长度
            if ($(this).val().length > 60) {
                alert("标题不能超过60个字");
                return false;
            }
            //不能选择封面栏目
            if ($("select[name='cid'] option:selected").attr('cattype') == 2) {
                alert("栏目不能为频道封面，请更改");
                return false;
            }
            //验证内容
            if (window.UE && $("#content").length > 0 && !UE.getEditor('content').getContent()) {
                alert("内容不能为空");
                return false;
            }
            //验证自定义字段
            $("input[onblur]").trigger("blur");
            if ($("input[validation='0']").length > 0) {
                return false;
            }
            return true;
        }
    })
})
//自定义上传图片字段，当鼠标移动到上面时，显示放大图片，移出图片时放大图片隐藏
$(function () {
    $("img[lab='upload_field_img']").mouseover(function (event) {
        var _top = $(window).height() - 450;
        var _src = $(this).attr("src");
        var _div = "<div id='upload_field_thumb' style='position: absolute;'><img src='" + _src + "' width='260' height='260'/></div>";
        $("body").append(_div);
        var _offset = $(this).offset();
        $("#upload_field_thumb").css({top: _offset.top - 50, left: _offset.left + 90, "z-index": 100});
    })
    $("img[lab='upload_field_img']").mouseleave(function (event) {
        $("#upload_field_thumb").remove();
    });
})
//删除图片
$(function () {
    //移到图片上显示删除按钮
    $("span.upload_field_img").mouseenter(function () {
        $(this).find("a").show();
    }).mouseleave(function () {
            $(this).find("a").hide();
        })

})
//删除图片
function delUploadFieldImg(obj,name) {
    var data = {
        path: $("[name='" + name + "']").val(),
        name: name
    };
    var aid = $("[name='aid']").val();
    var mid = $("[name='mid']").val();
    if (aid) {
        data.aid = aid;
        data.mid = mid;
    }
    $.post(CONTROL + "&m=delUploadFieldImg", data, function (data) {
        if (data == 1) {
            $("[name='" + name + "']").val("");
            $(obj).parent().remove();
        }
    })
}