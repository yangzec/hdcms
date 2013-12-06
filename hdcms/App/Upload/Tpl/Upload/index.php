<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>文件管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
        {$get}
    </script>
</head>
<body>
<div class="wrap">
    <div class="tab">
        <ul class="tab_menu">
            <li lab="upload"><a href="#">上传文件</a></li>
            <li lab="site"><a href="#">站内图片</a></li>
            <li lab="untreated"><a href="#">未使用图片</a></li>
        </ul>
        <div class="tab_content">
            <div id="upload">
                {$upload}
            </div>
            <div id="site">

            </div>
            <div id="untreated">

            </div>
        </div>
    </div>
</div>
<div class="btn_wrap">
    <input type="button" class="btn1" id="pic_selected" value="确定"/>
    <input type="button" class="btn2 close_window" value="关闭" onclick="close_window();"/>
</div>
</body>
</html>