<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS - 后台管理中心</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="nav">
    <!--头部左侧导航-->
    <div class="top_menu">
        <a href="javascript:" onclick="get_left_menu(this,0);" class="top_menu">常用</a>
        <list from="$top_menu" name="m">
            <a href="javascript:" onclick="get_left_menu(this,{$m.nid});" class="top_menu">{$m.title}</a>
        </list>
    </div>
    <!--头部左侧导航-->
    <!--头部右侧导航-->
    <div class="r_menu">
        {$hd.session.rname} : admin <a href="{|U:'Login/out'}" target="_self">[退出]</a><span>|</span>
        <a href="__ROOT__" target="_blank">前台首页</a><span>|</span>
        <a href="{|U:'Member/Index/index'}" target="_blank">会员中心</a></a>
<!--        <span>|</span>-->
<!--        <a href="__ROOT__" target="_blank">后台地图</a><span>|</span>-->
<!--        <a href="__ROOT__" target="_blank">更新缓存</a>-->
    </div>
    <!--头部右侧导航-->
</div>
<!--左侧导航-->
<div class="main">
    <!--主体左侧导航-->
    <div class="left_menu">
        <div class="nid_0">
            <dl>
                <dt>常用</dt>
                <dd>
                    <a url="?a=Bug&C=Index&m=index&status=1" onclick="get_content(this,8999)" href="javascript:;" nid="8999">HDCMS反馈</a>
                </dd>
                <dd>
                    <a url="?a=Hdcms&c=Menu&m=set_favorite" onclick="get_content(this,9999)" href="javascript:;" nid="9999">设置</a>
                </dd>
                <list from="$favorite_menu" name="f">
                    <dd>
                        <a url="?a={$f.app}&c={$f.control}&m={$f.method}&nid={$f.nid}"
                           onclick="get_content(this,{$f.nid})" href="javascript:;" nid="{$f.nid}">{$f.title}</a>
                    </dd>
                </list>
            </dl>
        </div>
    </div>
    <!--主体左侧导航-->
    <!--内容显示区域-->
    <div class="menu_nav">
        <div class="direction">
            <a href="#" class="left">向左</a>
            <a href="#" class="right">向右</a>
        </div>
        <div class="favorite_menu">
            <ul>
                <li class="action" nid="0"><a href="javascript:;" class="menu" nid="0">常用</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <iframe src="{|U:'welcome'}" nid="0"></iframe>
    </div>
    <!--内容显示区域-->
</div>
<!--左侧导航-->
</body>
</html>