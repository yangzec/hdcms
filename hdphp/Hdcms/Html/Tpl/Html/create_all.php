<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成栏目静态</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form method="post" action="__CONTROL__&m=make_all">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            1 一键更新全生成全站静态，包括：首页，栏目列表页，内容页。<br/>
            2 一键更新时间会相对较长，请耐心等待
        </div>
        <div class="table_title">一键更新</div>
        <table class="table2">
            <tr><td>
            <input type="button" value="开始更新" class="btn btn-primary" onclick="form_submit('all')"/></td>
            </tr>
        </table>
    </div>
</form>