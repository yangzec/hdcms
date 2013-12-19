<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加自定义JS标签</title>
    <hdui/>
    <js file="__GROUP__/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="form-inline" onsubmit="return hd_dialog(this,'__CONTROL__')">
    <input type="hidden" name="id" value="{$field.id}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">标签列表</a></li>
                <li><a href="{|U:'add'}" class="action">添加自定义JS标签</a></li>
            </ul>
        </div>
        <div class="table_title">
            添加模型
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">JS名称</th>
                    <td>
                        <input type="text" name="name" value="{$field.name}" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>JS 描述</th>
                    <td>
                        <input type="text" name="description" value="{$field.description}" class="w400"/>
                        <span class="message">请在此输入js说明，方便以后查找</span>
                    </td>
                </tr>
            </table>

            <table class="table1">
                <tr>
                    <th class="w100">选择栏目</th>
                    <td class="w300">
                        <select name="options[cid][]" id="" multiple="multiple" size="5">
                            <option value="0"> - 所有栏目 -</option>
                            <list from="$category" name="c">
                                <option value="{$c.cid}" {$c.disabled}>{$c.catname}</option>
                            </list>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th class="w100">属性控制</th>
                    <td>
                    <list from="$flag" name="f">
                        <label class="checkbox inline"><input type="checkbox" name="options[flag][]" value="{$f.fid}"/> {$f.flagname}</label>
                    </list>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>链接目标</th>
                    <td>
                        <select name="options[target]">
                            <option value=""> - 不指定链接目标 -</option>
                            <option value="_blank"> 新窗口打开(_blank)</option>
                            <option value="_self"> 当前窗口打开(_self)</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>排序方法</th>
                    <td>
                        <select name="options[order]" id="">
                            <option value=""> - 不指定排序方法 -</option>
                            <option value="aid DESC"> 按id排序</option>
                            <option value="addtime desc"> 最新发表</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>文档数量</th>
                    <td>
                        <input type="text" class="w100" value="10" name="options[row]"/> 条
                    </td>
                    <td>
<!--                        链接目标-->
<!--                        <select name="" id="">-->
<!--                            <option value="0"> - 没有设置 -</option>-->
<!--                            <option value="0"> - 新窗口打开_blank -</option>-->
<!--                            <option value="0"> - 当前窗口_self -</option>-->
<!--                        </select>-->
                    </td>
                </tr>
                <tr>
                    <th>日期格式</th>
                    <td>
                        <select name="options[date_format]">
                            <option value=""> - 不指定日期格式 -</option>
                            <option value="Y-m"> 2013-10 (年-月) </option>
                            <option value="Y-m-d"> 2013-10-12 (年-月-日)</option>
                            <option value="m-d"> 10-12 (月-日)</option>
                            <option value="Y-m-d H:i"> 2013-10-12 10:22 (年-月-日 时:分)</option>
                            <option value="Y-m-d H:i:s"> 2013-10-12 10:22:55 (年-月-日 时:分:秒)</option>
                        </select>
                    </td>
                    <td></td>
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