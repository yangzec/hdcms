<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=index&_=0.5156834686377882&_0.43532636970404337&_0.5249345159978559&_0.6774522045140577';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Style';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Style&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Style';
		STATIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Template/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Template/Tpl/Style/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">友情提示</div>
    <div class="help">
        <p>1. HDCMS官网不断更新免费优质模板 <a href="http://hdcms.hdphp.com" class="action" target="_blank">立刻获取</a></p>
        <p>2. 非HDCMS官网提供的模板，可能存在恶意木马程序</p>
    </div>
    <div class="table_title">当前模板</div>
    <div class="help">
        <p>你需要了解HDCMS标签，才可以灵活编辑模板，当然这很简单  >>><a href="http://www.hdphp.com" target="_blank">获得视频教程</a></p>
    </div>
    <div class="tpl-list">
        <ul>
            <li>
                <img src="<?php echo $style_cur['img'];?>"/>
                <h4><?php echo $style_cur[0];?></h4>

                <p>作者: <?php echo $style_cur[1];?></p>

                <p>Email: <?php echo $style_cur[2];?></p>

                <div class="link">
                    <a href="javascript:;" class="btn1" onclick="select_tpl('<?php echo $style_cur['dir_name'];?>')">使用</a>
                    <a href="<?php echo U('show_dir',array('dir_name'=>urlencode($style_cur['dir_name'])));?>" class="btn1">编辑</a>
                </div>
                <div class="style_cur">
                    正在使用
                </div>
            </li>
            <?php $hd["list"]["t"]["total"]=0;if(isset($style) && !empty($style)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($style));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($style,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <li>
                    <img src="<?php echo $t['img'];?>" width="260"/>
                    <h4><?php echo $t[0];?> <?php echo $t['active'];?></h4>

                    <p>作者: <?php echo $t[1];?></p>

                    <p>Email: <?php echo $t[2];?></p>

                    <div class="link">
                        <a href="javascript:;" class="btn1" onclick="select_tpl('<?php echo basename($t['dir_name']);?>')">使用</a>
                        <a href="<?php echo U('show_dir',array('dir_name'=>urlencode($t['dir_name'])));?>" class="btn1">编辑</a>
                    </div>
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