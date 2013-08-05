//$(function () {
//    $(".tpl_list li div.shade").css({"opacity": 0.85});
//    //默认模板隐藏
//    $(".tpl_list li.action div.shade").hide();
//})
///**更换模板***/
//$(function () {
//    $("input[type='radio']").click(function () {
//        //显示所有Li上的遮罩
//        $(".tpl_list li .shade").show();
//        //得到当前占击Li的索引数
//        var _index = $(".tpl_list li").index(this);
//        //AJAX更改配置表中的模板风格
//        $.post(CONTROL + "&updateStyle", {'style': $(this).attr('name')}, function (data) {
//            if (data == 1) {
//                $(".tpl_list li").eq(_index).find(".shade").hide();
//                window.location.reload();
//            }
//        })
//    })
//})