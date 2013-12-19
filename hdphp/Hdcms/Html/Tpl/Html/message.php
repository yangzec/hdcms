<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>静态生成-提示信息</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="modal" style="position:absolute;width:450px; height: 180px; top:50%;left:50%;margin-top:-180px;margin-left:-450px;z-index: 1000;">
    <div class="modal_title">hdcms消息</div>
    <div class="content" style="height:90px;">
        <div class="modal_message">
            <strong class="success"></strong>
            <span>{$message}</span>
            <?php if(is_null($url)):?>
            <input type="button" style="position: absolute;bottom: 10px;left: 50%;margin-left: -50px;" class="btn" onclick="window.location.href='{$success_url}'" value="返回历史页面"/>
            <?php endif;?>
        </div>
    </div>
</div>
</body>
</html>