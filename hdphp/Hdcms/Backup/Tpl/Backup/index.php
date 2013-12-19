<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>还原备份</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">备份列表</a></li>
            <li><a href="{|U:'backup'}">备份数据</a></li>
        </ul>
    </div>
    <form action="{|U:'delBackupDir'}" method="post">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>备份目录</td>
                <td>备份时间</td>
                <td>大小</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$dir" name="d">
                <tr>
                    <td width="50">
                        <label><input type="checkbox" name="table[]" value="{$d.name}"/></label>
                    </td>
                    <td>{$d.name}</td>
                    <td>{$d.filemtime|date:'Y-m-d h:i:s',@@}</td>
                    <td>{$d.size|get_size}</td>
                    <td>
                        <a href="javascript:;" class="recovery" dir="{$d.name}">数据还原</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>
<div class="btn_wrap">
    <input type="button" class="btn s_all" value="全选"/>
    <input type="button" class="btn r_select" value="反选"/>
    <input type="button" class="btn" id="del" value="批量删除"/>
</div>
</body>
</html>