<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>更新网站首页</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <style type="text/css">
        ul, ol, li {
            list-style: none;
        }
        div#view{
            margin-top:10px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">标签列表</a></li>
            <li><a href="__URL__" class="action">JS调用</a></li>
        </ul>
    </div>
    <div class="table_title">温馨提示</div>
    <div class="help">
        以下为JS调用代码：
    </div>
    <textarea class="w700 h100" style="font-size:16px;">{$script}</textarea>

    <div id="view">
        <div class="table_title">预览</div>
        {$script}
    </div>
</div>
</body>
</html>