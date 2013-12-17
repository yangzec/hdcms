<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Model';
		CONTROL = 'http://localhost/hdcms/index.php?a=Model&c=Model';
		METH = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=add';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Public';
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
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Model/Tpl/Model/js/js.js"></script>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="form-inline">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">模型列表</a></li>
                <li><a href="javascript:;" class="action">添加模型</a></li>
            </ul>
        </div>
        <div class="table_title">
            添加模型
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w200">模型名称</th>
                    <td>
                        <input type="text" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>表名</th>
                    <td>
                        <input type="text" name="tablename" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>类型</th>
                    <td>
                        <label><input type="radio" name="type" value="1" checked="checked"/> 基本模型</label>
                        <label><input type="radio" name="type" value="2"/> 独立模型(只有主表)</label>
                    </td>
                </tr>
                <tr>
                    <th>允许前台投稿</th>
                    <td>
                        <label><input type="radio" name="is_submit" value="1"/> 允许</label>
                        <label><input type="radio" name="is_submit" value="0" checked="checked"/>
                            不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>模型描述</th>
                    <td>
                        <textarea name="description" class="w300 h80"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>应用</th>
                    <td>
                        <input type="text" name="app_name" value="Content" class="w200"/>
                        <span class="validation"></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="确定" class="btn btn-primary"/>
    </div>
</form>
</body>
</html>