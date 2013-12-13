<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS后台登录</title>
    <script type='text/javascript' src='http://192.168.1.88/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='http://192.168.1.88/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://192.168.1.88/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://192.168.1.88/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://192.168.1.88/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://192.168.1.88/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://192.168.1.88/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://192.168.1.88/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://192.168.1.88/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://192.168.1.88/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://192.168.1.88/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
    <script type='text/javascript'>
		HOST = 'http://192.168.1.88';
		ROOT = 'http://192.168.1.88/hdcms';
		WEB = 'http://192.168.1.88/hdcms/index.php';
		URL = 'http://192.168.1.88/hdcms/index.php?a=Hdcms&c=Login&m=login';
		HDPHP = 'http://192.168.1.88/hdphp/hdphp';
		HDPHPDATA = 'http://192.168.1.88/hdphp/hdphp/Data';
		HDPHPTPL = 'http://192.168.1.88/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://192.168.1.88/hdphp/hdphp/Extend';
		APP = 'http://192.168.1.88/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://192.168.1.88/hdcms/index.php?a=Hdcms&c=Login';
		METH = 'http://192.168.1.88/hdcms/index.php?a=Hdcms&c=Login&m=login';
		GROUP = 'http://192.168.1.88/hdcms/hdcms';
		TPL = 'http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl';
		CONTROLTPL = 'http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl/Login';
		STATIC = 'http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl/Static';
		PUBLIC = 'http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl/Public';
		COMMON = 'http://192.168.1.88/hdcms/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl/Login/Css/css.css"/>
    <script type="text/javascript" src="http://192.168.1.88/hdcms/hdcms/App/Hdcms/Tpl/Login/Js/js.js"></script>
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
                <form action="<?php echo U('login');?>" method="post" target="checkLogin">
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
                        <img src="<?php echo U('code');?>" class="code" style="cursor: pointer;float:left;"
                             onclick="this.src='<?php echo U('code');?>&'+Math.random()"/>
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