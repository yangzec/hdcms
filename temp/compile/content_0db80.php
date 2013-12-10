<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo C("webname");?> 会员中心</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Content&m=content&mid=1&status=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Content&m=content';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Content/css/css.css"/>
</head>
<body>
<div class="topbar">
    <div class="container">
        <div class="user_info">
            <span><?php echo $_SESSION['username'];?> | <?php echo $_SESSION['rname'];?></span>
            <a href="<?php echo U('Login/out');?>" target="_top">退出</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="menu">
<!--        <a class="top_menu " href="<?php echo U('Home/index');?>">家园</a>-->
        <a class="top_menu action" href="<?php echo U('Content/index');?>">文章</a>
<!--        <a class="top_menu " href="<?php echo U('Space/index');?>">空间</a>-->
        <a class="top_menu" href="<?php echo U('Account/edit');?>">帐号</a>
    </div>
    <div class="content">
        <div class="grid">
            <div class="profile">
                <a href="<?php echo U('Account/edit',array('action'=>1));?>">
                    <img id="favicon" src="<?php echo $_SESSION['favicon'];?>"/>
                </a>
            </div>
            <ul class="list">
                <?php $hd["list"]["m"]["total"]=0;if(isset($model_list) && !empty($model_list)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model_list));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model_list,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

                    <li class="list-item active">
                        <a href="<?php echo U($m['control'].'/index',array('mid'=>$m['mid'],'status'=>1));?>"
                           <?php if($m['mid']==$_GET['mid']){?>class="active"<?php }?>><?php echo $m['model_name'];?></a>
                    </li>
                <?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </ul>
        </div>
        <div class="main">
            <div id="con">
                <div class="tab">
                    <ul class="tab_menu">
                        <li lab="success">
                            <a class="<?php if($_GET['status']==1){?>action<?php }?>"
                               href="<?php echo U('content',array('mid'=>$_GET['mid'],'status'=>1));?>">已审核</a>
                        </li>
                        <li lab="close">
                            <a class="<?php if($_GET['status']==0){?>action<?php }?>"
                               href="<?php echo U('content',array('mid'=>$_GET['mid'],'status'=>0));?>">未审核</a>
                        </li>
                        <li>
                            <a href="<?php echo U('select_category');?>" onclick="return select_category(<?php echo $_GET['mid'];?>)">发表</a>
                        </li>
                    </ul>
                    <div class="tab_content">
                        <div id="success" class="content-list">
                            <table class="table2">
                                <thead>
                                <tr>
                                    <td class="w50">aid</td>
                                    <td>标题</td>
                                    <td class="150">栏目</td>
                                    <td class="w100">发表时间</td>
                                    <td class="w100">操作</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $hd["list"]["c"]["total"]=0;if(isset($content) && !empty($content)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($content));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($content,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                    <tr>
                                        <td><?php echo $c['aid'];?></td>
                                        <td><?php echo $c['title'];?></td>
                                        <td><?php echo $c['catname'];?></td>
                                        <td><?php echo date('Y-m-d',$c['updatetime']);?></td>
                                        <td>
                                            <a href="<?php echo U('Content/Index/content',array('aid'=>$c['aid'],'cid'=>$c['cid']));?>" target="_blank">访问</a> |
                                            <a href="<?php echo U('edit',array('aid'=>$c['aid'],'cid'=>$c['cid'],'mid'=>$_GET['mid']));?>">编辑</a> |
                                            <a href="javascript:;" onclick="del('del',<?php echo $c['cid'];?>,<?php echo $c['aid'];?>)">删除</a>
                                        </td>
                                    </tr>
                                <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </tbody>
                            </table>
                            <div class="page1">
                                <?php echo $page;?>
                            </div>
                        </div>
                        <div id="close" class="content-list">
                            <table class="table2">
                                <thead>
                                <tr>
                                    <td class="w50">aid</td>
                                    <td>标题11</td>
                                    <td class="100">栏目</td>
                                    <td class="w150">发表时间</td>
                                    <td class="w100">操作</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $hd["list"]["c"]["total"]=0;if(isset($content) && !empty($content)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($content));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($content,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                    <tr>
                                        <td><?php echo $c['aid'];?></td>
                                        <td><?php echo $c['title'];?></td>
                                        <td class="100"><?php echo $c['catname'];?></td>
                                        <td><?php echo date('Y-m-d',$c['updatetime']);?></td>
                                        <td>
                                            <a href="#">访问</a> |
                                            <a href="#">编辑</a> |
                                            <a href="#">删除</a>
                                        </td>
                                    </tr>
                                <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </tbody>
                            </table>
                            <div class="page1">
                                <?php echo $page;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>