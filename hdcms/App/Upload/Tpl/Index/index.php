<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">附件管理</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">ID</td>
            <td>文件名</td>
            <td>大小</td>
            <td width="100">上传时间</td>
            <td width="60">用户id</td>
            <td width="80">操作</td>
        </tr>
        </thead>
        <list from="$upload" name="u">
            <tr>
                <td>{$u.id}</td>
                <td>
                    {$u.name}
                </td>
                <td>
                    {$u.size|get_size}
                </td>
                <td>
                    {$u.uptime|date:"Y-m-d",@@}
                </td>
                <td>
                    {$u.uid}
                </td>
                <td>
                    <if value="$u.isimage">
                    <a href="javascript:;" onclick="view('__ROOT__/{$u.path}')">预览</a><span
                        class="line">|</span>
                    </if>
                    <a href="javascript:;" onclick="del({$u.id})">删除</a>
                </td>
            </tr>
        </list>
    </table>
</div>
<div class="page1">
    {$page}
</div>
<!--预览-->
<div id="view" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">图片预览</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
</div>
</body>
</html>