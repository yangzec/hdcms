<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Category';
		CONTROL = 'http://localhost/hdcms/index.php?a=Category&c=Category';
		METH = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=add';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Category/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Category/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Category/Tpl/Category/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Category/Tpl/Category/css/css.css"/>
</head>
<body>
<form action="<?php echo U(add);?>" method="post">
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">栏目列表</a></li>
            <li><a href="javascript:;" class="action">添加栏目</a></li>
            <li><a href="javascript:update_cache();">更新栏目缓存</a></li>
        </ul>
    </div>
    <input type="hidden" name="pid" value="<?php echo _default($_GET['pid'],0);?>"/>

    <div class="tab">
        <ul class="tab_menu">
            <li lab="base"><a href="#">基本设置</a></li>
            <li lab="tpl"><a href="#">模板设置</a></li>
            <li lab="html"><a href="#">静态HTML设置</a></li>
        </ul>
        <div class="tab_content">
            <div id="base">
                <table class="table1">
                    <tr>
                        <td class="w100">内容模型</td>
                        <td>
                            <select name="mid">
                                <?php $hd["list"]["m"]["total"]=0;if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
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
                        <td>上级</td>
                        <td>
                            <select name="pid">
                                <option value="0">一级栏目</option>
                                <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                    <option value="<?php echo $c['cid'];?>" <?php echo $c['disabled'];?> <?php echo $c['selected'];?>>
                                    <?php echo $c['catname'];?>
                                    </option>
                                <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目名称</td>
                        <td>
                            <input type="text" name="catname" class="w200"/>
                        </td>
                    </tr>

                    <tr>
                        <td>静态目录</td>
                        <td>
                            <input type="text" name="catdir" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>生成静态</td>
                        <td>
                            <label><input type="radio" name="urltype" value="1" checked="checked"/> 静态访问</label>
                            <label><input type="radio" name="urltype" value="2"/> 动态访问</label>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目类型</td>
                        <td>
                            <label><input type="radio" name="cattype" checked="checked" value="1"/> 普通栏目</label>
                            <label><input type="radio" name="cattype" value="2"/> 频道封面</label>
                            <label><input type="radio" name="cattype" value="3"/> 外部链接(在跳转Url处填写网址)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>前台显示</td>
                        <td>
                            <label><input type="radio" name="cat_show" value="1" checked="checked"/> 显示</label>
                            <label><input type="radio" name="cat_show" value="0"/> 不显示</label>
                        </td>
                    </tr>
                    <tr>
                        <td>跳转Url</td>
                        <td>
                            <input type="text" name="cat_redirecturl" class="w300"/>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目关键字</td>
                        <td>
                            <input type="text" name="keyworks" class="w300"/>
                            <span class="label">SEO关键字</span>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目描述</td>
                        <td>
                            <textarea name="description" class="w350 h80"></textarea>
                            <span class="label">不能超过100字</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tpl" class="con">
                <table class="table1">
                    <tr>
                        <td class="w100">封面模板</td>
                        <td>
                            <input type="text" name="index_tpl" class="w200" id="index_tpl"
                                   value="{style}/article_index.html"/>
                            <button type="button" onclick="select_tpl('index_tpl')">选择列表模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                    <tr>
                        <td>列表页模板</td>
                        <td>
                            <input type="text" name="list_tpl" id="list_tpl" class="w200" value="{style}/article_list.html"/>
                            <button type="button" onclick="select_tpl('list_tpl')">选择列表模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                    <tr>
                        <td>内容页模板</td>
                        <td>
                            <input type="text" name="arc_tpl" id="arc_tpl" class="w200" value="{style}/article_default.html"/>
                            <button type="button" onclick="select_tpl('arc_tpl')">选择内容页模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="html" class="con">
                <table class="table1">
                    <tr>
                        <td class="w100">栏目生成Html</td>
                        <td>
                            <label><input type="radio" class="radio" name="is_cat_html" value="1"
                                          checked="checked"/> 是</label>
                            <label><input type="radio" class="radio" name="is_cat_html" value="0"/> 否</label>
                        </td>
                    </tr>
                    <tr>
                        <td>内容页生成Html</td>
                        <td>
                            <label><input type="radio" class="radio" name="is_arc_html" value="1"
                                          checked="checked"/> 是</label>
                            <label><input type="radio" class="radio" name="is_arc_html" value="0"/> 否</label>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目页URL规则</td>
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
                        <td>内容页URL规则</td>
                        <td>
                            <input type="text" name="arc_html_url" class="w200"
                                   value="{catdir}/{y}/{m}{d}/{aid}.html"/>
                        <span class="validation">
                        {y}、{m}、{d} 年月日,
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
</div>
<div class="btn_wrap">
    <input type="submit" class="btn" value="确定"/>
</div>
</form>
</body>
</html>