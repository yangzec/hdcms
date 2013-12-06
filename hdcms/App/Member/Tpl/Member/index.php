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
            <li><a href="javascript:;" class="action">会员列表</a></li>
            <li><a href="{|U:'add'}">添加会员</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="50">用户id</td>
            <td>用户名</td>
            <td>呢称</td>
            <td>登录IP</td>
            <td>邮箱</td>
            <td>会员组</td>
            <td>最后登录</td>
            <td>积分点数</td>
            <td>状态</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$user" name="u">
            <tr>
                <td width="30">{$u.uid}</td>
                <td>{$u.username}</td>
                <td>{$u.realname}</td>
                <td>{$u.ip}</td>
                <td>{$u.email}</td>
                <td>{$u.gname}</td>
                <td>{$u.logintime|date:"Y-m-d H:i",@@}</td>
                <td>{$u.credits}</td>
                <td>
                    <if value="$u.status==1">正常
                        <else>锁定
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('uid'=>$u['uid'])}">修改</a>|
                    <if value="$u.status==1">
                        <a href="javascript:;" onclick="lock_user({$u.uid})">锁定</a>
                        <else>
                            <a href="javascript:;" onclick="unlock_user({$u.uid})">解锁</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>