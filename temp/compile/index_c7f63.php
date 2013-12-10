<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>后台菜单管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node&m=index&_=0.47004975790795867&_0.8570350854775868';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node';
		METH = 'http://localhost/hdcms/index.php?a=Hdcms&c=Node&m=index';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node';
		STATIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/Static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Hdcms/Tpl/Node/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">菜单管理</a></li>
            <li><a href="<?php echo U('add');?>">添加菜单</a></li>
            <li><a href="javascript:update_cache();">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">ID</td>
            <td>菜单名称</td>
            <td>状态</td>
            <td class="w80">类型</td>
            <td class="w200">操作</td>
        </tr>
        </thead>
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

            <tr>
                <td>
                    <input type="text" class="w30" value="<?php echo $n['list_order'];?>" name="list_order[<?php echo $n['nid'];?>]"/>
                </td>
                <td><?php echo $n['nid'];?></td>
                <td>
                    <?php echo $n['name'];?>
                </td>
                <td>
                    <?php if($n['status']==1){?>
                        显示
                        <?php  }else{ ?>
                            不显示
                    <?php }?>
                </td>
                <td>
                    <?php if($n['menu_type']==1){?>
                        权限+菜单
                        <?php  }else{ ?>
                            普通菜单
                    <?php }?>
                </td>
                <td style="text-align: right">
                    <?php if($n['level']==3){?>
                        <span style="color:#bbb;">添加子菜单  | </span>
                    <?php  }else{ ?>
                        <a href="<?php echo U('add',array('pid'=>$n['nid']));?>">添加子菜单</a> |
                    <?php }?>
                    <?php if($n['is_system']==0){?>
                    <a href="<?php echo U('edit',array('nid'=>$n['nid']));?>">修改</a> |
                    <a href="javascript:;" onclick="del(<?php echo $n['nid'];?>)">删除</a>
                        <?php  }else{ ?>
                            <span style="color:#bbb;">修改 | </span>
                            <span style="color:#bbb;">删除 | </span>
                    <?php }?>
                </td>
            </tr>
        <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
<div class="btn_wrap">
    <input type="button" class="btn" value="更改排序" onclick="update_order();"/>
</div>
</body>
</html>