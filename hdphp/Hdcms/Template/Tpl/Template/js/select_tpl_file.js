$(function () {
    //切换目录
    $(".dir").click(function () {
        var path = $(this).attr("path");
        var input_id = $(this).attr("input_id");
        var url = METH + "&path=" + path + "&input_id=" + input_id + "&_=" + Math.random();
        $.load("body", url);
    })
    //选择文件
    $(".file").click(function () {
        var input_id = $(this).attr("input_id");alert(3);
        $(parent.document).find("#" + input_id).val($(this).attr("path"));
        $(parent.document).find("[class*='modal']").remove();
        return false;
    })
})