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
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&status=1&cid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Content/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Content/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script><link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]--><link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Content/Tpl/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Content/Tpl/Content/css/css.css"/>
</head>
<body>
<div class="wrap">
    <form action="http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=<?php echo $_GET['cid'];?>&status=<?php echo $_GET['status'];?>" method="post" class="form-inline">
        <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"/>
        <div class="search">
            添加时间：<input id="begin_time" readonly="readonly" class="w80" type="text" value="" name="search_begin_time">
            <script>
                $('#begin_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            -
            <input id="end_time" readonly="readonly" class="w80" type="text" value="" name="search_end_time">
            <script>
                $('#end_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            &nbsp;&nbsp;&nbsp;
            <select name="search_flag" class="w100">
                <option selected="" value="">全部</option>
                <?php $hd["list"]["f"]["total"]=0;if(isset($flag) && !empty($flag)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($flag));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($flag,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

                    <option value="<?php echo $f['fid'];?>"><?php echo $f['flagname'];?></option>
                <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </select>&nbsp;&nbsp;&nbsp;
            <select name="search_type" class="w100">
                <option value="1">标题</option>
                <option value="2">简介</option>
                <option value="3">用户名</option>
                <option value="4" selected="selected">ID</option>
            </select>&nbsp;&nbsp;&nbsp;
            关键字：
            <input class="w200" type="text" placeholder="请输入关键字..." value="" name="search_keyword">
            <button class="btn">搜索</button>
        </div>
    </form>
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('content',array('cid'=>$_GET['cid'],'status'=>1));?>" <?php if($_GET['status']==1){?>class="action"<?php }?>>内容列表</a></li>
            <li><a href="<?php echo U('content',array('cid'=>$_GET['cid'],'status'=>0));?>" <?php if($_GET['status']==0){?>class="action"<?php }?>>未审核文章</a></li>
            <li><a href="javascript:;" onclick="window.open('<?php echo U('add',array('cid'=>$_GET['cid'],'status'=>0));?>')">添加内容</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td width="30">排序</td>
            <td>标题</td>
            <td class="w50">状态</td>
            <td width="100">栏目</td>
            <td class="w80">作者</td>
            <td class="w80">修改时间</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
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
                <td><input type="checkbox" name="aid[]" value="<?php echo $c['aid'];?>"/></td>
                <td><?php echo $c['aid'];?></td>
                <td>
                    <input type="text" class="w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
                </td>
                <td><a href="<?php echo U(edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid']));?>" target="_blank"><?php echo $c['title'];?></a>
                    <?php echo $c['flag'];?>
                </td>
                <td>
                    <?php if($c['status']==1){?>已审核<?php  }else{ ?>未审核<?php }?>
                </td>
                <td><?php echo $c['catname'];?></td>
                <td>
                    <?php echo $c['username'];?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$c['updatetime']);?>
                </td>
                <td align="right">
                    <a href="<?php echo U('Content/Index/content',array('aid'=>$c['aid'],'cid'=>$_GET['cid']));?>" target="_blank">访问</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="window.open('<?php echo U(edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid']));?>')">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="del(<?php echo $_GET['cid'];?>,<?php echo $c['aid'];?>)">删除</a>
<!--                    <span class="line">|</span><a href="">评论</a>-->
                </td>
            </tr>
        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
</div>

<div class="btn_wrap">
    <input type="button" class="btn s_all btn-small" value="全选"/>
    <input type="button" class="btn r_select btn-small" value="反选"/>
    <input type="button" class="btn btn-small" onclick="update_order(<?php echo $_GET['cid'];?>)" value="更改排序"/>
    <input type="button" class="btn btn-small" onclick="del(<?php echo $_GET['cid'];?>)" value="批量删除"/>
    <input type="button" class="btn btn-small" onclick="set_status(<?php echo $_GET['cid'];?>,1)" value="审核"/>
    <input type="button" class="btn btn-small" onclick="set_status(<?php echo $_GET['cid'];?>,0)" value="取消审核"/>
    <input type="button" class="btn btn-small" onclick="move(<?php echo $_GET['cid'];?>)" value="批量移动"/>
</div>
</body>
</html>