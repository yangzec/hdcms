$(function () {
    //切换目录
    $(".dir").click(function () {
        var path = $(this).attr("path");
        var input_id = $(this).attr("input_id");
        var url = METH + "&path=" + path + "&input_id=" + input_id + "&_=" + Math.random();
        location.href = url;
    })
    //选择文件
    $(".file").click(function () {
        var input_id = $(this).attr("input_id");
        $(parent.document).find("#" + input_id).val($(this).attr("path"));
        $(parent.document).find("[class*='modal']").remove();
        return false;
    })
})