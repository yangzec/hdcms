<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理员角色</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">角色列表</a></li>
            <li><a href="{|U:'add'}">添加角色</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">rid</td>
            <td class="w100">角色名称</td>
            <td>描述</td>
            <td width="180">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$role" name="r">
            <tr>
                <td>{$r.rid}</td>
                <td>{$r.rname}</td>
                <td>{$r.title}</td>
                <td>
                    <a href="{|U:'Admin/index',array('rid'=>$r['rid'])}">成员</a> |
                    <a href="{|U:'edit',array('rid'=>$r['rid'])}">修改</a> |
                    <a href="javascript:;" onclick="del({$r.rid})">删除</a> |
                    <a href="{|U:'Access/set_access',array('rid'=>$r['rid'])}">权限设置</a>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>