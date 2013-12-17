<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS - 生成静态</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_category';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Html';
		CONTROL = 'http://localhost/hdcms/index.php?a=Html&c=Html';
		METH = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_category';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Html/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Html/Tpl/Html';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Html/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Html/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/template/default/';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Html/Tpl/Html/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Html/Tpl/Html/css/css.css"/>
</head>
<body>
<div class="modal" style="position:absolute;width:450px; height: 180px; top:50%;left:50%;margin-top:-180px;margin-left:-450px;z-index: 1000;">
    <div class="modal_title">hdcms消息</div>
    <div class="content" style="height:90px;">
        <div class="modal_message">
            <strong class="success"></strong>
            <span><?php echo $message;?></span>
            <?php if(is_null($url)):?>
            <input type="button" style="position: absolute;bottom: 10px;left: 50%;margin-left: -50px;" class="btn" onclick="window.location.href='<?php echo $success_url;?>'" value="返回历史页面"/>
            <?php endif;?>
        </div>
    </div>
</div>
</body>
</html>