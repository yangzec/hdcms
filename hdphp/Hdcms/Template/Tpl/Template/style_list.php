<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/style.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="table_title">友情提示</div>
    <div class="help">
        <p>1. HDCMS官网不断更新免费优质模板 <a href="http://hdcms.hdphp.com" class="action" target="_blank">立刻获取</a></p>

        <p>2. 非HDCMS官网提供的模板，可能存在恶意木马程序</p>
    </div>
    <div class="table_title">当前模板</div>
    <div class="help">
        <p>你需要了解HDCMS标签，才可以灵活编辑模板，当然这很简单 >>><a href="http://www.hdphp.com" target="_blank">获得视频教程</a></p>
    </div>
    <div class="tpl-list">
        <ul>
            <li class="active current">
                <img src="{$style_cur.img}"/>
                <h4>{$style_cur[0]}</h4>

                <p>作者: {$style_cur[1]}</p>

                <p>Email: {$style_cur[2]}</p>

                <div class="link">
                    <a href="javascript:;" class="btn" onclick="select_style('{$style_cur.dir_name}')">使用</a>
                    <a href="{|U:'show_dir',array('dir_name'=>$style_cur['dir_name'])}" class="btn">编辑</a>
                </div>
                <div class="style_cur">
                    正在使用
                </div>
            </li>
            <list from="$style" name="t">
                <li>
                    <img src="{$t.img}" width="260"/>
                    <h4>{$t[0]} {$t.active}</h4>

                    <p>作者: {$t[1]}</p>

                    <p>Email: {$t[2]}</p>

                    <div class="link">
                        <a href="javascript:;" class="btn" onclick="select_style('{$t.dir_name|basename}')">使用</a>
                        <a href="{|U:'show_dir',array('dir_name'=>$style_cur['dir_name'])}" class="btn">编辑</a>
                    </div>
                </li>
            </list>
        </ul>
    </div>
</div>
</body>
</html>