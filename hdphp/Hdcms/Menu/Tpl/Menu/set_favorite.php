<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加文章</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__GROUP__/Static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form method="post" action="__METH__">
    <div class="wrap">
        <div class="table_title">设置常用菜单</div>
        <table class="table1">
            <list from="$menu" name="n">
                <tr>
                    <th class="w200">
                        <div class="level2">{$n.html}</div>
                    </th>
                    <td>
                        <ul>
                            <list from="$n.data" name="m">
                                <li>{$m.html}</li>
                            </list>
                        </ul>
                    </td>
                </tr>
            </list>
        </table>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn btn-primary" value="确定"/>
    </div>
</form>