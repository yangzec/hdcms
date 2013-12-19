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
                <li class="list-item active">
                    <a href="{|U:'Content/select_category'}" class="active">文章管理</a>
                </li>
                <li class="list-item active">
                    <a href="{|U:'Content/select_category'}">我的评论</a>
                </li>
                <li class="list-item active">
                    <a href="{|U:'Content/select_category'}">盾友动态</a>
                </li>
<!--                <li class="list-item ">-->
<!--                    <a href="/w/favs">短消息</a>-->
<!--                </li>-->
<!--                <li class="list-item ">-->
<!--                    <a href="/w/favs">留言板</a>-->
<!--                </li>-->
            </ul>
        </div>
        <div class="main">
            <div id="l-con">
                <div class="message-title"></div>
                <div class="message-body">
                    <textarea class="h100" name="message" placeholder="写点什么..."></textarea>
                </div>
                <div class="submit">
                    <button type="button" class="btn">发表</button>
                </div>
                <div class="tab">
                    <ul class="tab_menu">
                        <li lab="all">
                            <a class="action" href="#">随便看看</a>
                        </li>
                        <li lab="me">
                            <a href="#">我的动态</a>
                        </li>
                        <li lab="fr">
                            <a href="#">好友动态</a>
                        </li>
                    </ul>
                    <div class="tab_content">
                        <div id="all" class="say">
                            <ul>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <div id="me" class="say">
                            <ul>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="fr" class="say">
                            <ul>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic">
                                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/>
                                    </div>
                                    <div class="f_item">
                                        <div class="f_nick">
                                            <a class="nickname" href="http://user.qzone.qq.com/622006057"
                                               target="_blank">张五常</a> 5小时前
                                        </div>
                                        <div class="f_con">
                                            445
                                            支持（之三）站在尉迟恭旁边的长孙无忌转身向一众将领挥挥手，高声说道：“各位，你们对秦王的忠心耿耿，秦王都知道了！但现在秦王需要安静地休息一下，你们先各回宿地...
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>


                    </div>
                </div>
            </div>
            <div id="r-con">
                <div class="f-title">
                    <h3>最近来访</h3>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                            <span>后盾向军</span>
                            <strong>5天前</strong>
                        </a>
                    </li>
                    <li>
                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                        <span>后盾向军</span>
                        <strong>5天前</strong>
                    </li>
                    <li>
                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                        <span>后盾向军</span>
                        <strong>5天前</strong>
                    </li>
                    <li>
                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                        <span>后盾向军</span>
                        <strong>5天前</strong>
                    </li>
                    <li>
                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                        <span>后盾向军</span>
                        <strong>5天前</strong>
                    </li>
                    <li>
                        <img src="./hdcms/App/Member/Tpl/Home/img/50.jpg"/><br/>
                        <span>后盾向军</span>
                        <strong>5天前</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>