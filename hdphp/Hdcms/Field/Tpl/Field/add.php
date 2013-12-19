<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加字段</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script type="text/javascript">
        var mid = {$mid}
        //获得字段模板类型
        var tpl_type = "add";
    </script>
</head>
<body>
<form action="{|U:'add'}" method="post" onsubmit="return false;" class="form-inline">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Model/Model/index'}">模型列表</a></li>
                <li><a href="{|U('index',array('mid'=>$_GET['mid']))}">字段列表</a></li>
                <li><a href="javascript:;" class="action">添加字段</a></li>
            </ul>
        </div>
        <div class="table_title">
            添加字段
        </div>
        <input type="hidden" name="mid" value="{$model.mid}"/>
        <table class="table1">
            <tr>
                <td class="w100">模型</td>
                <td>
                    <input type="text" disabled="disabled" value="{$model.model_name}"/>
                </td>
            </tr>
            <tr>
                <td>类型</td>
                <td>
                    <select id="field_type" name="show_type">
                        <option value="input">单行文本</option>
                        <option value="textarea">多行文本</option>
                        <option value="number">数字</option>
                        <option value="select">选项</option>
                        <option value="editor">编辑器</option>
                        <option value="image">图片</option>
                        <option value="images">多图片</option>
                        <option value="date">日期与时间</option>
                    </select>
                </td>
            </tr>
            <if value="$model.type==1">
                <tr>
                    <td>表</td>
                    <td>
                        <label><input type="radio" name="table_type" value="1"/> 主表</label>
                        <label><input type="radio" name="table_type" value="2" checked="checked"/> 附表</label>
                    </td>
                </tr>
                <else>
                    <input type="hidden" name="is_main_table" value="1"/>
            </if>

            <tr>
                <td>
                    字段别名<span class="star">*</span>
                </td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>
                    字段名<span class="star">*</span>
                </td>
                <td>
                    <input type="text" name="field_name" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>输入提示</td>
                <td>
                    <input type="text" name="set[message]" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="field_tpl">

        </div>
        <table class="table1">
            <tr>
                <td class="w100">
                    会员中心显示
                </td>
                <td>
                    <label><input type="radio" name="ismember" value="1" checked="checked"/> 是</label>
                    <label><input type="radio" name="ismember" value="0"/> 否</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="确定" class="btn btn-primary"/>
    </div>
</form>
</body>
</html>