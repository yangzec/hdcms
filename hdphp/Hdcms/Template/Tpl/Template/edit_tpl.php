<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改模板</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__CONTROL_TPL__/js/edit_tpl.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">温馨提示</div>
    <div class="help">
        <p>1 修改模板后，需要删除缓存与重新生成静态文件才会看到效果</p>
        <p>2 修改模板文件前，请做好备份操作！</p>
    </div>
    <div class="table_title">修改模板</div>
    <form action="{|U:add}" method="post" onsubmit="return false;">
        <input type="hidden" name="file_path" value="{$field.file_path}"/>
        <!--右侧缩略图区域-->
        <table class="table1">
            <tr>
                <th class="w100">文件名</th>
                <td>
                    <input type="text" name="file_name" value="{$field.file_name}" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea name="content" style="width:90%;height:600px;">{$field.content}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="确定" class="btn btn-primary"/>
                    <input type="button" value="放弃" class="btn" onclick="_close('放弃编辑吗？')"/>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>