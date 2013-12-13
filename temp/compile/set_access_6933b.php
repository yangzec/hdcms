<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title>管理员管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Admin&c=Access&m=set_access&rid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Admin&c=Access';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Access&m=set_access';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Access';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Access/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Access/css/css.css"/>
</head>
<body>
<form action="<?php echo U('set_access');?>" method="post">
    <input type="hidden" name="rid" value="<?php echo $rid;?>"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('Role/index');?>">角色列表</a></li>
                <li><a href="javascript:;" class="action">设置权限</a></li>
            </ul>
        </div>
        <div class="node">
            <ul class="level1">
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

                    <li>
                        <div class="title1">
                            <?php if (!empty($n['data'])): ?><span class='add'>-</span><?php endif; ?>
                            <?php echo $n[0];?><?php echo $n['f_html'];?>
                        </div>
                        <?php if (!empty($n['data'])): ?>
                            <ul class="level2">
                                <?php $hd["list"]["m"]["total"]=0;if(isset($n['data']) && !empty($n['data'])):$_id_m=0;$_index_m=0;$lastm=min(1000,count($n['data']));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($n['data'],0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

                                    <li>
                                        <?php if (!empty($m['data'])): ?><span class='add'>-</span><?php endif; ?>
                                        <?php echo $m[0];?><?php echo $m['f_html'];?>
                                        <?php if (!empty($m['data'])) { ?>
                                            <ul class="level3">
                                                <?php foreach ($m['data'] as $f) { ?>
                                                    <li>
                                                        <?php if (!empty($f['data'])): ?><span
                                                            class='add'>-</span><?php endif; ?>
                                                        <?php echo $f[0];?><?php echo $f['f_html'];?>
                                                        <?php if (isset($f['data']) && !empty($f['data'])) { ?>
                                                            <ul class="level4">
                                                                <?php $hd["list"]["g"]["total"]=0;if(isset($f['data']) && !empty($f['data'])):$_id_g=0;$_index_g=0;$lastg=min(1000,count($f['data']));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($f['data'],0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

                                                                    <li>
                                                                        <?php echo $g[0];?><?php echo $g['f_html'];?>
                                                                    </li>
                                                                <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php }; ?>
                                    </li>
                                <?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </ul>
        </div>

    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
    </div>
</form>
</body>
</html>