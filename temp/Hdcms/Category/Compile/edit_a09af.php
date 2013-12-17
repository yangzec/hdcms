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
		URL = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=edit&cid=9';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Category';
		CONTROL = 'http://localhost/hdcms/index.php?a=Category&c=Category';
		METH = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=edit';
		GROUP = 'http://localhost/hdcms/hdphp';
		TPL = 'http://localhost/hdcms/hdphp/hdcms/Category/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdphp/hdcms/Category/Tpl/Category';
		STATIC = 'http://localhost/hdcms/hdphp/hdcms/Category/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdphp/hdcms/Category/Tpl/Public';
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
    <script type="text/javascript" src="http://localhost/hdcms/hdphp/hdcms/Category/Tpl/Category/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdphp/hdcms/Category/Tpl/Category/css/css.css"/>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" class="form-inline">
    <input type="hidden" value="<?php echo $field['cid'];?>" name="cid"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">栏目列表</a></li>
                <li><a href="javascript:;" class="action">添加栏目</a></li>
                <li><a href="javascript:update_cache();">更新栏目缓存</a></li>
            </ul>
        </div>
        <input type="hidden" name="mid" value="<?php echo $field['mid'];?>"/>

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
                            <td class="w100">上级</td>
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

                                        <option value="<?php echo $c['cid'];?>"
                                        <?php echo $c['selected'];?> <?php echo $c['disabled'];?>>
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
                                <input type="text" name="catname" value="<?php echo $field['catname'];?>" class="w200"/>
                            </td>
                        </tr>

                        <tr>
                            <td>静态目录</td>
                            <td>
                                <input type="text" name="catdir" value="<?php echo $field['catdir'];?>" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <td>生成静态</td>
                            <td>
                                <label><input type="radio" name="urltype" value="1"
                                    <?php if($field['urltype']==1){?>checked="checked"<?php }?>
                                    /> 静态访问</label>
                                <label><input type="radio" name="urltype" value="2"
                                    <?php if($field['urltype']==2){?>checked="checked"<?php }?>
                                    /> 动态访问</label>
                            </td>
                        </tr>
                        <tr>
                            <td>前台显示</td>
                            <td>
                                <label><input type="radio" name="cattype" value="1"
                                    <?php if($field['cattype']==1){?>checked="checked"<?php }?>
                                    /> 普通栏目</label>
                                <label><input type="radio" name="cattype" value="2"
                                    <?php if($field['cattype']==2){?>checked="checked"<?php }?>
                                    /> 频道封面</label>
                                <label><input type="radio" name="cattype" value="3"
                                    <?php if($field['cattype']==3){?>checked="checked"<?php }?>
                                    /> 外部链接(在跳转Url处填写网址)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>显示</td>
                            <td>
                                <label><input type="radio" name="cat_show" value="1"
                                    <?php if($field['cat_show']==1){?>checked="checked"<?php }?>
                                    /> 是</label>
                                <label><input type="radio" name="cat_show" value="2"
                                    <?php if($field['cat_show']==0){?>checked="checked"<?php }?>
                                    /> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <td>跳转Url</td>
                            <td>
                                <input type="text" name="cat_redirecturl" value="<?php echo $field['cat_redirecturl'];?>"
                                       class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <td>栏目关键字</td>
                            <td>
                                <input type="text" name="keyworks" value="<?php echo $field['keyworks'];?>" class="w300"/>
                                <span class="label">SEO关键字</span>
                            </td>
                        </tr>
                        <tr>
                            <td>栏目描述</td>
                            <td>
                                <textarea name="description" value="<?php echo $field['description'];?>" class="w350 h80"><?php echo $field['description'];?></textarea>
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
                                <input type="text" name="index_tpl" class="w200" id="index_tpl" value="<?php echo $field['index_tpl'];?>" onclick="select_template('index_tpl')"/>
                                <button type="button" class="btn" onclick="select_template('index_tpl')">选择首页模板</button>
                                <span class="validation">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <td>列表页模板</td>
                            <td>
                                <input type="text" name="list_tpl" id="list_tpl" class="w200" value="<?php echo $field['list_tpl'];?>" onclick="select_template('list_tpl')"/>
                                <button type="button" class="btn" onclick="select_template('list_tpl')">选择列表模板</button>
                                <span class="validation">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <td>内容页模板</td>
                            <td>
                                <input type="text" name="arc_tpl" id="arc_tpl" class="w200" value="<?php echo $field['arc_tpl'];?>" onclick="select_template('arc_tpl')"/>
                                <button type="button" class="btn" onclick="select_template('arc_tpl')">选择内容页模板</button>
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
                                    <?php if($field['is_cat_html']==1){?>checked="checked"<?php }?>
                                    /> 是</label>
                                <label><input type="radio" class="radio" name="is_cat_html" value="0"
                                    <?php if($field['is_cat_html']==0){?>checked="checked"<?php }?>
                                    /> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <td>内容页生成Html</td>
                            <td>
                                <label><input type="radio" class="radio" name="is_arc_html" value="1"
                                    <?php if($field['is_arc_html']==1){?>checked="checked"<?php }?>
                                    /> 是</label>
                                <label><input type="radio" class="radio" name="is_arc_html" value="0"
                                    <?php if($field['is_arc_html']==0){?>checked="checked"<?php }?>
                                    /> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <td>栏目页URL规则</td>
                            <td>
                                <input type="text" name="list_html_url" class="w200"
                                       value="<?php echo $field['list_html_url'];?>"/>
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
                                       value="<?php echo $field['arc_html_url'];?>"/>
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
        <input type="submit" class="btn btn-primary" value="确定"/>
        <input type="button" class="btn" value="取消" onclick="location.href='http://localhost/hdcms/index.php?a=Category&c=Category'"/>
    </div>
</form>
</body>
</html>