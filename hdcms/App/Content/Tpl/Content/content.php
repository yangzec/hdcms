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
    <form action="__METH__&cid={$hd.get.cid}&status={$hd.get.status}" method="post">
        <input type="hidden" name="cid" value="{$hd.get.cid}"/>
        <div class="search">
            添加时间：<input id="begin_time" readonly="readonly" class="w80" type="text" value="" name="search_begin_time">
            <script>
                $('#begin_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            -
            <input id="end_time" readonly="readonly" class="w80" type="text" value="" name="search_end_time">
            <script>
                $('#end_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            &nbsp;&nbsp;&nbsp;
            <select name="search_flag" class="w100">
                <option selected="" value="">全部</option>
                <list from="$flag" name="f">
                    <option value="{$f.fid}">{$f.flagname}</option>
                </list>
            </select>&nbsp;&nbsp;&nbsp;
            <select name="search_type" class="w100">
                <option value="1">标题</option>
                <option value="2">简介</option>
                <option value="3">用户名</option>
                <option value="4" selected="selected">ID</option>
            </select>&nbsp;&nbsp;&nbsp;
            关键字：
            <input class="w200" type="text" placeholder="请输入关键字..." value="" name="search_keyword">
            <button class="btn">搜索</button>
        </div>
    </form>
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'content',array('cid'=>$_GET['cid'],'status'=>1)}" <if value="$hd.get.status==1">class="action"</if>>内容列表</a></li>
            <li><a href="{|U:'content',array('cid'=>$_GET['cid'],'status'=>0)}" <if value="$hd.get.status==0">class="action"</if>>未审核文章</a></li>
            <li><a href="javascript:;" onclick="window.open('{|U:'add',array('cid'=>$_GET['cid'],'status'=>0)}')">添加内容</a></li>
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
                <td><a href="{|U:edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}" target="_blank">{$c.title}</a>
                    {$c.flag}
                </td>
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
                    <a href="javascript:;" onclick="window.open('{|U:edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}')">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="del({$hd.get.cid},{$c.aid})">删除</a><span class="line">|</span>
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
    <input type="button" class="btn s_all btn-small" value="全选"/>
    <input type="button" class="btn r_select btn-small" value="反选"/>
    <input type="button" class="btn btn-small" onclick="update_order({$hd.get.cid})" value="更改排序"/>
    <input type="button" class="btn btn-small" onclick="del({$hd.get.cid})" value="批量删除"/>
    <input type="button" class="btn btn-small" onclick="update_order({$hd.get.cid})" value="审核"/>
    <input type="button" class="btn btn-small" onclick="update_order('del',{$hd.get.cid})" value="取消审核"/>
    <input type="button" class="btn btn-small" onclick="move({$hd.get.cid})" value="批量移动"/>
</div>
</body>
</html>