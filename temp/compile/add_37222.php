<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>后台菜单管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/imageCrop/crop.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node';
		METH = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node&m=add';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node';
		STATIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node/css/css.css"/>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" onsubmit="return false;">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">菜单管理</a></li>
                <li><a href="javascript:;" class="action">添加菜单</a></li>
                <li><a href="javascript:update_cache();">更新缓存</a></li>
            </ul>
        </div>
        <div class="table_title">
            菜单信息
        </div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td>
                    <select name="pid" onchange="set_control(this)">
                        <option value="0" level="1">一级菜单</option>
                        <?php $hd["list"]["n"]["total"]=0;if(isset($node) && !empty($node)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($node));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($node,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

                            <option value="<?php echo $n['nid'];?>" level="<?php echo $n['level'];?>"
                            <?php if($n['nid']==$pid){?>selected="selected"<?php }?>
                            ><?php echo $n['name'];?></option>
                        <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>名称:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:0px;">
                    <div id="control">
                    </div>
                </td>
            </tr>
            <tr>
                <td>备注:</td>
                <td>
                    <textarea name="comment" class="w350 h100"></textarea>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1" checked="checked"> 显示</label>
                    <label><input type="radio" name="status" value="0"> 隐藏</label>
                </td>
            </tr>
            <tr>
                <td>类型:</td>
                <td>
                    <select name="type">
                        <option value="1">菜单+权限控制</option>
                        <option value="2">普通菜单</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="提交"/>
    </div>
</form>
</body>
</html>