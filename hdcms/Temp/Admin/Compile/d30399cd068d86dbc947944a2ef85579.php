<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Category&m=selectTpl&action=arc_tpl';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Category';
		METH = 'http://localhost/hdcms/index.php/Admin/Category/selectTpl';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Js/category.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Css/category.css"/>
</head>
<body>
<div class="content">
    <table class="table table-title">
        <thead>
        <tr>
            <td>名称</td>
            <td width="100">大小</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php if($_GET['dir']){?>
            <a href="javascript:window.history.back();" style='color:#666;font-size:12px;'>上一级</a>
            <br/>
        <?php }?>
        <?php if(isset($files) && !empty($files)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($files));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($files,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

            <tr>
                <td>
                    <?php if($f['type']=='file'){?>
                        <a action="<?php echo $_GET['action'];?>" class="select" href="{style}/<?php echo str_replace(ROOT_PATH.'template/'.$tpl_style.'/','',$f['path']);?>"><?php echo $f['name'];?></a>
                        <?php  }else{ ?>
                            <a href="<?php echo U('selectTpl','dir='.base64_encode($f['path']).'&'.'action='.$_GET['action']);?>"><?php echo $f['name'];?></a>
                    <?php }?>
                </td>
                <td>
                    <?php echo get_size($f['filesize']);?>
                </td>
                <td>
                    <?php if($f['type']=='file'){?>
                        <a action="<?php echo $_GET['action'];?>" class="select" href="{style}/<?php echo str_replace(ROOT_PATH.'template/'.$tpl_style.'/','',$f['path']);?>">选择</a>
                        <?php  }else{ ?>
                            <a href="<?php echo U('selectTpl','dir='.base64_encode($f['path']).'&'.'action='.$_GET['action']);?>">进入</a>
                    <?php }?>
                </td>

                </td>
            </tr>
        <?php $hd["list"]["f"]["first"]=false;
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