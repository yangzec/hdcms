//选择方法节点同时选择上层控制器
$(function () {
    $("input[lab='method']").click(function () {
        $(this).parents("ul").prev("h3").find("input").attr("checked", "checked");
    })
    //全选
    $("a[lab='all']").click(function () {
        $(this).parents("div").eq(0).find("input").attr("checked", "checked");
    })
    $("a[lab='cancel']").click(function () {
        $(this).parents("div").eq(0).find("input").removeAttr("checked");
    })
})