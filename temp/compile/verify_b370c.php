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
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Member&m=verify&_=0.07998261630753867';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Member';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Member&m=verify';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Member';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Member/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Member/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">审核会员</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="50">用户id</td>
            <td>用户名</td>
            <td>呢称</td>
            <td>登录IP</td>
            <td>邮箱</td>
            <td>会员组</td>
            <td>最后登录</td>
            <td>积分点数</td>
            <td>状态</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["u"]["total"]=0;if(isset($user) && !empty($user)):$_id_u=0;$_index_u=0;$lastu=min(1000,count($user));
$hd["list"]["u"]["first"]=true;
$hd["list"]["u"]["last"]=false;
$_total_u=ceil($lastu/1);$hd["list"]["u"]["total"]=$_total_u;
$_data_u = array_slice($user,0,$lastu);
if(count($_data_u)==0):echo "";
else:
foreach($_data_u as $key=>$u):
if(($_id_u)%1==0):$_id_u++;else:$_id_u++;continue;endif;
$hd["list"]["u"]["index"]=++$_index_u;
if($_index_u>=$_total_u):$hd["list"]["u"]["last"]=true;endif;?>

            <tr>
                <td width="30"><?php echo $u['uid'];?></td>
                <td><?php echo $u['username'];?></td>
                <td><?php echo $u['realname'];?></td>
                <td><?php echo $u['ip'];?></td>
                <td><?php echo $u['email'];?></td>
                <td><?php echo $u['gname'];?></td>
                <td><?php echo date('Y-m-d H:i',$u['logintime']);?></td>
                <td><?php echo $u['credits'];?></td>
                <td>
                    <?php if($u['status']==1){?>正常
                        <?php  }else{ ?>锁定
                    <?php }?>
                </td>
                <td>
                    <a href="javascript:;" onclick="unlock_user(<?php echo $u['uid'];?>)">审核</a>
                </td>
            </tr>
        <?php $hd["list"]["u"]["first"]=false;
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