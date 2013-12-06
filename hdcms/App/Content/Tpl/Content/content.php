<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
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
            <li><a href="javascript:;" class="action">内容列表</a></li>
            <li><a href="{|U:'add',array('cid'=>$_GET['cid'])}" target="_blank">添加内容</a></li>
            <li><a href="{|U:'recycle',array('cid'=>$_GET['cid'])}">回收站</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td width="30">排序</td>
            <td>标题</td>
            <td width="100">栏目</td>
            <td class="w80">作者</td>
            <td class="w80">修改时间</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <list from="$content" name="c">
            <tr>
                <td><input type="checkbox" name="aid[]" value="{$c.aid}"/></td>
                <td>{$c.aid}</td>
                <td>
                    <input type="text" class="w30" value="{$c.arc_sort}" name="arc_order[{$c.aid}]"/>
                </td>
                <td>{$c.title} {$c.flagname}</td>
                <td>{$c.catname}</td>
                <td>
                    {$c.username}
                </td>
                <td>
                    {$c.updatetime|date:"Y-m-d",@@}
                </td>
                <td align="right">
                    <a href="{|U:'Content/Index/content',array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}" target="_blank">访问</a><span
                        class="line">|</span>
                    <a href="{|U:edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}" target="_blank">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="del('del',{$hd.get.cid},{$c.aid})">删除</a><span class="line">|</span>
                    <a href="">评论</a>
                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
</div>

<div class="btn_wrap">
    <input type="button" class="btn s_all" value="全选"/>
    <input type="button" class="btn r_select" value="反选"/>
    <input type="button" class="btn" onclick="update_order({$hd.get.cid})" value="更改排序"/>
    <input type="button" class="btn" onclick="del('del',{$hd.get.cid})" value="批量删除"/>
</div>
</body>
</html>