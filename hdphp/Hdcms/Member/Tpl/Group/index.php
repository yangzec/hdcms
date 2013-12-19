<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会员组管理</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">会员组列表</a></li>
            <li><a href="{|U:'add'}">添加会员组</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">gid</td>
            <td class="w100">角色名称</td>
            <td>系统组</td>
            <td>会员数</td>
            <td>积分小于</td>
            <td>允许投稿</td>
            <td>投稿不需审核</td>
            <td>允许发短消息</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$group" name="g">
            <tr>
                <td class="w30">{$g.gid}</td>
                <td class="w100">{$g.gname}</td>
                <td>{$g.system}</td>
                <td>{$g.user_count}</td>
                <td>{$g.point}</td>
                <td>{$g.allowpost}</td>
                <td>{$g.allowpostverify}</td>
                <td>{$g.allowsendmessage}</td>
                <td>
                    <a href="{|U:'edit',array('gid'=>$g['gid'])}">修改</a>
                    <if value="$g.is_system==2">|
                        <a href="javascript:;" onclick="del({$g.gid})">删除</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>