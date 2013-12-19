<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加文章</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/move_content.js"/>
    <css file="__CONTROL_TPL__/css/move_content.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">温馨提示</div>
    <div class="help"> 不能够跨模型移动文章</div>
    <div class="line"></div>
    <form action="__METH__" method="post" onsubmit="return false">
        <input type="hidden" name="mid" value="{$mid}"/>
        <table style="width:100%">
            <tr>
                <td>
                    指定来源
                </td>
                <td>
                    目标栏目
                </td>
            </tr>
            <tr>
                <td>
                    <ul class="fromtype">
                        <li>
                            <label><input type="radio" name="from_type" value="1" checked="checked"/> 从指定aid</label>
                        </li>
                        <li>
                            <label><input type="radio" name="from_type" value="2" /> 从指定栏目</label>
                        </li>
                    </ul>
                    <div id="t_aid">
                        <textarea name="aid" class="w250 h250">{$hd.get.aid}</textarea>
                    </div>
                    <div id="f_cat" style="display: none">
                        <select id="fromid" style="width:250px;height:250px;" multiple="multiple" size="2"
                                name="from_cid[]">
                            <list from="$category" name="c">
                                <option value="{$c.cid}" {$c.disabled}>
                                {$c.catname}
                                </option>
                            </list>
                        </select>
                    </div>
                </td>
                <td>
                    <select id="fromid" style="width:250px;height:290px;"  size="100"
                            name="to_cid">
                        <list from="$category" name="c">
                            <option value="{$c.cid}" {$c.disabled} {$c.selected}>
                            {$c.catname}
                            </option>
                        </list>
                    </select>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn btn-primary" value="确定"/>
            <input type="button" class="btn" id="close_window" value="关闭"/>
        </div>
    </form>
</div>
</body>
</html>