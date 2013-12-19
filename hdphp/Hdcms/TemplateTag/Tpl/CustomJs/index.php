<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>自定义JS列表</title>
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
            1 页面生成HTML后，有新文章添加时并不会及时显示，这时可以使用js标签功能<br/>
            2 js标签会及时显示文章内容，但不适用大量使用<br/>
        </div>
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}" class="action">标签列表</a></li>
                <li><a href="{|U:'add'}">添加自定义JS标签</a></li>
            </ul>
        </div>
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">tid</td>
                <td>标签名称</td>
                <td class="w150">添加时间</td>
                <td class="w150">操作</td>
            </tr>
            </thead>
            <list from="$tag" name="t">
                <tr>
                    <td>{$t.id}</td>
                    <td>
                        {$t.name}
                    </td>
                    <td>
                        {$t.addtime|date:"Y-m-d H:i",@@}
                    </td>
                    <td align="right">
                        <a href="__CONTROL__&m=get_js&id={$t.id}">JS调用</a><span
                            class="line">|</span>
                        <a href="__CONTROL__&m=edit&id={$t.id}">编辑</a><span
                            class="line">|</span>
                        <a href="javascript:;" onclick="del({$t.id})">删除</a>
                    </td>
                </tr>
            </list>
        </table>
    </div>
</form>