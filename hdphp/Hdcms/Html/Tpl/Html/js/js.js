//缓存栏目数据
//var category = {};
//$(function () {
//    $.get(CONTROL + "&m=get_category", function (data) {
//        category = data;
//    }, "json");
//})
//更改模型后
$(function () {
    $("#mid").change(function () {
        var mid = $(this).val();
        var html = "<option value='0' selected='selected'>不限栏目</option>";
        var attr = "";
//        $("#cid option:gt(0)").remove();
        for (var i in category) {
            if (mid != 0 && category[i].mid != mid) {
                continue;
            }
            if (mid > 0) {
                attr = category[i].cattype == 1 ? "" : "disabled='disabled' class='disabled'";
            }
            html += "<option value='" + category[i].cid + "' " + attr + ">" + category[i].catname + "</option>";
        }
        $("#cid").html(html);
        //开启或关闭详细选项选项
        if (mid == 0) {
            $("tr:gt(2)").hide();
        } else {
            $("tr:gt(2)").show();
        }
    })
    $("#mid").trigger("change");
})
//更新
function form_submit(type) {
    var html = "<input type='hidden' name='type' value='" + type + "'/>";
    //验证
    switch (type) {
        case "new":
            if (!$.trim($("[name='total_row']").val())) {
                alert("最新发布的条数不能为空");
                return false;
            }
            break;
        case "time":
            var start_time = $.trim($("[name='start_time']").val());
            var end_time = $.trim($("[name='end_time']").val());
            if (!start_time || !end_time) {
                alert("起时或终止时间不能为空");
                return false;
            }
            break;
        case "id":
            var start_id = $.trim($("[name='start_id']").val());
            var end_id = $.trim($("[name='end_id']").val());
            if (!start_id || !end_id) {
                alert("起时或结束ID不能为空");
                return false;
            }
            break;
    }
    $("form").append(html);
    $("form").trigger("submit");
}