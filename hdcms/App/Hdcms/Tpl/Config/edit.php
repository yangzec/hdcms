<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>网站配置</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:edit}" method="post" class="form-inline">
    <div class="wrap">
        <div class="table_title">温馨提示</div>
        <div class="help">
            1 模板中使用配置项方法为{ $hd.config.变量名}
            <br>
            2 修改仔细修改配置项，将影响网站的性能与安全
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">站点配置</a></li>
                <li lab="upload"><a href="#">上传设置</a></li>
                <li lab="member"><a href="#">会员设置</a></li>
                <li lab="content"><a href="#">内容相关</a></li>
                <li lab="water"><a href="#">水印设置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="grand"><a href="#">高级配置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <list from="$config.web" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                        <list from="$config.upload" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                        <list from="$config.member" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                        <list from="$config.content" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>
                <div id="water">
                    <table class="table1">
                        <list from="$config.water" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>
                <div id="safe">
                    <table class="table1">
                        <list from="$config.safe" name="c">
                            {$c.html}
                        </list>
                    </table>
                </div>

                <div id="grand">
                    <table class="table1">
                        <list from="$config.grand" name="c">
                            {$c.html}
                        </list>
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