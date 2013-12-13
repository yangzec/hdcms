<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>解决反馈</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Bug&c=Index&m=resolve&bid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Bug';
		CONTROL = 'http://localhost/hdcms/index.php?a=Bug&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Bug&c=Index&m=resolve';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Bug/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Index';
		STATIC = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Bug/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Bug/Tpl/Index/js/add_validation.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Bug/Tpl/Index/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Bug/Tpl/Index/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Index" class="action">所有反馈</a></li>
        </ul>
    </div>
    <form action="http://localhost/hdcms/index.php?a=Bug&c=Index&m=resolve" method="post">
        <input type="hidden" value="<?php echo $field['bid'];?>" name="bid"/>
        <table class="table1">
            <tr>
                <th class="w100">反馈者</th>
                <td>
                    <?php echo $field['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <a href="mailto:<?php echo $field['email'];?>"><?php echo $field['email'];?></a>
                </td>
            </tr>
            <tr>
                <th class="w100">提交时间</th>
                <td>
                    <?php echo date('Y-m-d H:i:s',$field['addtime']);?>
                </td>
            </tr>
            <tr>
                <th class="w100">问题摘要</th>
                <td>
                    <textarea class="w600 h200"><?php echo $field['content'];?></textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">问题类型</th>
                <td>
                    <?php echo $field['type'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">状态</th>
                <td>
                    <label><input type="radio" name="status" value="1" <?php if($field['status']=='未审核'){?>checked='checked'<?php }?>/> 未审核</label>
                    <label><input type="radio" name="status" value="2" <?php if($field['status']=='处理中'){?>checked='checked'<?php }?>/> 处理中</label>
                    <label><input type="radio" name="status" value="3" <?php if($field['status']=='已解决'){?>checked='checked'<?php }?>/> 已解决</label>
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