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
<form action="{|U:'edit'}" method="post" class="edit" onsubmit="return false">
    <input type="hidden" name="nid" value="{$hd.get.nid}"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">菜单管理</a></li>
                <li><a href="javascript:;" class="action">修改菜单</a></li>
                <li><a href="javascript:update_cache();">更新缓存</a></li>
            </ul>
        </div>
        <div class="table_title">
            菜单信息
        </div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td class="pid">
                    <select name="pid" onchange="check_pid(this);set_control(this);">
                        <option value="0" level="1">一级菜单</option>
                        <list from="$node" name="n">
                            <option value="{$n.nid}" level="{$n.level}"
                            <if value="$n.nid==$field.pid">selected="selected"</if>
                            >{$n.name}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <td>名称:</td>
                <td>
                    <input type="text" name="title" value="{$field.title}" class="w200"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:0px;">
                    <div id="control">
                        <?php if (isset($field['app'])): ?>
                            <table>
                                <tr>
                                    <td class="w100">项目:</td>
                                    <td>
                                        <input type="text" name="app" value="{$field.app}" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>模块:</td>
                                    <td>
                                        <input type="text" name="control" value="{$field.control}" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>方法:</td>
                                    <td>
                                        <input type="text" name="method" value="{$field.method}" class="w200"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>参数:</td>
                                    <td>
                                        <input type="text" name="param" value="{$field.param}" class="w300"/>
                                        <span class="message">例:cid=1&mid=2</span>
                                    </td>
                                </tr>
                            </table>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>备注:</td>
                <td>
                    <textarea name="comment" class="w350 h100">{$field.comment}</textarea>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1"
                        <if value="$field.status==1">checked="checked"</if>
                        /> 显示</label>
                    <label><input type="radio" name="status" value="0"
                        <if value="$field.status==0">checked="checked"</if>
                        /> 隐藏</label>
                </td>
            </tr>
            <tr>
                <td>类型:</td>
                <td>
                    <select name="type">
                        <option value="1"
                        <if value="$field.status==1">checked="checked"</if>
                        >菜单+权限控制</option>
                        <option value="2"
                        <if value="$field.status==2">checked="checked"</if>
                        >普通菜单</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="btn_wrap">
        <input type="submit" value="提交" class="btn"/>
    </div>
</form>
</body>
</html>