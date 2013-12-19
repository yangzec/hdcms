
//图片列表
var pic_list = {};
$(function () {
    $("li[lab='site']").click(function () {
        get_pics(ROOT+"/index.php?a=Upload&c=Upload&&m=site", $("div#site"))
    })
    $("li[lab='untreated']").click(function () {
        get_pics(ROOT+"/index.php?a=Upload&c=Upload&&m=site", $("div#untreated"))
    })
})
//点击分页
$("div.page1 a").live("click", function () {
    get_pics($(this).attr("href"), $(this).parents("div.hd_tab_content_div").eq(0));
    return false;
})
//异步获得图片列表，站内图片与未使用图片
function get_pics(_url, _div) {
    if (pic_list[_url]) {
        _div.html(pic_list[_url]);
    } else {
        var _html = "";
        $.ajax({
            url: _url,
            success: function (html) {
                pic_list[_url] = html;
                _div.html(pic_list[_url]);
            }
        })
    }
}
//选中图片
$("li.upload_thumb").live("click", function () {
    if ($("img", this).attr("selected") == "selected") {
        $(this).css({"border": "2px solid #DCDCDC"}).find("img").removeAttr("selected");
    } else if ($("img[selected='selected']").length >= num) {
        alert("不能选择超过" + num + "个文件!");
    } else {
        $(this).css({"border": "2px solid #03565E"}).find("img").attr("selected", "selected");
    }
})
//点击确定
$(function () {
    $("#pic_selected").click(function () {
        //parent对象
        var _p_obj = $(parent.document).find("#" + id);
        switch (type) {
            //缩略图
            case "thumb":
                var _input_obj = $(parent.document).find("[name=" + id + "]");
                var _w = _p_obj.width();
                var _h = _p_obj.height();
                _p_obj.css({width: _w, height: _h});
                //图片src
                var _img = $("img[selected='selected']").eq(0);
                _p_obj.attr("src", _img.attr("src"));
                _input_obj.val(_img.attr("path"));
                break;
            //images多图
            case "images":
                var img_div = $(parent.document).find("#" + id);
                //所有选中的图片
                var _img = $("img[selected='selected']");
                var _ul = "<ul>";
                $(_img).each(function (i) {
                    _ul += "<li><input type='text' name='" + name + "[url][]'  value='" + $(_img[i]).attr("path") + "' src='" + $(_img[i]).attr("src") + "' class='w400 images'/> ";
                    _ul += "<input type='text' name='" + name + "[alt][]' class='w200'/>";
                    _ul += " <a href='javascript:;' onclick='remove_upload(this)'>移除</a>";
                    _ul += "</li>";
                })
                _ul = _ul + "</ul>";
                img_div.append(_ul);
                break;
            //单图
            case "image":
                var input = $(parent.document).find("#" + id);
                var _img = $("img[selected='selected']").eq(0);
                input.val(_img.attr("path"));
                input.attr("src", _img.attr("src"));
                break;
        }
        close_window();
    })
})
//关闭
function close_window() {
    $(parent.document).find("[class*=modal]").remove();
}




































