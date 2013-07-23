<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title>后盾网HDCMS</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Category/add.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Category';
		METH = 'http://localhost/hdcms/index.php/Admin/Category/add';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Js/category.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Js/validation.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Category/Css/category.css"/>
</head>
<body>
<div class="right_content">
    <div class="menu">
        <a href="<?php echo U(index);?>"
        <?php if(METHOD==index){?>class='action'<?php }?>
        >栏目列表</a> <span>|</span>
        <a href="<?php echo U('add');?>"
        <?php if(METHOD==add && $_GET['pid']==0){?>class='action'<?php }?>
        >添加顶级栏目</a> <span>|</span>
        <a href="<?php echo U('updateCache');?>">更新栏目缓存</a>
        <?php if($_GET['pid'] > 0 && METHOD==add){?>
            <span>|</span> <a href="<?php echo U('updateCache');?>" class='action'>添加子栏目</a>
        <?php }?>
        <?php if(METHOD==edit){?>
            <span>|</span> <a href="<?php echo U('updateCache');?>" class='action'>编辑栏目</a>
        <?php }?>
        <!--<a href="#list">生成内容页静态</a> <span>|</span>-->
    </div>

<form action="<?php echo U(add);?>" method="post">
    <input type="hidden" name="pid" value="<?php echo _default($_GET['pid'],0);?>"/>
    <div class="tab">
        <ul class="tab_menu">
            <li lab="base"><a href="#site">基本设置</a></li>
            <li lab="tpl"><a href="#base">模板设置</a></li>
            <li lab="html"><a href="#upload">静态HTML设置</a></li>
        </ul>
        <div class="tab_content">
            <div id="base" class="con">
                <table class="table">
                    <tr>
                        <th>栏目名称</th>
                        <td>
                            <input type="text" name="catname" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <th>内容模型</th>
                        <td>
                            <select name="mid">
                                <?php if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

                                    <option value="<?php echo $m['mid'];?>">
                                        <?php echo $m['model_name'];?>
                                    </option>
                                <?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>静态目录</th>
                        <td>
                            <input type="text" name="html_dir" id="html_dir" class="w200"/>
                            <span class="validation">静态文件存放目录</span>
                        </td>
                    </tr>

                    <tr>
                        <th>栏目关键字</th>
                        <td>
                            <input type="text" name="keyworks" class="w200"/>
                            <span class="label">SEO关键字</span>
                        </td>
                    </tr>
                    <tr>
                        <th>栏目描述</th>
                        <td>
                            <textarea name="description" cols="35" rows="4"></textarea>
                            <span class="label">不能超过100字</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tpl" class="con">
                <table class="table">
                    <tr>
                        <th>列表页模板</th>
                        <td>
                            <input type="text" name="list_tpl" class="w200" value="{style}/news_list.html"/>
                            <button type="button" class="select_tpl" action="list_tpl">选择列表模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                    <tr>
                        <th>内容页模板</th>
                        <td>
                            <input type="text" name="arc_tpl" class="w200" value="{style}/news_article.html"/>
                            <button type="button" class="select_tpl" action="arc_tpl">选择内容页模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="html" class="con">
                <table class="table">
                    <tr>
                        <th>栏目生成Html</th>
                        <td>
                            <input type="radio" class="radio" name="is_cat_html" value="1" checked="checked"/> 是
                            <input type="radio" class="radio" name="is_cat_html" value="0"/> 否
                        </td>
                    </tr>
                    <tr>
                        <th>内容页生成Html</th>
                        <td>
                            <input type="radio" class="radio" name="is_arc_html" value="1" checked="checked"/> 是
                            <input type="radio" class="radio" name="is_arc_html" value="0"/> 否
                        </td>
                    </tr>
                    <tr>
                        <th>栏目页URL规则</th>
                        <td>
                            <input type="text" name="list_html_url" class="w200"
                                   value="{catdir}/list_{cid}_{page}.html"/>
                        <span class="validation">
                        {cid} 栏目ID,
                        {catdir} 栏目目录,
                        {page} 列表的页码
                        </span>
                        </td>
                    </tr>
                    <tr>
                        <th>内容页URL规则</th>
                        <td>
                            <input type="text" name="arc_html_url" class="w200" value="{catdir}/{Y}/{M}{D}/{aid}.html"/>
                        <span class="validation">
                        {Y}、{M}、{D} 年月日,
                        {timestamp}UNIX时间戳,
                        {aid} 文章ID,
                        {catdir} 栏目目录
                        </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="send">
        <input type="submit" class="btn" name="submit" value="添加栏目"/>
    </div>
</form>