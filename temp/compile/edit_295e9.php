<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>网站配置</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config&m=edit&_=0.3045530745208047';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config';
		METH = 'http://localhost/hdcms/index.php?a=Hdcms&c=Config&m=edit';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config';
		STATIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Config/css/css.css"/>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" class="form-inline">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            1 模板中使用配置项方法为{ $hd.config.变量名}
            <br>
            2 修改仔细修改配置项，将影响网站的性能与安全
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">站点配置</a></li>
                <li lab="upload"><a href="#">上传设置</a></li>
                <li lab="member"><a href="#">会员设置</a></li>
                <li lab="content"><a href="#">内容相关</a></li>
                <li lab="water"><a href="#">水印设置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="grand"><a href="#">高级配置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['web']) && !empty($config['web'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['web']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['web'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['upload']) && !empty($config['upload'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['upload']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['upload'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['member']) && !empty($config['member'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['member']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['member'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['content']) && !empty($config['content'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['content']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['content'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="water">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['water']) && !empty($config['water'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['water']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['water'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="safe">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['safe']) && !empty($config['safe'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['safe']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['safe'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>

                <div id="grand">
                    <table class="table1">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($config['grand']) && !empty($config['grand'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config['grand']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config['grand'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <?php echo $c['html'];?>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
    </div>
</form>
</body>
</html>