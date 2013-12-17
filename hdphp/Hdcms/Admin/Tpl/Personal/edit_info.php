<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改个人资料</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">个人资料修改</div>
    <form action="{|U:'edit_info'}" method="post" onsubmit="return hd_dialog(this)">
        <input type="hidden" name="uid" value="{$user.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    {$user.username}
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录时间</th>
                <td>
                    {$user.logintime|date:"Y-m-d",@@}
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录IP</th>
                <td>
                    {$user.ip}
                </td>
            </tr>
            <tr>
                <th class="w100">真实姓名</th>
                <td>
                    <input type="text" name="realname" class="w200" value="{$user.realname}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w200" value="{$user.email}"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn btn-primary" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>