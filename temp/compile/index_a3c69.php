<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>还原备份</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=index&nid=12&_=0.06559024786504508&_0.0971143447845143&_0.15687519417185825&_0.05668040115344819&_0.9454809516752779&_0.3473203707186059&_0.15294119891458913&_0.8162482342022224';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Backup';
		CONTROL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup';
		METH = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Backup/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup';
		STATIC = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Backup/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Backup/Tpl/Backup/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">备份列表</a></li>
            <li><a href="<?php echo U('backup');?>">备份数据</a></li>
        </ul>
    </div>
    <form action="<?php echo U('delBackupDir');?>" method="post">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>备份目录</td>
                <td>备份时间</td>
                <td>大小</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $hd["list"]["d"]["total"]=0;if(isset($dir) && !empty($dir)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($dir));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($dir,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

                <tr>
                    <td width="50">
                        <label><input type="checkbox" name="table[]" value="<?php echo $d['name'];?>"/></label>
                    </td>
                    <td><?php echo $d['name'];?></td>
                    <td><?php echo date('Y-m-d h:i:s',$d['filemtime']);?></td>
                    <td><?php echo get_size($d['size']);?></td>
                    <td>
                        <a href="javascript:;" class="recovery" dir="<?php echo $d['name'];?>">数据还原</a>
                    </td>
                </tr>
            <?php $hd["list"]["d"]["first"]=false;
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
    <input type="button" class="btn" id="del" value="批量删除"/>
</div>
</body>
</html>