<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=index&nid=13&_=0.388533636820824&_0.8151719329332323&_0.20477843076242386&_0.6860313257968813';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Category';
		CONTROL = 'http://localhost/hdcms/index.php?a=Category&c=Category';
		METH = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Category/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Category/Tpl/Category/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Category/Tpl/Category/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">栏目列表</a></li>
            <li><a href="<?php echo U('add');?>">添加顶级栏目</a></li>
            <li><a href="javascript:update_cache();">更新栏目缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">CID</td>
            <td width="30">排序</td>
            <td>栏目名称</td>
            <td width="50">访问</td>
            <td width="180">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
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
                    <input type="text" class="w30" value="<?php echo $c['catorder'];?>" name="list_order[<?php echo $c['cid'];?>]"/>
                </td>
                <td>
                    <?php echo $c['catname'];?>
                </td>
                <td>
                    <a href="<?php echo U('Content/Index/category',array('cid'=>$c['cid']));?>" target="_blank">访问</a>
                </td>
                <td>
                    <a href="<?php echo U('add',array('pid'=>$c['cid'],'mid'=>$c['mid']));?>">添加子栏目</a><span class="line">|</span>
                    <a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">修改</a><span class="line">|</span>
                    <a href="javascript:;" onclick="del_category(<?php echo $c['cid'];?>)">删除</a>
                </td>
            </tr>
        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
<div class="btn_wrap">
    <input type="button" class="btn update_order" value="更改排序"/>
</div>
</body>
</html>