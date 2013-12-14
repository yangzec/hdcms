<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改模板</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=edit_tpl&file_path=%2Fwww%2Fhdcms%2Ftemplate%2Fdefault%2Farticle_list.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Style';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=edit_tpl';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Style';
		STATIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/js/edit_tpl.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">温馨提示</div>
    <div class="help">
        <p>1 修改模板后，需要删除缓存与重新生成静态文件才会看到效果</p>
        <p>2 修改模板文件前，请做好备份操作！</p>
    </div>
    <div class="table_title">修改模板</div>
    <form action="<?php echo U(add);?>" method="post" onsubmit="return false;">
        <input type="hidden" name="file_path" value="<?php echo $field['file_path'];?>"/>
        <!--右侧缩略图区域-->
        <table class="table1">
            <tr>
                <th class="w100">文件名</th>
                <td>
                    <input type="text" name="file_name" value="<?php echo $field['file_name'];?>" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea name="content" style="width:90%;height:600px;"><?php echo $field['content'];?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="确定" class="btn btn-primary"/>
                    <input type="button" value="放弃" class="btn" onclick="_close('放弃编辑吗？')"/>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>