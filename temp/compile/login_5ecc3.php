<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS后台登录</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Login&m=login';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Login';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Login&m=login';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Login';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Login/css/reg.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Login/js/js.js"></script>
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
            <form action="<?php echo U('reg');?>" method="post" onsubmit="return false;">
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
                            <img src="<?php echo U('code');?>" class="code" style="cursor: pointer;"
                                 onclick="this.src='<?php echo U('code');?>&'+Math.random()"/>
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
            还没有帐号？<a href="<?php echo U('reg');?>">立即注册！»</a>
        </div>
    </div>
</div>
</body>
</html>