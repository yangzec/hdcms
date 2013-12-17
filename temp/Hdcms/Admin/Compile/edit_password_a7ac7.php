<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改密码</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Admin&c=Personal&m=edit_password&_=0.3552012277870209';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Admin&c=Personal';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Personal&m=edit_password';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Personal';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Personal/js/edit_password.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Personal/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">修改密码</div>
    <form action="<?php echo U('edit_info');?>" method="post" onsubmit="return false;">
        <input type="hidden" name="uid" value="<?php echo $user['uid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    <?php echo $user['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">真实姓名</th>
                <td>
                    <input type="text" name="realname" class="w200" value="<?php echo $user['realname'];?>"/>
                </td>
            </tr>
            <tr>
                <th class="w100">旧密码</th>
                <td>
                    <input type="password" name="old_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">新密码</th>
                <td>
                    <input type="password" name="password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">重复新密码</th>
                <td>
                    <input type="password" name="c_password" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn btn-primary" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>