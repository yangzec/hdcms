<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Index/Js/index.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Index/Css/index.css"/>
    <base target="con"/>
</head>
<body>
<!--顶部导航-->
<div id="top">
    <div class="top_menu">
        <ul class="nav">
            <li><a href="#" lab="con">内容</a></li>
            <li><a href="#" lab="collect">采集</a></li>
            <li><a href="#" lab="user">用户</a></li>
            <li><a href="#" lab="system">系统</a></li>
            <li><a href="#" lab="module">模块</a></li>
            <li><a href="http://localhost/hdcms" target="_blank">首页</a></li>
        </ul>
    </div>
    <div class="m_menu">
        <a href="<?php echo U('Cache/all');?>">更新缓存</a>
    </div>
</div>
<!--顶部导航-->
<!--左侧导航-->
<div id="left">
    <!--内容-->
    <div id="con" class="menu_block action">
        <h2>内容管理</h2>
        <ul class="menu">
            <?php foreach($model as $m):?>
            <?php if($m["enable"]):?>
            <li><a href="<?php echo U($m['control'].'/index',array('mid'=>$m['mid']))?>"><?php echo $m['model_name'];?></a></li>
            <?php endif;?>
            <?php endforeach;?>
        </ul>
        <h2>基本操作</h2>
        <ul class="menu">
            <li><a href="<?php echo U('Category/index');?>">栏目管理</a></li>
        </ul>

        <h2>模型管理</h2>
        <ul class="menu">
            <li><a href="<?php echo U('Model/index');?>">模型管理</a></li>
        </ul>
    </div>
    <!--内容-->
    <!--用户-->
    <div id="user" class="menu_block">
        <h2>会员管理</h2>
        <ul class="menu">
            <li class="active"><a href="http://localhost/hdcms/index.php?a=Admin/class">会员管理</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Admin/stu">审核会员</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Admin/stu">会员配置</a></li>
        </ul>
        <h2>管理员配置</h2>
        <ul class="menu">
            <li><a href="<?php echo U('Admin/index');?>">管理员管理</a></li>
            <li><a href="<?php echo U('Role/index');?>">角色管理</a></li>
        </ul>
    </div>
    <!--用户-->
    <!--系统-->
    <div id="system" class="menu_block">
        <h2>配置</h2>
        <ul class="menu">
            <li class="action"><a href="<?php echo U('System/index');?>">基本设置</a></li>
            <li><a href="<?php echo U('System/water_show');?>">水印设置</a></li>
            <li><a href="<?php echo U('System/code_show');?>/">验证码设置</a></li>
            <li><a href="<?php echo U('Template/index');?>/">模板风格</a></li>
        </ul>


    </div>
    <!--系统-->
</div>
<div id="right_content">
    <iframe src="<?php echo U(welcome);?>" name="con"></iframe>
</div>
</body>
</html>
