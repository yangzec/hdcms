<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理员角色</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Role&c=Role&m=index';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Role';
		CONTROL = 'http://localhost/hdcms/index.php?a=Role&c=Role';
		METH = 'http://localhost/hdcms/index.php?a=Role&c=Role&m=index';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Role/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Role/Tpl/Role';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Role/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Role/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Role/Tpl/Role/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Role/Tpl/Role/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">角色列表</a></li>
            <li><a href="<?php echo U('add');?>">添加角色</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">rid</td>
            <td class="w100">角色名称</td>
            <td>描述</td>
            <td width="180">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["r"]["total"]=0;if(isset($role) && !empty($role)):$_id_r=0;$_index_r=0;$lastr=min(1000,count($role));
$hd["list"]["r"]["first"]=true;
$hd["list"]["r"]["last"]=false;
$_total_r=ceil($lastr/1);$hd["list"]["r"]["total"]=$_total_r;
$_data_r = array_slice($role,0,$lastr);
if(count($_data_r)==0):echo "";
else:
foreach($_data_r as $key=>$r):
if(($_id_r)%1==0):$_id_r++;else:$_id_r++;continue;endif;
$hd["list"]["r"]["index"]=++$_index_r;
if($_index_r>=$_total_r):$hd["list"]["r"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $r['rid'];?></td>
                <td><?php echo $r['rname'];?></td>
                <td><?php echo $r['title'];?></td>
                <td>
                    <a href="<?php echo U('Admin/index',array('rid'=>$r['rid']));?>">成员</a> |
                    <a href="<?php echo U('edit',array('rid'=>$r['rid']));?>">修改</a> |
                    <a href="javascript:;" onclick="del(<?php echo $r['rid'];?>)">删除</a> |
                    <a href="<?php echo U('Access/set_access',array('rid'=>$r['rid']));?>">权限设置</a>
                </td>
            </tr>
        <?php $hd["list"]["r"]["first"]=false;
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