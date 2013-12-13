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
		URL = 'http://localhost/hdcms/index.php?a=Upload&c=Index&m=index&_=0.5445843122051456';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Upload';
		CONTROL = 'http://localhost/hdcms/index.php?a=Upload&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Upload&c=Index&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Upload/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Upload/Tpl/Index';
		STATIC = 'http://localhost/hdcms/hdcms/App/Upload/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Upload/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Upload/Tpl/Index/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Upload/Tpl/Index/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">附件管理</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">ID</td>
            <td>文件名</td>
            <td>大小</td>
            <td width="100">上传时间</td>
            <td width="60">用户id</td>
            <td width="80">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["u"]["total"]=0;if(isset($upload) && !empty($upload)):$_id_u=0;$_index_u=0;$lastu=min(1000,count($upload));
$hd["list"]["u"]["first"]=true;
$hd["list"]["u"]["last"]=false;
$_total_u=ceil($lastu/1);$hd["list"]["u"]["total"]=$_total_u;
$_data_u = array_slice($upload,0,$lastu);
if(count($_data_u)==0):echo "";
else:
foreach($_data_u as $key=>$u):
if(($_id_u)%1==0):$_id_u++;else:$_id_u++;continue;endif;
$hd["list"]["u"]["index"]=++$_index_u;
if($_index_u>=$_total_u):$hd["list"]["u"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $u['id'];?></td>
                <td>
                    <?php echo $u['name'];?>
                </td>
                <td>
                    <?php echo get_size($u['size']);?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$u['uptime']);?>
                </td>
                <td>
                    <?php echo $u['uid'];?>
                </td>
                <td>
                    <?php if($u['isimage']){?>
                    <a href="javascript:;" onclick="view('http://localhost/hdcms/<?php echo $u['path'];?>')">预览</a><span
                        class="line">|</span>
                    <?php }?>
                    <a href="javascript:;" onclick="del(<?php echo $u['id'];?>)">删除</a>
                </td>
            </tr>
        <?php $hd["list"]["u"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
<div class="page1">
    <?php echo $page;?>
</div>
<!--预览-->
<div id="view" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">图片预览</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
</div>
</body>
</html>