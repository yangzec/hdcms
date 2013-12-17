<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加会员</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Member&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Member';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Member&m=add';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Member';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Member/js/add_validation.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Member/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Member/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">会员列表</a></li>
            <li><a href="javascript:;" class="action">添加会员</a></li>
        </ul>
    </div>
    <form action="<?php echo U('add');?>" method="post">
        <table class="table1">
            <tr>
                <th class="w100">会员名称</th>
                <td>
                    <input type="text" name="username" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">会员组</th>
                <td>
                    <select name="gid">
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

                            <option value="<?php echo $g['gid'];?>"><?php echo $g['gname'];?></option>
                        <?php $hd["list"]["g"]["first"]=false;
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
                    <input type="password" name="c_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">真实名称</th>
                <td>
                    <input type="text" name="realname" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">性别</th>
                <td>
                    <label><input type="radio" name="sex" value="1" checked="checked"/> 男</label>
                    <label><input type="radio" name="sex" value="2"/> 女</label>
                </td>
            </tr>
            <tr>
                <th class="w100">QQ</th>
                <td>
                    <input type="text" name="qq" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>