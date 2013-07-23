<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title>后盾网HDCMS</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Category/add.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Category';
		METH = 'http://localhost/hdcms/index.php/Admin/Category/add';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Js/category.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Js/validation.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Css/category.css"/>
</head>
<body>
<div class="right_content">
    <div class="menu">
        <a href="<?php echo U(index);?>"
        <?php if(METHOD==index){?>class='action'<?php }?>
        >栏目列表</a> <span>|</span>
        <a href="<?php echo U('add');?>"
        <?php if(METHOD==add && $_GET['pid']==0){?>class='action'<?php }?>
        >添加顶级栏目</a> <span>|</span>
        <a href="<?php echo U('updateCache');?>">更新栏目缓存</a>
        <?php if($_GET['pid'] > 0 && METHOD==add){?>
            <span>|</span> <a href="<?php echo U('updateCache');?>" class='action'>添加子栏目</a>
        <?php }?>
        <?php if(METHOD==edit){?>
            <span>|</span> <a href="<?php echo U('updateCache');?>" class='action'>编辑栏目</a>
        <?php }?>
        <!--<a href="#list">生成内容页静态</a> <span>|</span>-->
    </div>
