<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
		URL = 'http://localhost/hdcms/index.php/Admin/Category/index.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Category';
		METH = 'http://localhost/hdcms/index.php/Admin/Category/index';
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

<table class="table table-title">
    <thead>
    <tr>
        <td width="30">CID</td>
        <td>栏目名称</td>
        <td width="100">访问</td>
        <td width="200">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

        <tr>
            <td><?php echo $c['cid'];?></td>
            <td>
                <a hfef="<?php echo U('news/index');?>">
                    <?php if($c['pid']!=0){?>└<?php }?><?php echo $c['html'];?><?php echo $c['catname'];?></a>
            </td>
            <td><a href="<?php echo U('index/index/index');?>" target="_blank">访问</a></td>
            <td>
                <a href="<?php echo U('add',array('pid'=>$c['cid']));?>">添加子栏目</a> |
                <a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">修改</a> |
                <a href="<?php echo U('del',array('cid'=>$c['cid']));?>" class="del_category" cat_name="<?php echo $c['cat_name'];?>">删除</a> |
                <a href="<?php echo U('move',array('cid'=>$c['cid']));?>">移动</a>
            </td>
        </tr>
    <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </tbody>
</table>
</div>
</body>
</html>