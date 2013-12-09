<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=8';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">内容列表</a></li>
            <li><a href="<?php echo U('add',array('cid'=>$_GET['cid']));?>" target="_blank">添加内容</a></li>
            <li><a href="<?php echo U('recycle',array('cid'=>$_GET['cid']));?>">回收站</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td width="30">排序</td>
            <td>标题</td>
            <td width="100">栏目</td>
            <td class="w80">作者</td>
            <td class="w80">修改时间</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["c"]["total"]=0;if(isset($content) && !empty($content)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($content));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($content,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

            <tr>
                <td><input type="checkbox" name="aid[]" value="<?php echo $c['aid'];?>"/></td>
                <td><?php echo $c['aid'];?></td>
                <td>
                    <input type="text" class="w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
                </td>
                <td><?php echo $c['title'];?> <?php echo $c['flagname'];?></td>
                <td><?php echo $c['catname'];?></td>
                <td>
                    <?php echo $c['username'];?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$c['updatetime']);?>
                </td>
                <td align="right">
                    <a href="<?php echo U('Content/Index/content',array('aid'=>$c['aid'],'cid'=>$_GET['cid']));?>" target="_blank">访问</a><span
                        class="line">|</span>
                    <a href="<?php echo U(edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid']));?>" target="_blank">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="del('del',<?php echo $_GET['cid'];?>,<?php echo $c['aid'];?>)">删除</a><span class="line">|</span>
                    <a href="">评论</a>
                </td>
            </tr>
        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
</div>

<div class="btn_wrap">
    <input type="button" class="btn s_all" value="全选"/>
    <input type="button" class="btn r_select" value="反选"/>
    <input type="button" class="btn" onclick="update_order(<?php echo $_GET['cid'];?>)" value="更改排序"/>
    <input type="button" class="btn" onclick="del('del',<?php echo $_GET['cid'];?>)" value="批量删除"/>
</div>
</body>
</html>