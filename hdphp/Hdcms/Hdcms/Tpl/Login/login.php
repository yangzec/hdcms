<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS后台登录</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/Css/css.css"/>
    <js file="__CONTROL_TPL__/Js/js.js"/>
</head>
<body>
<div class="header">
    <div class="links">
        <a href="http://www.houdunwang.com">后盾网PHP培训</a> |
        <a href="http://www.hdphp.com">HDCMS</a>
    </div>
</div>
<div class="main">
    <div class="pics">
    </div>
    <div class="login">
        <div class="title">
            后台登录
        </div>
        <div id="tips" class="tips"></div>
        <div class="web_login">
            <div class="login_form">
                <div id="error_tips" class="error_tips">
                    <span id="error_logo" class="error_logo"></span>
                    <span id="err_m" class="err_m">12</span>
                </div>
                <form action="{|U:'login'}" method="post" target="checkLogin">
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="username" title="帐号" value="帐号" class="empty w300"/>
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="password" name="password">
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="code" title="验证码" value="验证码" class="empty"/>
                        </div>
                    </div>

                    <div class="verifyimgArea">
                        <img src="{|U:'code'}" class="code" style="cursor: pointer;float:left;"
                             onclick="this.src='{|U:'code'}&'+Math.random()"/>
                        <a href="javascript:void(0);">看不清，换一张</a>
                    </div>
                    <div class="send">
                        <input type="submit" class="btn2" value="登录"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<iframe name="checkLogin" style="display:none;"></iframe>
</body>
</html>