<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改管理员</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Admin&c=Admin&m=edit&uid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Admin&c=Admin';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Admin&m=edit';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Admin';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Admin/js/edit_validation.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Admin/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Admin/Tpl/Admin/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">管理员</a></li>
            <li><a href="javascript:;" class="action">修改管理员</a></li>
        </ul>
    </div>
    <form action="<?php echo U('edit');?>" method="post" class="form-inline" onsubmit ="return hd_dialog(this,'http://localhost/hdcms/index.php?a=Admin&c=Admin')">
        <input type="hidden" name="uid" value="<?php echo $field['uid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    <input type="text" value="<?php echo $field['username'];?>" disabled="disabled" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">所属角色</th>
                <td>
                    <select name="rid">
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

                            <option value="<?php echo $r['rid'];?>" <?php echo $r['selected'];?>><?php echo $r['rname'];?></option>
                        <?php $hd["list"]["r"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">密码</th>
                <td>
                    <input type="password" name="password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">确认密码</th>
                <td>
                    <input type="password" name="password2" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">真实名称</th>
                <td>
                    <input type="text" name="realname" value="<?php echo $field['realname'];?>" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" value="<?php echo $field['email'];?>" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn btn-primary" value="确定"/>
            <input type="button" class="btn" value="取消" onclick="location.href='http://localhost/hdcms/index.php?a=Admin&c=Admin'"/>
        </div>
    </form>
</div>
</body>
</html>