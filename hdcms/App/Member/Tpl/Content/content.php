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
                <div class="tab">
                    <ul class="tab_menu">
                        <li lab="success">
                            <a class="<if value='$hd.get.status==1'>action</if>"
                               href="{|U:'content',array('mid'=>$_GET['mid'],'status'=>1)}">已审核</a>
                        </li>
                        <li lab="close">
                            <a class="<if value='$hd.get.status==0'>action</if>"
                               href="{|U:'content',array('mid'=>$_GET['mid'],'status'=>0)}">未审核</a>
                        </li>
                        <li>
                            <a href="{|U:'select_category'}" onclick="return select_category({$hd.get.mid})">发表</a>
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
                                <list from="$content" name="c">
                                    <tr>
                                        <td>{$c.aid}</td>
                                        <td>{$c.title}</td>
                                        <td>{$c.catname}</td>
                                        <td>{$c.updatetime|date:"Y-m-d",@@}</td>
                                        <td>
                                            <a href="{|U:'Content/Index/content',array('aid'=>$c['aid'],'cid'=>$c['cid'])}" target="_blank">访问</a> |
                                            <a href="{|U:'edit',array('aid'=>$c['aid'],'cid'=>$c['cid'],'mid'=>$_GET['mid'])}">编辑</a> |
                                            <a href="javascript:;" onclick="del('del',{$c.cid},{$c.aid})">删除</a>
                                        </td>
                                    </tr>
                                </list>
                                </tbody>
                            </table>
                            <div class="page1">
                                {$page}
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
                                <list from="$content" name="c">
                                    <tr>
                                        <td>{$c.aid}</td>
                                        <td>{$c.title}</td>
                                        <td class="100">{$c.catname}</td>
                                        <td>{$c.updatetime|date:"Y-m-d",@@}</td>
                                        <td>
                                            <a href="#">访问</a> |
                                            <a href="#">编辑</a> |
                                            <a href="#">删除</a>
                                        </td>
                                    </tr>
                                </list>
                                </tbody>
                            </table>
                            <div class="page1">
                                {$page}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>