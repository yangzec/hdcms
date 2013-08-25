//删除栏目
$(function () {
    $("a.del_category").click(function () {
        var stat = confirm("确定删除栏目 [" + $(this).attr("cat_name") + "] 吗？");
        if (stat) {
            $.post($(this).attr("href"), function (data) {
                if (data.stat == 1) {
                    alert("栏目删除成功");
                    location.href=data.url;
                } else {
                    alert(data.message);
                }
            }, "json")
        }
        return false;
    })
})