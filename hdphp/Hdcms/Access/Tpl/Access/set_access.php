<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <css file="__STATIC__/Css/common.css"/>
    <title>管理员管理</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:'set_access'}" method="post">
    <input type="hidden" name="rid" value="{$rid}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Role/index'}">角色列表</a></li>
                <li><a href="javascript:;" class="action">设置权限</a></li>
            </ul>
        </div>
        <div class="node">
            <ul class="level1">
                <list from="$node" name="n">
                    <li>
                        <div class="title1">
                            <?php if (!empty($n['data'])): ?><span class='add'>-</span><?php endif; ?>
                            {$n[0]}{$n.f_html}
                        </div>
                        <?php if (!empty($n['data'])): ?>
                            <ul class="level2">
                                <list from="$n.data" name="m">
                                    <li>
                                        <?php if (!empty($m['data'])): ?><span class='add'>-</span><?php endif; ?>
                                        {$m[0]}{$m.f_html}
                                        <?php if (!empty($m['data'])) { ?>
                                            <ul class="level3">
                                                <?php foreach ($m['data'] as $f) { ?>
                                                    <li>
                                                        <?php if (!empty($f['data'])): ?><span
                                                            class='add'>-</span><?php endif; ?>
                                                        {$f[0]}{$f.f_html}
                                                        <?php if (isset($f['data']) && !empty($f['data'])) { ?>
                                                            <ul class="level4">
                                                                <list from="$f.data" name="g">
                                                                    <li>
                                                                        {$g[0]}{$g.f_html}
                                                                    </li>
                                                                </list>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php }; ?>
                                    </li>
                                </list>
                            </ul>
                        <?php endif; ?>
                    </li>
                </list>
            </ul>
        </div>

    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
    </div>
</form>
</body>
</html>