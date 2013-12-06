<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成内容页静态</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form method="post" action="__METH__">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            建议创建计划任务，自动更新首页
        </div>
        <div class="table_title">规则设置</div>
        <br/>
        生成网站首页html文件 <input type="submit" value="开始更新" class="btn3" onclick="form_submit('new')"/>

    </div>
</form>