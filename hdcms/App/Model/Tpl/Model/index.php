<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">模型列表</a></li>
            <li><a href="{|U:'add'}">添加模型</a></li>
            <li><a href="javascript:update_cache()">更新缓存</a></li>
        </ul>
    </div>
    <div class="content">
        <table class="table2 table-title">
            <thead>
            <tr>
                <td width="30">MID</td>
                <td>模型名称</td>
                <td width="120">类型</td>
                <td width="150">表名</td>
                <td width="150">控制器</td>
                <td width="60">状态</td>
                <td width="160">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$model" name="m">
                <tr>
                    <td>{$m.mid}</td>
                    <td>{$m.model_name}</td>
                    <td>
                        <if value='$m.type==1'>基本模型
                            <else>独立模型
                        </if>
                    </td>
                    <td>{$m.tablename}</td>
                    <td width="150">{$m.control}Control.Class.php</td>
                    <td>
                        <if value="$m['enable']">开启
                            <else>关闭
                        </if>
                    </td>
                    <td>
                        <a href="{|U:'Field/Field/index',array('mid'=>$m['mid'])}">字段管理</a> |
                        <a href="{|U:'edit',array('mid'=>$m['mid'])}">修改</a> |
                        <a href="javascript:;"
                           onclick="return confirm('确定删除【{$m.model_name}】模型吗？')?delModel({$m['mid']}):false;">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>