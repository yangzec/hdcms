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
		URL = 'http://localhost/hdcms/index.php/Admin/Field/index/mid/1.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Field';
		METH = 'http://localhost/hdcms/index.php/Admin/Field/index';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Field';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
</head>
<body>
<div class="right_content">
    <div class="menu">
        <a href="<?php echo U(add,array('mid'=>$_GET['mid']));?>"
        <?php if(METHOD==add){?>class='action'<?php }?>
        >添加字段</a> <span>|</span>
        <a href="<?php echo U('index',array('mid'=>$_GET['mid']));?>"
        <?php if(METHOD==index){?>class='action'<?php }?>
        >字段列表</a>
    </div>
    <div class="content">
        <table class="table table-title">
            <thead>
            <tr>
                <td width="30">排序</td>
                <td width="200">字段名</td>
                <td width="200">字段名</td>
                <td width="80">类型</td>
                <td width="80">系统</td>
                <td width="60">主表</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($fields) && !empty($fields)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($fields));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($fields,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

                <tr>
                    <td>
                        <input type="text" name="sort[<?php echo $f['field']['fid'];?>]" style="width:23px;" value="<?php echo $f['fieldsort'];?>"/>
                    </td>
                    <td><?php echo $f['field_name'];?></td>
                    <td>
                        <?php echo $f['title'];?>
                    </td>
                    <td><?php echo $f['field_type'];?></td>
                    <td>
                        <?php if($f['is_system']){?>是
                            <?php  }else{ ?>否
                        <?php }?>
                    </td>
                    <td>
                        <?php if($f['is_main_table']){?>是
                            <?php  }else{ ?>否
                        <?php }?>
                    </td>
                    <td>
                        <a href="<?php echo U('edit_show',array('pid'=>$c['cid']));?>">修改</a> |
                        <a href="<?php echo U('enable',array('cid'=>$c['cid']));?>">
                            <?php if($f['enable']){?>禁用
                                <?php  }else{ ?>开启
                            <?php }?>
                        </a> |
                        <a href="<?php echo U('del',array('cid'=>$c['cid']));?>" class="del_category"
                           cat_name="<?php echo $c['cat_name'];?>">删除</a>
                    </td>
                </tr>
            <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>