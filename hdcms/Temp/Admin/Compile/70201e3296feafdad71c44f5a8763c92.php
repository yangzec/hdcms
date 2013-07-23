<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Template/index.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Template';
		METH = 'http://localhost/hdcms/index.php/Admin/Template/index';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Template';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
<script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Template/Js/template.js"></script>
<link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Template/Css/template.css"/>
</head>
<body>
<div class="right_content">

    <div class="tpl_list">
            <h2>正在使用</h2>
            <?php if(isset($tpl) && !empty($tpl)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($tpl));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($tpl,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <?php if($t['name']==$conf['value']){?>
                    <ul>

                        <li name="<?php echo $t['name'];?>"
                        <?php if($conf['value']==$t['name']){?>class="action"<?php }?>
                        >
                        <div class="pic">
                            <img src='<?php echo $t['pic'];?>'/>
                        </div>
                        <p>
                            <strong>风格名称:</strong><span><?php echo $t['title'];?></span>
                        </p>

                        <p>
                            <strong>模板目录:</strong><span><?php echo $t['name'];?></span>
                        </p>

                        <p>
                            <strong>模板作者:</strong><span><?php echo $t['author'];?></span>
                        </p>

                        <p>
                            <strong>作者QQ:</strong><span><?php echo $t['qq'];?></span>
                        </p>

                        <div class="shade"></div>
                        </li>
                    </ul>
                <?php }?>
            <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </div>
    <div class="tpl_list">
        <h2>所有风格</h2>
        <ul>
            <?php if(isset($tpl) && !empty($tpl)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($tpl));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($tpl,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <li name="<?php echo $t['name'];?>"
                <?php if($conf['value']==$t['name']){?>class="action"<?php }?>
                >
                <div class="pic">
                    <img src='<?php echo $t['pic'];?>'/>
                </div>
                <p>
                    <strong>风格名称:</strong><span><?php echo $t['title'];?></span>
                </p>

                <p>
                    <strong>模板目录:</strong><span><?php echo $t['name'];?></span>
                </p>

                <p>
                    <strong>模板作者:</strong><span><?php echo $t['author'];?></span>
                </p>

                <p>
                    <strong>作者QQ:</strong><span><?php echo $t['qq'];?></span>
                </p>

                <div class="shade"></div>
                </li>
            <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ul>
    </div>
</div>
</body>
</html>
