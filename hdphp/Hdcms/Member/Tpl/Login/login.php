<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS后台登录</title>
    <hdui/>
    <css file="__CONTROL_TPL__/css/reg.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="header">
    <div class="links">
        <a href="http://www.houdunwang.com">后盾网PHP培训</a> |
        <a href="http://bbs.houdunwang.com/forum-105-1.html">用户反馈</a>
    </div>
</div>
<div class="main">
    <div class="reg">
        <div class="title">
            <span>会员登录</span>
        </div>
        <div class="form">
            <form action="{|U:'reg'}" method="post" onsubmit="return false;">
                <table>
                    <tr>
                        <td class="80">用户名:</td>
                        <td class="w380">
                            <input type="text" name="username" class="w300"/>
                        </td>
                        <td>
                            <span id="hd_username"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>密码:</td>
                        <td>
                            <input type="password" name="password" class="w300">
                        </td>
                        <td>
                            <span id="hd_password"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>验证码:</td>
                        <td>
                            <input type="text" name="code" class="w100"/>
                            <img src="{|U:'code'}" class="code" style="cursor: pointer;"
                                 onclick="this.src='{|U:'code'}&'+Math.random()"/>
                            <a href="javascript:void(0);">看不清，换一张</a>
                        </td>
                        <td>
                            <span id="hd_code"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="submit" class="btn2" value="注册"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="login">
            还没有帐号？<a href="{|U:'reg'}">立即注册！»</a>
        </div>
    </div>
</div>
</body>
</html>