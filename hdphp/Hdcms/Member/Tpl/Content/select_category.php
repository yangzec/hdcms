<?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>{$hd.config.webname} 会员中心</title>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <style type="text/css">

        div.s-cat {
            padding: 10px;
        }

        option {
            border-bottom: solid 1px #dcdcdc;;
        }

        li.disabled {
            color: #999;
        }

        li.enabled {
            cursor: pointer;
        }

        li.enabled:hover {
            color: #004499;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $("li.enabled").click(function () {
                var cid = $(this).attr("cid");
                top.location.href = CONTROL+"&mid="+{$hd.get.mid}+"&m=add&cid="+cid;
            })
        })
    </script>
</head>
<body>
<div class="s-cat">
    {$category}
</div>
</body>
</html>