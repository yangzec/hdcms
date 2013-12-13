<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会员组管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=index&_=0.9104088555084491';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Group';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Group';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Group/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Group/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">会员组列表</a></li>
            <li><a href="<?php echo U('add');?>">添加会员组</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">gid</td>
            <td class="w100">角色名称</td>
            <td>系统组</td>
            <td>会员数</td>
            <td>积分小于</td>
            <td>允许投稿</td>
            <td>投稿不需审核</td>
            <td>允许发短消息</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["g"]["total"]=0;if(isset($group) && !empty($group)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($group));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($group,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

            <tr>
                <td class="w30"><?php echo $g['gid'];?></td>
                <td class="w100"><?php echo $g['gname'];?></td>
                <td><?php echo $g['system'];?></td>
                <td><?php echo $g['user_count'];?></td>
                <td><?php echo $g['point'];?></td>
                <td><?php echo $g['allowpost'];?></td>
                <td><?php echo $g['allowpostverify'];?></td>
                <td><?php echo $g['allowsendmessage'];?></td>
                <td>
                    <a href="<?php echo U('edit',array('gid'=>$g['gid']));?>">修改</a>
                    <?php if($g['is_system']==2){?>|
                        <a href="javascript:;" onclick="del(<?php echo $g['gid'];?>)">删除</a>
                    <?php }?>
                </td>
            </tr>
        <?php $hd["list"]["g"]["first"]=false;
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