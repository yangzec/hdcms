////登录与注册验证
//$(function () {
//    $("input[name='username']").focus(function () {
//        $("span#username").removeAttr("class").addClass("success").html("可以输入中文用户名");
//    }).blur(function () {
//            $(this).removeAttr("validation");
//            var _val = $.trim($(this).val());
//            if (_val.length == 0) {
//                $("span#username").removeAttr("class").addClass("error").html("用户名不能为空");
//                $(this).attr("validation", 0);
//                return;
//            }
//            $("span#username").removeAttr("class").html("");
//            //注册验证
//            if ($(this).attr("userIsExists")) {
//                $.post(CONTROL + "&m=checkUser", {username: _val}, function (data) {
//                    if (data == 0) {
//                        $("span#username").removeAttr("class").addClass("error").html("该用户名已存在");
//                    }
//                });
//            }
//        })
//    //验证密码
//    $("input[name='password']").focus(function () {
//        $("span#password").removeAttr("class").addClass("success").html("密码不能小于6位");
//    }).blur(function () {
//            $(this).removeAttr("validation");
//            var _val = $.trim($(this).val());
//            if (_val.length == 0) {
//                $("span#password").removeAttr("class").addClass("error").html("密码不能为空");
//                $(this).attr("validation", 0);
//                return;
//            }
//            var password2_val = $.trim($("input[name='password2']").val());
//            if (password2_val && password2_val != $("input[name='password']").val()) {
//                $("span#password2").removeAttr("class").addClass("error").html("两次密码不同");
//                $(this).attr("validation", 0);
//                return;
//            }
//            $("span#password").removeAttr("class").html("");
//        })
//    $("input[name='password2']").focus(function () {
//        $("span#password2").removeAttr("class").addClass("success").html("输入确认密码");
//    }).blur(function () {
//            $(this).removeAttr("validation");
//            var _val = $.trim($(this).val());
//            if (_val != $("input[name='password']").val()) {
//                $("span#password2").removeAttr("class").addClass("error").html("两次密码不同");
//                $(this).attr("validation", 0);
//                return;
//            }
//            $("span#password2").removeAttr("class").html("");
//        })
//    $("input[name='email']").focus(function () {
//        $("span#email").removeAttr("class").addClass("success").html("请输入邮箱");
//    }).blur(function () {
//            $(this).removeAttr("validation");
//            var _val = $.trim($(this).val());
//            if (_val && !/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i.test(_val)) {
//                $("span#email").removeAttr("class").addClass("error").html("邮箱输入错误");
//                $(this).attr("validation", 0);
//                return;
//            }
//            $("span#email").removeAttr("class").html("");
//        })
//    $("input[name='code']").blur(function () {
//        $(this).removeAttr("validation");
//        var _val = $.trim($(this).val());
//        if (_val.length == 0) {
//            $("span#code").removeAttr("class").addClass("error").html("验证码不能为空");
//            $(this).attr("validation", 0);
//            return;
//        }
//        $("span#code").removeAttr("class").html("");
//        $.post(CONTROL + "&m=checkCode", {code: _val}, function (data) {
//            if (data == 0) {
//                $("span#code").removeAttr("class").addClass("error").html("验证码输入错误");
//                $("#code_img").trigger("click");
//            }
//        });
//    })
//})
////提交表单
//$(function () {
//    $("form").submit(function () {
//        $("input").trigger("focus");
//        if ($("*[validation]").length) {
//            return false;
//        }
//    })
//})
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
