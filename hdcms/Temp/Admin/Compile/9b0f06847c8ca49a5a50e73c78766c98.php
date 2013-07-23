<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Model/index.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Model';
		METH = 'http://localhost/hdcms/index.php/Admin/Model/index';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Model';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
</head>
<body>
<div class="right_content">
    <div class="menu">
        <a href="<?php echo U(add_show);?>" class="action">添加模型</a>
    </div>
    <div class="content">
        <table class="table table-title">
            <thead>
            <tr>
                <td width="30">MID</td>
                <td>模型名称</td>
                <td width="80">表名</td>

                <td width="60">状态</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

                <tr>
                    <td width="30"><?php echo $m['mid'];?></td>
                    <td><?php echo $m['model_name'];?></td>
                    <td width="80"><?php echo $m['tablename'];?></td>

                    <td width="60">
                        <?php if($m['enable']){?>开启
                            <?php  }else{ ?>关闭
                        <?php }?>
                    </td>
                    <td width="200">
                        <a href="<?php echo U('Field/index',array('mid'=>$m['mid']));?>">字段管理</a> |
                        <a href="<?php echo U('model_show',array('mid'=>$m['mid']));?>">修改</a> |
                        <?php if($m['enable']){?>
                            <a href="<?php echo U('model_enable',array('mid'=>$m['mid'],'stat'=>0));?>">关闭</a>
                            <?php  }else{ ?>
                                <a href="<?php echo U('model_enable',array('mid'=>$m['mid'],'stat'=>1));?>">开启</a>
                        <?php }?>
                        |
                        <a href="<?php echo U('model_enable',array('mid'=>$m['mid']));?>">删除</a>
                    </td>
                </tr>
            <?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>