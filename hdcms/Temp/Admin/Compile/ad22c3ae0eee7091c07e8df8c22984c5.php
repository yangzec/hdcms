<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title>后盾网-人人做后盾</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/JqueryUi/css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet"><script src="http://localhost/hdphp/hdphp/Extend/Org/JqueryUi/js/jquery-ui-1.10.3.custom.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Article/add/mid/.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Article';
		METH = 'http://localhost/hdcms/index.php/Admin/Article/add';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Article';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Admin/Tpl/Article/Js/article.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Article/Css/article.css"/>
    <script type="text/javascript" charset="utf-8"
            src="http://localhost/hdphp/hdphp/Extend/Org/Editor/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="http://localhost/hdphp/hdphp/Extend/Org/Editor/Ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">UEDITOR_HOME_URL = "http://localhost/hdphp/hdphp/Extend/Org/Editor/Ueditor/"</script>

    <!--上传文件-->
    <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/Uploadify/uploadify.css"/>
    <script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
    <!--上传文件-->
<script type="text/javascript" src="http://localhost/hdcms/Common/Js/common.js"></script>
</head>
<body>
<form action="<?php echo U(add);?>" method="post" id="form" enctype="multipart/form-data">
    <input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
    <?php if($_GET['cid']){?><input type="hidden" name="cid" value="$hd.get.cid"/><?php }?>
    <div class="right_content">
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base"><a href="#base">发表文章</a></li>
            </ul>
            <div class="tab_content">
                <div id="base" class="con">
                    <table class="table">
                        <tr>
                            <th width="100">标题</th>
                            <td>
                                <input type="text" name="title" class="title w300"/>
                                标题颜色：<input type="text" name="color" class="w100"/>
                                <button type="button" onclick="select_color(this,'color')">选取颜色</button>
                            </td>

                        </tr>
                        <tr>
                            <th>属性</th>
                            <td>
                                <?php if(isset($flag) && !empty($flag)):$_id_fl=0;$_index_fl=0;$lastfl=min(1000,count($flag));
$hd["list"]["fl"]["first"]=true;
$hd["list"]["fl"]["last"]=false;
$_total_fl=ceil($lastfl/1);$hd["list"]["fl"]["total"]=$_total_fl;
$_data_fl = array_slice($flag,0,$lastfl);
if(count($_data_fl)==0):echo "";
else:
foreach($_data_fl as $key=>$fl):
if(($_id_fl)%1==0):$_id_fl++;else:$_id_fl++;continue;endif;
$hd["list"]["fl"]["index"]=++$_index_fl;
if($_index_fl>=$_total_fl):$hd["list"]["fl"]["last"]=true;endif;?>

                                    <label>
                                        <input type="checkbox" name="flag" value="<?php echo $fl['fid'];?>"/> <?php echo $fl['flagname'];?>[<?php echo $fl['fid'];?>]
                                    </label>
                                <?php $hd["list"]["fl"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                            </td>

                        </tr>
                        <?php if(!$_GET['cid']){?>
                            <tr>
                                <th>栏目</th>
                                <td>
                                    <select name="cid">
                                        <?php if(isset($category) && !empty($category)):$_id_cat=0;$_index_cat=0;$lastcat=min(1000,count($category));
$hd["list"]["cat"]["first"]=true;
$hd["list"]["cat"]["last"]=false;
$_total_cat=ceil($lastcat/1);$hd["list"]["cat"]["total"]=$_total_cat;
$_data_cat = array_slice($category,0,$lastcat);
if(count($_data_cat)==0):echo "";
else:
foreach($_data_cat as $key=>$cat):
if(($_id_cat)%1==0):$_id_cat++;else:$_id_cat++;continue;endif;
$hd["list"]["cat"]["index"]=++$_index_cat;
if($_index_cat>=$_total_cat):$hd["list"]["cat"]["last"]=true;endif;?>

                                            <option value="<?php echo $cat['cid'];?>">
                                                <?php if($cat['pid']!=0){?>└<?php }?>
                                                <?php echo $cat['html'];?><?php echo $cat['catname'];?>
                                            </option>
                                        <?php $hd["list"]["cat"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                    </select>
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <th>缩略图</th>
                            <td>
                                <table border="0">
                                    <tr>
                                        <td>
                                            <input type="text" name="thumb" class="w300" id="thumb"/>
                                            <span class="thumb">
                                            <input type="file" name="thumb_file" class="upload_thumb"
                                                   onchange="img_upload(this,'<?php echo U(thumb_upload);?>','img_target','thumb','thumbpic')"/>
                                            </span>
                                            <iframe name="img_target" style="display:none;"></iframe>
                                        </td>
                                        <td>
                                            <div class="thumbpic"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>来源</th>
                            <td>
                                <input type="text" name="source" class="w150"/>
                                作者:
                                <input type="text" name="author" class="w150"/>
                            </td>

                        </tr>
                        <tr>
                            <th>跳转地址</th>
                            <td>
                                <input type="text" name="redirecturl" class="w300"/>
                            </td>

                        </tr>
                        <tr>
                            <th>关键字</th>
                            <td>
                                <input type="text" name="<?php echo $stable;?>[keywords]" class="w400"/>
                            </td>

                        </tr>
                        <tr>
                            <th>内容摘要</th>
                            <td>
                                <textarea name="<?php echo $stable;?>[description]" style="width:500px;height:70px;"></textarea>
                            </td>

                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>
                                <script id="content" name="<?php echo $stable;?>[content]" type="text/plain"></script>
                                <script type='text/javascript'>
                                    var ue = UE.getEditor('content', {
                                        imageUrl: '{|editor_upload_img}'//处理上传脚本
                                        , zIndex: 0, autoClearinitialContent: false, initialFrameWidth: "100%" //宽度1000
                                        , initialFrameHeight: "300" //宽度1000
                                        , autoHeightEnabled: false //是否自动长高,默认true
                                        , autoFloatEnabled: false //是否保持toolbar的位置不动,默认true
                                        , maximumWords: 2000 //允许的最大字符数
                                        , initialContent: '' //初始化编辑器的内容 也可以通过textarea/script给值
                                    });
                                </script>
                            </td>

                        </tr>
                        <tr>
                            <th>生成静态</th>
                            <td>
                                <input type="radio" name="ishtml" value="1" checked="checked"/> 是
                                <input type="radio" name="ishtml" value="2"/> 否
                            </td>
                        </tr>
                        <tr>
                            <th>允许回复</th>
                            <td>
                                <input type="radio" name="allowreply" value="1" checked="checked"/> 允许
                                <input type="radio" name="allowreply" value="2"/> 不允许
                            </td>

                        </tr>
                        <tr>
                            <th>发布时间</th>
                            <td>
                                <input type="text" name="updatetime" id="updatetime" value="<?php echo date('Y-m-d');?>"
                                       class="w200"/>
                                <script>
                                    $(function () {
                                        //日期中文字符
                                        var dateFormat = {
                                            dateFormat: "yy-mm-dd", monthNames: [ "一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月" ], dayNamesMin: [ "日", "一", "二", "三", "四", "五", "六" ]
                                        };
                                        //为ID为begin_time的input设置日历
                                        $("#updatetime").datepicker(dateFormat);
                                    });
                                </script>

                            </td>

                        </tr>
                        <?php if(isset($field) && !empty($field)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($field));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($field,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

                            <?php echo $f['html'];?>
                        <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                    <div class="send">
                        <input type="submit" class="btn" name="send" value="发表"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>