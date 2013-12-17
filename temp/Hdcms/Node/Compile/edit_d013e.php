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
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Node&c=Node&m=edit&nid=62';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Node';
		CONTROL = 'http://localhost/hdcms/index.php?a=Node&c=Node';
		METH = 'http://localhost/hdcms/index.php?a=Node&c=Node&m=edit';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Node/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Node/Tpl/Node';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Node/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Node/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Node/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Node/Tpl/Node/css/css.css"/>
</head>
<body>
<form action="<?php echo U('edit');?>" method="post" class="edit" onsubmit="return false">
    <input type="hidden" name="nid" value="<?php echo $_GET['nid'];?>"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">菜单管理</a></li>
                <li><a href="javascript:;" class="action">修改菜单</a></li>
                <li><a href="javascript:update_cache();">更新缓存</a></li>
            </ul>
        </div>
        <div class="table_title">
            菜单信息
        </div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td class="pid">
                    <select name="pid" onchange="check_pid(this);set_control(this);">
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
                            <?php if($n['nid']==$field['pid']){?>selected="selected"<?php }?>
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
                    <input type="text" name="title" value="<?php echo $field['title'];?>" class="w200"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:0px;">
                    <div id="control">
                        <?php if (isset($field['app'])): ?>
                            <table>
                                <tr>
                                    <td class="w100">项目:</td>
                                    <td>
                                        <input type="text" name="app" value="<?php echo $field['app'];?>" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>模块:</td>
                                    <td>
                                        <input type="text" name="control" value="<?php echo $field['control'];?>" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>方法:</td>
                                    <td>
                                        <input type="text" name="method" value="<?php echo $field['method'];?>" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>参数:</td>
                                    <td>
                                        <input type="text" name="param" value="<?php echo $field['param'];?>" class="w300"/>
                                        <span class="message">例:cid=1&mid=2</span>
                                    </td>
                                </tr>
                            </table>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>备注:</td>
                <td>
                    <textarea name="comment" class="w350 h100"><?php echo $field['comment'];?></textarea>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1"
                        <?php if($field['status']==1){?>checked="checked"<?php }?>
                        /> 显示</label>
                    <label><input type="radio" name="status" value="0"
                        <?php if($field['status']==0){?>checked="checked"<?php }?>
                        /> 隐藏</label>
                </td>
            </tr>
            <tr>
                <td>类型:</td>
                <td>
                    <select name="type">
                        <option value="1"
                        <?php if($field['status']==1){?>checked="checked"<?php }?>
                        >菜单+权限控制</option>
                        <option value="2"
                        <?php if($field['status']==2){?>checked="checked"<?php }?>
                        >普通菜单</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="提交" class="btn"/>
    </div>
</form>
</body>
</html>