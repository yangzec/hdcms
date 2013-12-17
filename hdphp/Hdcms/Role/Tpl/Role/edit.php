<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改角色</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">角色列表</a></li>
            <li><a href="javascript:;" class="action">修改角色</a></li>
        </ul>
    </div>
    <form action="{|U:'edit'}" method="post">
        <input type="hidden" name="rid" value="{$field.rid}"/>
        <table class="table1">
            <tr>
                <th class="w100">角色名称</th>
                <td>
                    <input type="text" name="rname" value="{$field.rname}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">角色描述</th>
                <td>
                    <textarea name="title" class="w300 h100">{$field.title}</textarea>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>