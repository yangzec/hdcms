<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">栏目列表</a></li>
            <li><a href="{|U:'add'}">添加顶级栏目</a></li>
            <li><a href="javascript:update_cache();">更新栏目缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">CID</td>
            <td width="50">排序</td>
            <td>栏目名称</td>
            <td width="50">访问</td>
            <td width="180">操作</td>
        </tr>
        </thead>
        <list from="$category" name="c">
            <tr>
                <td>{$c.cid}</td>
                <td>
                    <input type="text" class="w30" value="{$c.catorder}" name="list_order[{$c.cid}]"/>
                </td>
                <td>
                    {$c.catname}
                </td>
                <td>
                    <a href="{|U:'Content/Index/category',array('cid'=>$c['cid'])}" target="_blank">访问</a>
                </td>
                <td>
                    <a href="{|U:'add',array('pid'=>$c['cid'],'mid'=>$c['mid'])}">添加子栏目</a><span class="line">|</span>
                    <a href="{|U:'edit',array('cid'=>$c['cid'])}">修改</a><span class="line">|</span>
                    <a href="javascript:;" onclick="del({$c.cid})">删除</a>
                </td>
            </tr>
        </list>
    </table>
</div>
<div class="btn_wrap">
    <input type="button" class="btn update_order" value="更改排序"/>
</div>
</body>
</html>