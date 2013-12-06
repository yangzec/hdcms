<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理员管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">管理员</a></li>
            <li><a href="{|U:'add'}">添加管理员</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">aid</td>
            <td>用户名</td>
            <td>所属角色</td>
            <td>登录IP</td>
            <td>登录时间</td>
            <td>真实姓名</td>
            <td>邮箱</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$admin" name="a">
            <tr>
                <td width="30">{$a.uid}</td>
                <td>{$a.username}</td>
                <td>{$a.rname}</td>
                <td>{$a.ip}</td>
                <td>{$a.logintime}</td>
                <td>{$a.realname}</td>
                <td>{$a.email}</td>
                <td>
                        <a href="{|U:'edit',array('uid'=>$a['uid'])}">修改</a>|
                    <if value="$a.username==C('WEB_MASTER')">
                        <span>删除</span>
                       <else>
                           <a href="javascript:;" onclick="del({$a.uid})">删除</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>