//点部菜单点击
$(function () {
    $(".top_menu ul.nav li a[lab]").click(function () {
        $(".top_menu ul.nav a[lab]").css("color","#cccccc");
        $(this).css("color","#74b029");
        $("div.menu_block").removeClass("action");
        var block = $("#" + $(this).attr("lab"));
        block.addClass("action");//显示菜单
        var url = $("li", block).eq(0).trigger("click");
        return false;
    })
    //初始点击第一个
    $(".top_menu ul.nav li a[lab]").eq(0).click();
})
//改变左侧菜单点击样式
$(function () {
    $("#left .menu_block ul.menu li").click(function () {
        //移除li样式
        $("#left .menu_block ul.menu li").removeClass("action");
        //当前点击的li添加栏目
        $(this).addClass("action");
        $("#right_content iframe").attr("src", $("a", this).attr("href"));
    })
})
//改变left与right高度
$(function () {
    resize_window_size();
    $(window).resize(function () {
        resize_window_size();
    })
})
function resize_window_size() {
    var h = $(window).height() - 41;
    $("#right_content").height(h);
    $("#left").height(h);
}
//显示顶部导航用户下拉菜单
$(function () {
    $("div.m_menu div.user").mouseover(function () {
        $("div.userinfo").show();
    }).mouseleave(function () {
            $("div.userinfo").hide();
        });
})