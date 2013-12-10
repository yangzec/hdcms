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
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Content&mid=1&m=add&cid=10';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Content&m=add';
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
    <script type="text/javascript">
        var mid = <?php echo $_GET['mid'];?>;
    </script>
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
                <div class="table_title">添加文章</div>
                <form action="<?php echo U(add);?>" method="post" onsubmit="return false;">
                    <table class="table1">
                        <tr>
                            <th class="w80">标题</th>
                            <td>
                                <span class="star">*</span><input id="title" type="text" name="title"
                                                                  class="title w400"/>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目</th>
                            <td>
                                <input type="hidden" name="cid" value="<?php echo $category['cid'];?>"/>
                                <?php echo $category['catname'];?>
                            </td>
                        </tr>
                        <tr>
                            <th>缩略图</th>
                            <td>
                                <img id="thumb" onclick="file_upload('thumb','thumb',1,'thumb')" style="cursor: pointer;width:135px;height:113px;" src="http://localhost/hdcms/hdcms/static/img/upload-pic.png">
                                <input type="hidden" name="thumb"><br/>
                                <button class="btn3" onclick="file_upload('thumb','thumb',1,'thumb')"  type="button">上传图片</button>
                                <button class="btn3" onclick="remove_thumb(this)" type="button">取消上传</button>
                            </td>
                        </tr>
                        <tr>
                            <th>来源</th>
                            <td>
                                <input type="text" name="source" class="w400"/>
                            </td>
                        </tr>
                        <tr>
                            <th>作者</th>
                            <td>
                                <input type="text" name="username" class="w400" value="<?php echo $_SESSION['username'];?>"/>
                            </td>
                        </tr>
                        <!--标准模型显示正文字段-->
                        <?php if($model['type']==1){?>
                            <tr>
                                <th>关键字</th>
                                <td>
                                    <input type="text" name="<?php echo $model['tablename'];?>_data[keywords]" class="w400"/>
                                </td>
                            </tr>
                            <tr>
                                <th>摘要</th>
                                <td>
                                    <textarea name="<?php echo $model['tablename'];?>_data[description]" class="w450 h80"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>内容</th>
                                <td>
                                    <span class="star">*</span>
                                    <?php echo tag("ueditor",array("name"=>$model['tablename']."_data[content]","style"=>2));?>

                                </td>
                            </tr>
                        <?php }?>
                        <!--自定义字段-->
                        <?php echo $custom_field;?>
                        <!--自定义字段-->
                    </table>
                    <input type="submit" class="btn" value="确定"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>