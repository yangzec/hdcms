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
		URL = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=show_dir&dir_name=.%2Ftemplate%2Fdefault';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Style';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=show_dir';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Style';
		STATIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">温馨提示</div>
    <div class="help">
        修改模板文件前，请做好备份操作！
    </div>
    <?php if($_GET['dir_name']){?>
        <a href="javascript:window.back();" class="btn1" style="display: inline-block;margin-bottom: 15px;">返回</a>
    <?php }?>
    <table class="table2">
        <thead>
        <tr>
            <td>文件名</td>
            <td>修改时间</td>
            <td>大小</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["d"]["total"]=0;if(isset($dirs) && !empty($dirs)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($dirs));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($dirs,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $d['name'];?></td>
                <td><?php echo date('Y-m-d H:i',$d['filemtime']);?></td>
                <td><?php echo get_size($d['size']);?></td>
                <td>
                    <?php if($d['type']=='dir'){?>
                        <a href="http://localhost/hdcms/index.php?a=Template&c=Style&m=show_dir&dir_name=<?php echo urlencode($d['path']);?>">进入</a>
                        <?php  }else{ ?>
                            <a href="http://localhost/hdcms/index.php?a=Template&c=Style&m=edit_tpl&tpl_name=<?php echo urlencode($d['path']);?>"  target="_blank" >修改</a>
                    <?php }?>
                </td>
            </tr>
        <?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
</body>
</html>