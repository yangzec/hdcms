//点击2级菜单时选中所有子集
$(function () {
    $("div.level2 input").click(function () {
        var c = $(this).attr("checked");
        $(this).parents("tr").eq(0).find("input").attr("checked", c != undefined);
    })
})
//修改
$(function () {
    $("form").submit(function () {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=set_favorite",
            cache: false,
            data: $(this).serialize(),
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "操作成功",
                        type: "success",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                }
            }
        })
        return false;
    })
})