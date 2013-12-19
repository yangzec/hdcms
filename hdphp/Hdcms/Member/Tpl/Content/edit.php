<?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>{$hd.config.webname} 会员中心</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script type="text/javascript">
        var mid = {$hd.get.mid};
    </script>
</head>
<body>
<div class="topbar">
    <div class="container">
        <div class="user_info">
            <span>{$hd.session.username} | {$hd.session.rname}</span>
            <a href="{|U:'Login/out'}" target="_top">退出</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="menu">
        <!--        <a class="top_menu " href="{|U:'Home/index'}">家园</a>-->
        <a class="top_menu action" href="{|U:'Content/index'}">文章</a>
        <!--        <a class="top_menu " href="{|U:'Space/index'}">空间</a>-->
        <a class="top_menu" href="{|U:'Account/edit'}">帐号</a>
    </div>
    <div class="content">
        <div class="grid">
            <div class="profile">
                <a href="{|U:'Account/edit',array('action'=>1)}">
                    <img id="favicon" src="{$hd.session.favicon}"/>
                </a>
            </div>
            <ul class="list">
                <list from="$model_list" name="m">
                    <li class="list-item active">
                        <a href="<?php echo U($m['control'].'/index',array('mid'=>$m['mid'],'status'=>1));?>"
                        <if value='$m.mid==$hd.get.mid'>class="active"</if>>{$m.model_name}</a>
                    </li>
                </list>
            </ul>
        </div>
        <div class="main">
            <div id="con">
                <div class="table_title">添加文章</div>
                <form action="{|U:edit}" method="post">
                    <input type="hidden" value="{$field.aid}" name="aid"/>
                    <table class="table1">
                        <tr>
                            <th class="w80">标题</th>
                            <td>
                                <span class="star">*</span><input id="title" type="text" name="title" value="{$field.title}" class="title w400"/>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目</th>
                            <td>
                                <input type="hidden" name="cid" value="{$field.cid}"/>
                                {$field.catname}
                            </td>
                        </tr>
                        <tr>
                            <th>缩略图</th>
                            <td>
                                <img id="thumb" src="{$field.thumb_src}" style="cursor: pointer;width:135px;height:113px;"
                                     onclick="file_upload('thumb','thumb',1,'thumb')"/>
                                <input type="hidden" name="thumb" value="{$field.thumb}"/><br/>
                                <button class="btn3" onclick="file_upload('thumb','thumb',1,'thumb')"  type="button">上传图片</button>
                                <button class="btn3" onclick="remove_thumb(this)" type="button">取消上传</button>
                            </td>
                        </tr>
                        <tr>
                            <th>来源</th>
                            <td>
                                <input type="text" name="source" value="{$field.source}" class="w400"/>
                            </td>
                        </tr>
                        <tr>
                            <th>作者</th>
                            <td>
                                <input type="text" name="username" class="w400" value="{$field.username}"/>
                            </td>
                        </tr>
                        <!--标准模型显示正文字段-->
                        <if value="$model.type==1">
                            <tr>
                                <th>关键字</th>
                                <td>
                                    <input type="text" name="{$model.tablename}_data[keywords]" value="{$field.keywords}" class="w400"/>
                                </td>
                            </tr>
                            <tr>
                                <th>摘要</th>
                                <td>
                                    <textarea name="{$model.tablename}_data[description]" class="w450 h80">{$field.description}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>内容</th>
                                <td>
                                    <span class="star">*</span>
                                    {|tag:"ueditor",array("name"=>$model['tablename']."_data[content]","content"=>$field['content'],"style"=>2)}
                                </td>
                            </tr>
                        </if>
                        <!--自定义字段-->
                        {$custom_field}
                        <!--自定义字段-->
                    </table>
                    <input type="submit" class="btn" value="确定"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>