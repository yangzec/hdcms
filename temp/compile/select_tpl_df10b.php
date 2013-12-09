<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>选择模板</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Category&a=Template&c=Template&m=select_tpl&input_id=list_tpl';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Template';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Template&m=select_tpl';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Template';
		STATIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Template/Tpl/Template/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Template/Tpl/Template/css/css.css"/>
</head>
<body>
<?php if($_GET['path']){?>
    <a href="javascript:window.back();" class="back">返回</a>
<?php }?>
<table class="table2">
    <thead>
    <tr>
        <td>名称</td>
        <td class="w150">大小</td>
        <td class="w80">修改时间</td>
    </tr>
    </thead>
    <?php $hd["list"]["f"]["total"]=0;if(isset($file) && !empty($file)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($file));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($file,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

        <tr>
            <td>
                <div>
                    <span class="<?php echo $f['type'];?> type" input_id="<?php echo $input_id;?>" path="<?php echo $f['path'];?>"><?php echo $f['name'];?></span>
                    <a href="javascript:;" input_id="<?php echo $input_id;?>" class="<?php echo $f['type'];?>" path="<?php echo $f['path'];?>"><?php echo $f['name'];?></a>
                </div>
            </td>
            <td><?php echo get_size($f['size']);?></td>
            <td><?php echo date('Y-m-d',$f['filemtime']);?></td>
        </tr>
    <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
</table>
</body>
</html>