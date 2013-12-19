<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>后台菜单管理</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">菜单管理</a></li>
            <li><a href="{|U:'add'}">添加菜单</a></li>
            <li><a href="javascript:update_cache();">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">ID</td>
            <td>菜单名称</td>
            <td>状态</td>
            <td class="w80">类型</td>
            <td class="w200">操作</td>
        </tr>
        </thead>
        <list from="$node" name="n">
            <tr>
                <td>
                    <input type="text" class="w30" value="{$n.list_order}" name="list_order[{$n.nid}]"/>
                </td>
                <td>{$n.nid}</td>
                <td>
                    {$n.name}
                </td>
                <td>
                    <if value="$n.status==1">
                        显示
                        <else>
                            不显示
                    </if>
                </td>
                <td>
                    <if value="$n.menu_type==1">
                        权限+菜单
                        <else>
                            普通菜单
                    </if>
                </td>
                <td style="text-align: right">
                    <if value="$n.level==3">
                        <span style="color:#bbb;">添加子菜单  | </span>
                    <else>
                        <a href="{|U('add',array('pid'=>$n['nid']))}">添加子菜单</a> |
                    </if>
                    <?php if($n['is_system']==0){?>
                    <a href="{|U('edit',array('nid'=>$n['nid']))}">修改</a> |
                    <a href="javascript:;" onclick="del({$n.nid})">删除</a>
                        <else>
                            <span style="color:#bbb;">修改 | </span>
                            <span style="color:#bbb;">删除 | </span>
                    <?php }?>
                </td>
            </tr>
        </list>
    </table>
</div>
<div class="btn_wrap">
    <input type="button" class="btn" value="更改排序" onclick="update_order();"/>
</div>
</body>
</html>