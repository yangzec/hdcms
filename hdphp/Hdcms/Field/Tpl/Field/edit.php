<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <hdui/>
    <js file="__GROUP__/Static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script>
        var mid = "{$hd.get.mid}";
    </script>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="form-inline">
    <input type="hidden" name="fid" value="{$hd.get.fid}"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Hdcms/Model/index'}">模型列表</a></li>
                <li><a href="{|U('index',array('mid'=>$_GET['mid']))}">字段列表</a></li>
                <li><a href="javascript:;" class="action">修改字段</a></li>
            </ul>
        </div>
        <div class="table_title">
            添加字段
        </div>
        <input type="hidden" name="mid" value="{$hd.get.mid}"/>
        <table class="table1">
            <tr>
                <td class="w100">模型</td>
                <td>
                    <input type="text" disabled="disabled" value="{$model.model_name}"/>
                </td>
            </tr>
            <tr>
                <td>
                    标题<span class="star">*</span>
                </td>
                <td>
                    <input type="text" name="title" class="w200" value="{$field.title}"/>
                </td>
            </tr>
            <tr>
                <td>
                    会员中心显示
                </td>
                <td>
                    <label><input type="radio" name="ismember" value="1"
                        <if value='$field.ismember==1'>checked="checked"</if>
                        /> 是</label>
                    <label><input type="radio" name="ismember" value="0"
                        <if value='$field.ismember==0'>checked="checked"</if>
                        /> 否</label>
                </td>
            </tr>
            <tr>
                <td>
                    提示
                </td>
                <td>
                    <input type="text" name="set[message]" class="w350"/>
                </td>
            </tr>
        </table>
        <div class="field_tpl">
            <?php require TPL_PATH . '/Form/edit/' . $field['show_type'] . '.php'; ?>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="确定" class="btn btn-primary"/>
    </div>
</form>
</body>
</html>