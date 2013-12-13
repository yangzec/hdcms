<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS - 生成静态</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
        $(function(){
            var _l = ($(window).width()-500)/2;
            var _t = ($(window).height()-200)/2;
            $(".modal").css({left:_l,top:_t})
            var of = $(".modal").offset();
            $(".btn3").css({left:180,top:140,position:"absolute"})
        })
    </script>
</head>
<body>
<div class="modal" style="width:450px; height: 180px; z-index: 1000;">
    <div class="modal_title">hdcms消息</div>
    <div class="content" style="height:90px;">
        <div class="modal_message">
            <strong class="success"></strong>
            <span>{$message}</span>
            <input type="button" style="position: absolute;bottom: 10px;left: 50%;margin-left: -50px;" class="btn" onclick="window.location.href='{$success_url}'" value="返回历史页面"/>
        </div>
    </div>
</div>
</body>
</html>