/**首页项目展示**/
$(function () {
    $("div.student_log ul.menu li").click(function () {
        var index = $(this).index();
        $("div.student_log ul.menu li").removeClass("action");
        $("div.student_log ul.menu li").eq(index).addClass("action");

        $("div.student_log ul.content li.box").removeClass("action");
        $("div.student_log ul.content li.box").eq(index).addClass("action");
        return false;
    })
})