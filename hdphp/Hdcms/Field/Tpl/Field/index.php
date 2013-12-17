<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'Model/Model/index'}">模型列表</a></li>
            <li><a href="javascript:;" class="action">字段列表</a></li>
            <li><a href="{|U('add',array('mid'=>$_GET['mid']))}">添加字段</a></li>
            <li><a href="javascript:update_cache({$hd.get.mid})">更新字段缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">排序</td>
            <td width="30">Fid</td>
            <td width="200">描述</td>
            <td>字段名</td>
            <td width="80">系统</td>
            <td width="60">主表</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$field" name="f">
            <tr>
                <td>
                    <input type="text" name="fieldsort[{$f.fid}]" class="w30" value="{$f.fieldsort}"/>
                </td>
                <td>
                    {$f.fid}
                </td>
                <td>{$f.title}</td>
                <td>{$f.field_name}</td><td>
                    <if value="{$f.is_system}">是
                        <else>否
                    </if>
                </td>
                <td>
                    <if value="{$f.is_main_table}">是
                        <else>否
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('mid'=>$f['mid'],'fid'=>$f['fid'])}">修改</a>
                    |
                    <a href="javascript:"
                       onclick="return confirm('确定删除【{$f.field_name}】字段吗？')?del_field({$f['mid']},{$f['fid']}):false;">删除</a>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
    <div style="float:left; margin-top:20px;">
        <input type="button" class="btn btn-primary" id="updateSort" value="排序"/>
    </div>
</div>
</body>
</html>