<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成内容页静态</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index&_=0.7542936683376569&_0.8521852983450753&_0.8688374957601439&_0.6391639881744334&_0.8759484199607094&_0.6239769002107659&_0.2533802622807789&_0.41044713002106525&_0.35004187574016943&_0.6045270811761194&_0.36197778892445753&_0.2650980844057462&_0.6918140426197397&_0.00961503319525181&_0.7649975166124511&_0.7510392550504909&_0.14910745563868688&_0.9656939653613261&_0.17582232863222202&_0.8815155979142649&_0.5116197533898152&_0.8834656918320271&_0.05490084247568172&_0.18397016096000496&_0.22525320444568242&_0.3865183869257741&_0.11691199189955848&_0.4809580944881242&_0.21568582092290367&_0.31616764041375023&_0.9198471630797702&_0.9818986270445688&_0.09453488906842455&_0.3445139895574977';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Html';
		CONTROL = 'http://localhost/hdcms/index.php?a=Html&c=Html';
		METH = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Html/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Html';
		STATIC = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Html/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Html/Tpl/Html/css/css.css"/>
</head>
<body>
<form method="post" action="http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            建议创建计划任务，自动更新首页
        </div>
        <div class="table_title">规则设置</div>
        <br/>
        生成网站首页html文件 <input type="submit" value="开始更新" class="btn3" onclick="form_submit('new')"/>

    </div>
</form>