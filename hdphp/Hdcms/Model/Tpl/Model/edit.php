<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改模型</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="form-inline">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">模型列表</a></li>
                <li><a href="javascript:;" class="action">添加模型</a></li>
            </ul>
        </div>
        <div class="table_title">
            修改模型
        </div>
        <div class="right_content">
            <input type="hidden" name="mid" value="{$field.mid}"/>
            <table class="table1">
                <tr>
                    <th class="w100">模型名称</th>
                    <td>
                        <input type="text" value="{$field.model_name}" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>允许前台投稿</th>
                    <td>
                        <label><input type="radio" name="is_submit" value="1"
                            <if value="$field.is_submit==1">checked="checked"</if>
                            /> 允许</label>
                        <label><input type="radio" name="is_submit" value="0"
                            <if value="$field.is_submit==0">checked="checked"</if>
                            />
                            不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>模型描述</th>
                    <td>
                        <textarea name="description" class="w200 h80">{$field.description}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>应用</th>
                    <td>
                        <input type="text" name="app_name" value="{$field.control}" class="w200"/>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="确定" class="btn btn-primary"/>
    </div>
</form>
</body>
</html>