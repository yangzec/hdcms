<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
<link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
<!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href='http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=index&_=0.3569962903490481';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Model';
		CONTROL = 'http://localhost/hdcms/index.php?a=Model&c=Model';
		METH = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=index';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">模型列表</a></li>
            <li><a href="<?php echo U('add');?>">添加模型</a></li>
            <li><a href="javascript:update_cache()">更新缓存</a></li>
        </ul>
    </div>
    <div class="content">
        <table class="table2 table-title">
            <thead>
            <tr>
                <td width="30">MID</td>
                <td>模型名称</td>
                <td width="120">类型</td>
                <td width="150">表名</td>
                <td width="150">应用名</td>
                <td width="60">状态</td>
                <td width="160">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $hd["list"]["m"]["total"]=0;if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
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
                    <td><?php echo $m['mid'];?></td>
                    <td><?php echo $m['model_name'];?></td>
                    <td>
                        <?php if($m['type']==1){?>基本模型
                            <?php  }else{ ?>独立模型
                        <?php }?>
                    </td>
                    <td><?php echo $m['tablename'];?></td>
                    <td width="150"><?php echo $m['app_name'];?></td>
                    <td>
                        <?php if($m['enable']){?>开启
                            <?php  }else{ ?>关闭
                        <?php }?>
                    </td>
                    <td>
                        <a href="<?php echo U('Field/Field/index',array('mid'=>$m['mid']));?>">字段管理</a> |
                        <?php if($m['is_system']==1){?>
                            修改
                        <?php  }else{ ?>
                        <a href="<?php echo U('edit',array('mid'=>$m['mid']));?>">修改</a>
                        <?php }?> |
                        <?php if($m['is_system']==1){?>
                            删除
                            <?php  }else{ ?>
                        <a href="javascript:;"
                           onclick="return confirm('确定删除【<?php echo $m['model_name'];?>】模型吗？')?delModel(<?php echo $m['mid'];?>):false;">删除</a>
                        <?php }?>
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