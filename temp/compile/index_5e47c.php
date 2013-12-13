<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS反馈</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Bug&C=Index&m=index&status=1&_=0.1791611477915911';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Bug';
		CONTROL = 'http://localhost/hdcms/index.php?a=Bug&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Bug&c=Index&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Bug/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Index';
		STATIC = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Bug/Tpl/Index/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Bug/Tpl/Index/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Index&m=index&status=1" <?php if($_GET['status']==1){?>class="action"<?php }?>>未审核</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Index&m=index&status=2" <?php if($_GET['status']==2){?>class="action"<?php }?>>处理中</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Index&m=index&status=3" <?php if($_GET['status']==3){?>class="action"<?php }?>>已解决</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" onclick="select_all(this)"/>
            </td>
            <td class="w30">bid</td>
            <td class="w80">反馈者</td>
            <td class="w150">邮箱</td>
            <td>提交时间</td>
            <td class="w550">问题摘要</td>
            <td class="w60">问题类型</td>
            <td class="w50">状态</td>
            <td width="50">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["b"]["total"]=0;if(isset($data) && !empty($data)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($data));
$hd["list"]["b"]["first"]=true;
$hd["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$hd["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($data,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$hd["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$hd["list"]["b"]["last"]=true;endif;?>

            <tr>
                <td class="w30">
                    <input type="checkbox" name="bid[]" value="<?php echo $b['bid'];?>"/>
                </td>
                <td><?php echo $b['bid'];?></td>
                <td><?php echo $b['username'];?></td>
                <td><?php echo $b['email'];?></td>
                <td><?php echo date('Y-m-d H:i',$b['addtime']);?></td>
                <td>
                    <?php echo mb_substr($b['content'],0,55,'utf-8');?>...
                </td>
                <td><?php echo $b['type'];?></td>
                <td><?php echo $b['status'];?></td>
                <td>
                    <a href="http://localhost/hdcms/index.php?a=Bug&c=Index&m=resolve&bid=<?php echo $b['bid'];?>">处理</a>
                </td>
            </tr>
        <?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="批量删除" onclick="del()"/>
    </div>
</div>
</body>
</html>