<?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">属性管理</a></li>
            <li><a href="javascript:add_flag();">添加属性</a></li>
        </ul>
    </div>
    <form action="{|U:'edit'}" method="post" id="edit_form">
        <table class="table2">
            <thead>
            <tr>
                <td width="30">fid</td>
                <td>属性名称</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$flag" name="f">
                <tr>
                    <td>
                        {$f.fid}
                    </td>
                    <td>
                        <input type="text" name="flag[{$f.fid}]" value="{$f.flagname}"/>
                    </td>
                    <td>
                        <a href="javascript:;" onclick="del_flag({$f.fid})">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn1" id="updateSort" value="修改"/>
        </div>
    </form>
</div>
</body>
</html>