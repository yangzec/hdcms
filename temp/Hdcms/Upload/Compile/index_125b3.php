<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>文件管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Upload&c=Upload&m=index&id=thumb&type=thumb&num=1&name=thumb';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Upload';
		CONTROL = 'http://localhost/hdcms/index.php?a=Upload&c=Upload';
		METH = 'http://localhost/hdcms/index.php?a=Upload&c=Upload&m=index';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Upload/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Upload/Tpl/Upload';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Upload/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Upload/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Upload/Tpl/Upload/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Upload/Tpl/Upload/css/css.css"/>
    <script>
        <?php echo $get;?>
    </script>
</head>
<body>
    <div class="tab">
        <ul class="tab_menu">
            <li lab="upload"><a href="#">上传文件</a></li>
            <li lab="site"><a href="#">站内图片</a></li>
            <li lab="untreated"><a href="#">未使用图片</a></li>
        </ul>
        <div class="tab_content">
            <div id="upload">
                <?php echo $upload;?>
            </div>
            <div id="site">

            </div>
            <div id="untreated">

            </div>
        </div>
    </div>
<div style="position: absolute;bottom: 0px;">
    <input type="button" class="btn btn-primary" id="pic_selected" value="确定"/>
    <input type="button" class="btn close_window" value="关闭" onclick="close_window();"/>
</div>
</body>
</html>