<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理员管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Admin&c=Admin&m=index&_=0.9329553736547129';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Admin&c=Admin';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Admin&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Admin';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Admin/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Admin/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">管理员</a></li>
            <li><a href="<?php echo U('add');?>">添加管理员</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">aid</td>
            <td>用户名</td>
            <td>所属角色</td>
            <td>登录IP</td>
            <td>登录时间</td>
            <td>真实姓名</td>
            <td>邮箱</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["a"]["total"]=0;if(isset($admin) && !empty($admin)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($admin));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($admin,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>

            <tr>
                <td width="30"><?php echo $a['uid'];?></td>
                <td><?php echo $a['username'];?></td>
                <td><?php echo $a['rname'];?></td>
                <td><?php echo $a['ip'];?></td>
                <td><?php echo $a['logintime'];?></td>
                <td><?php echo $a['realname'];?></td>
                <td><?php echo $a['email'];?></td>
                <td>
                        <a href="<?php echo U('edit',array('uid'=>$a['uid']));?>">修改</a>|
                    <?php if($a['username']==C('WEB_MASTER')){?>
                        <span>删除</span>
                       <?php  }else{ ?>
                           <a href="javascript:;" onclick="del(<?php echo $a['uid'];?>)">删除</a>
                    <?php }?>
                </td>
            </tr>
        <?php $hd["list"]["a"]["first"]=false;
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