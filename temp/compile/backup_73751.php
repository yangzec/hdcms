<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>备份数据库</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=backup';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Backup';
		CONTROL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup';
		METH = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=backup';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Backup/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup';
		STATIC = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Backup/index');?>">备份列表</a></li>
            <li><a href="javascript:;"  class="action">备份数据</a></li>
        </ul>
    </div>
<form action="<?php echo U('backup');?>" target="dialog_iframe" method="post">
    <table class="table2">
        <thead>
        <tr>
            <td width="50">数据备份</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td width="50">
                <table class="table">
                    <tr>
                        <td class="w100">分卷大小</td>
                        <td>
                            <input type="text" class="w150" name="size" value="200"/> KB
                        </td>
                    </tr>
                    <tr>
                        <td class="w100"></td>
                        <td>
                            <label><input type="checkbox" name="structure" value="1" checked="checked"> 备份表结构</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="w100">&nbsp;</td>
                        <td>
                            <input type="submit" class="btn" id="backup" value="开始备份"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table2">
        <thead>
        <tr>
            <td width="50">
                <label><input type="checkbox" class="s_all_ck"/> 全选</label>
            </td>
            <td>表名</td>
            <td>类型</td>
            <td>编码</td>
            <td>记录数</td>
            <td>使用空间</td>
            <td>碎片</td>
            <td width="200">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["t"]["total"]=0;if(isset($table['table']) && !empty($table['table'])):$_id_t=0;$_index_t=0;$lastt=min(1000,count($table['table']));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($table['table'],0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

            <tr>
                <td>
                    <input type="checkbox" name="table[]" value="<?php echo $t['tablename'];?>"/>
                </td>
                <td><?php echo $t['tablename'];?></td>
                <td><?php echo $t['engine'];?></td>
                <td><?php echo $t['charset'];?></td>
                <td><?php echo $t['rows'];?></td>
                <td><?php echo $t['size'];?></td>
                <td><?php echo _default($t['data_free'],0);?></td>
                <td>
                    <a href="<?php echo U('optimize',array('table[]'=>$t['tablename']));?>">优化</a> |
                    <a href="<?php echo U('repair',array('table'=>$t['tablename']));?>">修复</a>
                </td>
            </tr>
        <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </tbody>
    </table>
</form>
</div>
<div class="btn_wrap">
    <input type="button" class="btn s_all" value="全选"/>
    <input type="button" class="btn r_select" value="反选"/>
    <input type="button" class="btn" id="optimize" value="批量优化"/>
    <input type="button" class="btn" id="repair" value="批量修复"/>
</div>
</body>
</html>