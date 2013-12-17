<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改会员组</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=edit&gid=2';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Group';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=edit';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Group';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Group/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Member/Tpl/Group/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">会员组列表</a></li>
            <li><a href="javascript:;" class="action">修改会员组</a></li>
        </ul>
    </div>
    <form action="<?php echo U('edit');?>" method="post" onsubmit="return false;">
        <input type="hidden" name="gid" value="<?php echo $field['gid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">会员组名称</th>
                <td>
                    <?php if($field['is_system']==1){?>
                        <?php echo $field['gname'];?>
                        <?php  }else{ ?>
                    <input type="text" name="gname" class="w200" value="<?php echo $field['gname'];?>"/>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <th class="w100">积分小于</th>
                <td>
                    <input type="text" name="point" class="w200" value="<?php echo $field['point'];?>"/>
                </td>
            </tr>
            <tr>
                <th class="w100">用户权限</th>
                <td>
                    <ul>
                        <li>
                            <label><input type="checkbox" value="1" name="allowpost"
                                <?php if($field['allowpost']==1){?>checked="checked"<?php }?>
                                /> 允许投稿 </label>
                        </li>
                        <li>
                            <label><input type="checkbox" value="1" name="allowpostverify"
                                <?php if($field['allowpostverify']==1){?>checked="checked"<?php }?>
                                /> 投稿不需审核 </label>
                        </li>
                        <li>
                            <label><input type="checkbox" value="1" name="allowsendmessage"
                                <?php if($field['allowsendmessage']==1){?>checked="checked"<?php }?>
                                /> 允许发短消息 </label>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th class="w100">简洁描述</th>
                <td>
                    <input type="text" name="description" class="w400" value="<?php echo $field['description'];?>"/>
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