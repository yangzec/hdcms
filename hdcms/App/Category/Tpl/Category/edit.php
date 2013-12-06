<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:edit}" method="post">
    <input type="hidden" value="{$field.cid}" name="cid"/>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">栏目列表</a></li>
            <li><a href="javascript:;" class="action">添加栏目</a></li>
            <li><a href="javascript:update_cache();">更新栏目缓存</a></li>
        </ul>
    </div>
    <input type="hidden" name="pid" value="{$hd.get.pid|default:0}"/>

    <div class="tab">
        <ul class="tab_menu">
            <li lab="base"><a href="#">基本设置</a></li>
            <li lab="tpl"><a href="#">模板设置</a></li>
            <li lab="html"><a href="#">静态HTML设置</a></li>
        </ul>
        <div class="tab_content">
            <div id="base">
                <table class="table1">
                    <tr>
                        <td class="w100">内容模型</td>
                        <td>
                            <select name="mid">
                                <list from="$model" name="m">
                                    <option value="{$m.mid}" {$m.selected}>
                                        {$m.model_name}
                                    </option>
                                </list>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>上级</td>
                        <td>
                            <select name="pid">
                                <option value="0">一级栏目</option>
                                <list from="$category" name="c">
                                    <option value="{$c.cid}" {$c.selected} {$c.disabled}>
                                    {$c.catname}
                                    </option>
                                </list>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目名称</td>
                        <td>
                            <input type="text" name="catname" value="{$field.catname}" class="w200"/>
                        </td>
                    </tr>

                    <tr>
                        <td>静态目录</td>
                        <td>
                            <input type="text" name="catdir" value="{$field.catdir}"  class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>生成静态</td>
                        <td>
                            <label><input type="radio" name="urltype" value="1" <if value="$field.urltype==1">checked="checked"</if>/> 静态访问</label>
                            <label><input type="radio" name="urltype" value="2" <if value="$field.urltype==2">checked="checked"</if>/> 动态访问</label>
                        </td>
                    </tr>
                    <tr>
                        <td>前台显示</td>
                        <td>
                            <label><input type="radio" name="cattype" value="1" <if value="$field.cattype==1">checked="checked"</if>/> 普通栏目</label>
                            <label><input type="radio" name="cattype" value="2" <if value="$field.cattype==2">checked="checked"</if>/> 频道封面</label>
                            <label><input type="radio" name="cattype" value="3" <if value="$field.cattype==3">checked="checked"</if>/> 外部链接(在跳转Url处填写网址)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>生成静态</td>
                        <td>
                            <label><input type="radio" name="cat_show" value="1" <if value="$field.cat_show==1">checked="checked"</if>/> 显示</label>
                            <label><input type="radio" name="cat_show" value="2" <if value="$field.cat_show==0">checked="checked"</if>/> 不显示</label>
                        </td>
                    </tr>
                    <tr>
                        <td>跳转Url</td>
                        <td>
                            <input type="text" name="cat_redirecturl" value="{$field.cat_redirecturl}" class="w300"/>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目关键字</td>
                        <td>
                            <input type="text" name="keyworks" value="{$field.keyworks}"  class="w300"/>
                            <span class="label">SEO关键字</span>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目描述</td>
                        <td>
                            <textarea name="description" value="{$field.description}" class="w350 h80">{$field.description}</textarea>
                            <span class="label">不能超过100字</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tpl" class="con">
                <table class="table1">
                    <tr>
                        <td class="w100">封面模板</td>
                        <td>
                            <input type="text" name="index_tpl" class="w200" id="index_tpl"
                                   value="{$field.index_tpl}" onclick="select_tpl('index_tpl')"/>
                            <button type="button" onclick="select_tpl('index_tpl')">选择列表模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                    <tr>
                        <td>列表页模板</td>
                        <td>
                            <input type="text" name="list_tpl" id="list_tpl" class="w200" value="{$field.list_tpl}" onclick="select_tpl('list_tpl')"/>
                            <button type="button" onclick="select_tpl('list_tpl')">选择列表模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                    <tr>
                        <td>内容页模板</td>
                        <td>
                            <input type="text" name="arc_tpl" id="arc_tpl" class="w200" value="{$field.arc_tpl}" onclick="select_tpl('arc_tpl')"/>
                            <button type="button" onclick="select_tpl('arc_tpl')">选择内容页模板</button>
                            <span class="validation">{style}指模板风格</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="html" class="con">
                <table class="table1">
                    <tr>
                        <td class="w100">栏目生成Html</td>
                        <td>
                            <label><input type="radio" class="radio" name="is_cat_html" value="1"
                                <if value="$field.is_cat_html==1">checked="checked"</if>/> 是</label>
                            <label><input type="radio" class="radio" name="is_cat_html" value="0" <if value="$field.is_cat_html==0">checked="checked"</if>/> 否</label>
                        </td>
                    </tr>
                    <tr>
                        <td>内容页生成Html</td>
                        <td>
                            <label><input type="radio" class="radio" name="is_arc_html" value="1"
                                <if value="$field.is_arc_html==1">checked="checked"</if>/> 是</label>
                            <label><input type="radio" class="radio" name="is_arc_html" value="0" <if value="$field.is_arc_html==0">checked="checked"</if>/> 否</label>
                        </td>
                    </tr>
                    <tr>
                        <td>栏目页URL规则</td>
                        <td>
                            <input type="text" name="list_html_url" class="w200"
                                   value="{$field.list_html_url}"/>
                        <span class="validation">
                        {cid} 栏目ID,
                        {catdir} 栏目目录,
                        {page} 列表的页码
                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>内容页URL规则</td>
                        <td>
                            <input type="text" name="arc_html_url" class="w200"
                                   value="{$field.arc_html_url}"/>
                        <span class="validation">
                        {y}、{m}、{d} 年月日,
                        {timestamp}UNIX时间戳,
                        {aid} 文章ID,
                        {catdir} 栏目目录
                        </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="btn_wrap">
    <input type="submit" class="btn" value="确定"/>
</div>
</form>
</body>
</html>