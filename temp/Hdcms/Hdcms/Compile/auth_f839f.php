<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>验证登录数据</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
</head>
<body>
<script type="text/javascript">
    var data = jQuery.parseJSON('<?php echo $stat;?>');
    if (data.stat == 1) {
        parent.window.location.href = "<?php echo U('index');?>";
    } else {
        parent.window.error_tips_hide(data.msg);
    }
</script>
</body>
</html>