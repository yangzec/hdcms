<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS反馈</title>
    <hdui/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="__METH__&status=1" <if value="$hd.get.status==1">class="action"</if>>未审核</a></li>
            <li><a href="__METH__&status=2" <if value="$hd.get.status==2">class="action"</if>>处理中</a></li>
            <li><a href="__METH__&status=3" <if value="$hd.get.status==3">class="action"</if>>已解决</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" onclick="select_all(this)"/>
            </td>
            <td class="w30">bid</td>
            <td class="w80">反馈者</td>
            <td class="w150">邮箱</td>
            <td>提交时间</td>
            <td class="w550">问题摘要</td>
            <td class="w60">问题类型</td>
            <td class="w50">状态</td>
            <td width="50">操作</td>
        </tr>
        </thead>
        <list from="$data" name="b">
            <tr>
                <td class="w30">
                    <input type="checkbox" name="bid[]" value="{$b.bid}"/>
                </td>
                <td>{$b.bid}</td>
                <td>{$b.username}</td>
                <td>{$b.email}</td>
                <td>{$b.addtime|date:"Y-m-d H:i",@@}</td>
                <td>
                    {$b.content|mb_substr:0,55,"utf-8"}...
                </td>
                <td>{$b.type}</td>
                <td>{$b.status}</td>
                <td>
                    <a href="__CONTROL__&m=resolve&bid={$b.bid}">处理</a>
                </td>
            </tr>
        </list>
    </table>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="批量删除" onclick="del()"/>
    </div>
</div>
</body>
</html>