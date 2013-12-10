<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo C("webname");?> 会员中心</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Content&m=select_category&mid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Content&m=select_category';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Content/css/css.css"/>
    <style type="text/css">

        div.s-cat {
            padding: 10px;
        }

        option {
            border-bottom: solid 1px #dcdcdc;;
        }

        li.disabled {
            color: #999;
        }

        li.enabled {
            cursor: pointer;
        }

        li.enabled:hover {
            color: #004499;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $("li.enabled").click(function () {
                var cid = $(this).attr("cid");
                top.location.href = CONTROL+"&mid="+<?php echo $_GET['mid'];?>+"&m=add&cid="+cid;
            })
        })
    </script>
</head>
<body>
<div class="s-cat">
    <?php echo $category;?>
</div>
</body>
</html>