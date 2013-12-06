<?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>{$hd.config.webname} 会员中心</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
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
        <a class="top_menu " href="{|U:'Content/index'}">文章</a>
        <!--        <a class="top_menu " href="{|U:'Space/index'}">空间</a>-->
        <a class="top_menu action" href="{|U:'Account/edit'}">帐号</a>
    </div>
    <div class="content">
        <div class="grid">
            <div class="profile">
                <a href="{|U:'Account/edit',array('action'=>1)}">
                    <img id="favicon" src="{$hd.session.favicon}"/>
                </a>
            </div>
            <ul class="list">
                <li class="list-item">
                    <a href="javascript:;" <if value="$hd.get.action==0">class="action"</if>>基本资料</a>
                </li>
                <li class="list-item">
                    <a href="javascript:;" <if value="$hd.get.action==1">class="action"</if>>修改头像</a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div id="con">
                <form action="{|U:'edit'}" method="post" enctype="multipart/form-data">
                    <div class="tab">
                        <ul class="tab_menu">
                            <li lab="base">
                                <a href="#">基本资料</a>
                            </li>
                            <li lab="Avatar">
                                <a href="#">修改头像</a>
                            </li>
                        </ul>
                        <div class="tab_content">
                            <div id="base">
                                <table class="table1">
                                    <tr>
                                        <th class="w100">用户名</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled"
                                                   value="{$field.username}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>用户组</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled" value="{$field.rname}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>呢称</th>
                                        <td>
                                            <input type="text" class="w200" name="realname" value="{$field.realname}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w100">原登陆密码</th>
                                        <td>
                                            <input type="password" class="w200" name="old_password" value=""/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>新密码</th>
                                        <td>
                                            <input type="password" class="w200" name="password" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>确认新密码</th>
                                        <td>
                                            <input type="password" class="w200" name="c_password" value=""/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>邮箱</th>
                                        <td>
                                            <input type="text" class="w200" name="email" value="{$field.email}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>QQ</th>
                                        <td>
                                            <input type="text" class="w200" name="qq" value="{$field.qq}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>性别</th>
                                        <td>
                                            <label><input type="radio" name="sex" value="1"
                                                <if value="$field.sex==1">checked='checked'</if>
                                                /> 男</label>
                                            <label><input type="radio" name="sex" value="2"
                                                <if value="$field.sex==2">checked='checked'</if>
                                                /> 女</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w50">积分</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled"
                                                   value="{$field.credits}"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div id="Avatar">
                                <table class="table1">
                                    <tr>
                                        <th>选择上传的文件</th>
                                        <td>
                                            <input type="file" name="favicon"/>
                                            大小{$hd.config.FAVICON_WIDTH}x{$hd.config.FAVICON_HEIGHT}像
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>原来的头像</th>
                                        <td>
                                            <img src="__ROOT__/{$field.favicon}" style="width:120px;height: 120px;"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="确定" class="btn1"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>