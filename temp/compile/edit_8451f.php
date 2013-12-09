<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改文章</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=edit&aid=80&cid=8';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=edit';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Content/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Content/Tpl/Content/css/css.css"/>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post">
    <input type="hidden" value="<?php echo $field['aid'];?>" name="aid"/>
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <tr>
                    <th>缩略图</th>
                </tr>
                <tr>
                    <td>
                        <img id="thumb" src="<?php echo $field['thumb_src'];?>" style="cursor: pointer;width:135px;height:113px;"
                             onclick="file_upload('thumb','thumb',1,'thumb')"/>
                        <input type="hidden" name="thumb" value="<?php echo $field['thumb'];?>"/>
                        <button type="button" class="btn3" onclick="file_upload('thumb','thumb',1,'thumb')">上传图片</button>
                        <button type="button" class="btn3" onclick="remove_thumb(this)">取消上传</button>
                    </td>
                </tr>
                <tr>
                    <th>发布时间</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="updatetime" name="updatetime" value="<?php echo date('Y/m/d H:i:s',$field['updatetime']);?>"
                               class="w150"/>
                        <script>
                            $('#updatetime').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>跳转地址</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="redirecturl" value="<?php echo $field['redirecturl'];?>" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>生成静态</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="ishtml" value="1" <?php if($field['ishtml']==1){?>checked="checked"<?php }?>/> 是</label>
                        <label><input type="radio" name="ishtml" value="0" <?php if($field['ishtml']==0){?>checked="checked"<?php }?>/> 否</label>
                    </td>
                </tr>
                <tr>
                    <th>允许回复</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="allowreply" value="1"  <?php if($field['allowreply']==1){?>checked="checked"<?php }?>/>
                            允许</label>
                        <label><input type="radio" name="allowreply" value="0"  <?php if($field['allowreply']==0){?>checked="checked"<?php }?>/> 不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>点击</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="click" class="w150" value="<?php echo $field['click'];?>"/>
                    </td>
                </tr>
                <tr>
                    <th>来源</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="source" value="<?php echo $field['source'];?>" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>作者</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="username" class="w150" value="<?php echo $field['username'];?>"/>
                    </td>
                </tr>
            </table>

        </div>
        <div class="content_left">
            <div class="table_title">添加文章</div>
            <table class="table1">
                <tr>
                    <th class="w80">标题</th>
                    <td>
                        <span class="star">*</span><input id="title" type="text" name="title" value="<?php echo $field['title'];?>" class="title w400"/>
                        <label>
                            标题颜色 <input type="text" name="color" value="<?php echo $field['color'];?>" class="w60"/>
                        </label>
                        <button type="button" onclick="selectColor(this,'color')">选取颜色</button>
                        <label><input type="checkbox" name="new_window" value="1" <?php if($field['new_window']==1){?>checked='checked'<?php }?>/> 新窗口打开</label>
                    </td>
                </tr>
                <tr>
                    <th class="w80">SEO标题</th>
                    <td>
                        <input type="text" name="seo_title" value="<?php echo $field['seo_title'];?>" class="w500"/>
                    </td>
                </tr>
                <tr>
                    <th>属性</th>
                    <td>
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

                            <?php echo $f['html'];?>
                        <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </td>
                </tr>
                <tr>
                    <th>栏目</th>
                    <td>
                        <input type="hidden" name="cid" value="<?php echo $field['cid'];?>"/>
                       <?php echo $field['catname'];?>
                    </td>
                </tr>
                <!--标准模型显示正文字段-->
                <?php if($model['type']==1){?>
                    <tr>
                        <th>关键字</th>
                        <td>
                            <input type="text" name="<?php echo $model['tablename'];?>_data[keywords]" value="<?php echo $field['keywords'];?>" class="w400"/>
                        </td>
                    </tr>
                    <tr>
                        <th>摘要</th>
                        <td>
                            <textarea name="<?php echo $model['tablename'];?>_data[description]" class="w450 h80"><?php echo $field['description'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>内容</th>
                        <td>
                            <span class="star">*</span>
                            <?php echo tag("ueditor",array("name"=>$model['tablename']."_data[content]","content"=>$field['content']));?>
                            <div class="editor_set">
                                <label><input type="checkbox" name="down_remote_pic" value="1" checked="checked"/>下载远程图片</label>
                                <label><input type="checkbox" name="auto_desc" value="1" checked="checked"/>是否截取内容</label>
                                <input type="text" size="3" value="200" name="auto_desc_length">
                                字符至内容摘要
                                <label><input type="checkbox" name="auto_thumb" value="1" checked="checked"/>否获取内容第</label>
                                <input type="text" size="2" value="1" name="auto_thumb_num">
                                张图片作为缩略图
                            </div>
                        </td>
                    </tr>
                <?php }?>
                <!--自定义字段-->
                <?php echo $custom_field;?>
                <!--自定义字段-->
                <tr>
                    <th>模板</th>
                    <td>
                        <input class="w250" type="text" name="template" value="<?php echo $field['template'];?>" id="template">
                        <button class="select_tpl" type="button" onclick="select_tpl('template')">选择模板</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
        <input type="button" class="btn2 close_window" value="关闭"/>
    </div>
</form>
</body>
</html>