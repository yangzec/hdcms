<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=add&m=image_crop';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=image_crop';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
</head>
<body>
<script>
    $(function(){
        $().initCrop("1.jpg",{
            width:300	,
            preview:"180,120"
        });
    })
</script>
<div id="imageCrop">
    <input name="x1" id="x1" type="hidden" value=""/>
    <input name="y1" id="y1" type="hidden" value=""/>
    <input name="x2" id="x2" type="hidden" value=""/>
    <input name="y2" id="y2" type="hidden" value=""/>
    <div class="init_bj"></div>
    <div class="loading"> </div>
    <div class="adorn">
        <div id="sorce" class="sorce">
            <div class="img">
                <div> </div>
                <img src="1.jpg"/>
            </div>
            <div class="mark" id="mark">
                <div  class="size_view"></div>
                <div id="wireframe" class="wireframe">
                    <a id="dot1" class="dot" href="javascript:void(0)"></a>
                    <a id="dot2" class="dot" href="javascript:void(0)"></a>
                    <a id="dot3" class="dot" href="javascript:void(0)"></a>
                    <a id="dot4" class="dot" href="javascript:void(0)"></a>
                    <a id="dot5" class="dot" href="javascript:void(0)"></a>
                    <a id="dot6" class="dot" href="javascript:void(0)"></a>
                    <a id="dot7" class="dot" href="javascript:void(0)"></a>
                    <a id="dot8" class="dot" href="javascript:void(0)"></a>
                </div>
                <img class="img" style="" src="1.jpg"/>
            </div>
        </div>
    </div>
    <div class="cropList">
        <span class="hd_title">预览</span>
        <ul id="preview"></ul>
    </div>
</div>
</body>
</html>