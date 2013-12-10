<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=index&nid=4&_=0.6028706658133874';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/js/index.js"></script>
    <link rel='stylesheet' href='http://localhost/hdcms/hdcms/Static/js/treeview/jquery.treeview.css'/>
    <script src='http://localhost/hdcms/hdcms/Static/js/treeview/lib/jquery.cookie.js' type='text/javascript'></script>
    <script src='http://localhost/hdcms/hdcms/Static/js/treeview/jquery.treeview.js' type='text/javascript'></script>
    <script src='http://localhost/hdcms/hdcms/Static/js/treeview/jquery.treeview.edit.js' type='text/javascript'></script>
    <base target="content"/>
</head>
<body>
<div class="wrap">
    <div class="category_list">
        <ul id="browser" class="filetree">
        </ul>
    </div>
    <div class="con">
        <iframe src="<?php echo U('Hdcms/Index/welcome');?>" name="content"></iframe>
    </div>
</div>
</body>
</html>