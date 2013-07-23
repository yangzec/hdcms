<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_ERROR",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Admin/Tpl/Static/Css/common.css"/>
    <title></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php/Admin/Model/add_show.html';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php/Admin';
		CONTROL = 'http://localhost/hdcms/index.php/Admin/Model';
		METH = 'http://localhost/hdcms/index.php/Admin/Model/add_show';
		TPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Model';
		STATIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
		TEMPLATE = 'http://localhost/hdcms/Template';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
<script>
    $(function () {
        //表单验证
        $("form").validation({
            //验证规则
            rules: {
                model_name: {
                    message: {default: "模型名称(必须为中文)", empty: "模型名不能为空", "error": "模型名称必须为中文"},
                    rule: {required: true}
                },
                tablename: {
                    message: {default: "模型主表名(不可以输入中文)", empty: "表名不能为空", "error": "表名已经存在"},
                    rule: {regexp: /^[a-z]\w+$/i, ajax: "<?php echo U(check_model);?>"}
                }
            }
        });
        //更改模型类型
        $("input[name='type']").click(function () {
            if ($(this).val() == 1) {
                $("input[name='control']").val("Article<?php echo C("CONTROL_FIX");?>.class.php");
            } else {
                $("input[name='control']").val("ArticleSingle<?php echo C("CONTROL_FIX");?>.class.php");
            }

        })
    })

    //Ajax提交
    $(function () {
        $("formsdf").submit(function () {
            if ($("*[validation='0']", this).length == 0) {
                $.post("<?php echo U('add');?>", $(this).serialize(), function (data) {
                    if (data == 1) {
                        $.dialog({'msg': "新增模型成功", type: "success", timeout: 1, close_handler: function () {
                            location.href = "<?php echo U('index');?>";
                        }});
                    } else {
                        $.dialog({'msg': "模型添加失败", type: "error"});
                    }
                })
            }
            return false;
        })
    })
</script>
</head>
<body>
<div class="right_content">
    <form action="<?php echo U('add');?>" method="post">
        <input type="hidden" name="enable" value="1"/>

        <div class="tab">
            <ul class="tab_menu">
                <li lab="set"><a href="#site">添加模型</a></li>
            </ul>
            <div class="tab_content">
                <div id="set">
                    <table class="table">
                        <tr>
                            <th class="w200">模型名称</th>
                            <td>
                                <input type="text" name="model_name" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>主表名</th>
                            <td>
                                <input type="text" name="tablename" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>类型</th>
                            <td>
                                <input type="radio" name="type" value="1" checked="checked"/> 基本模型
                                <input type="radio" name="type" value="2"/> 独立模型(只有主表)
                            </td>
                        </tr>
                        <tr>
                            <th>模型描述</th>
                            <td>
                                <input type="text" name="description" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>处理程序</th>
                            <td>
                                <input type="text" name="control" value="Article<?php echo C("CONTROL_FIX");?>.class.php"
                                       class="w200"/>
                                <span class="validation">如果自定义了处理程序，具体方法名称参考Article<?php echo C("CONTROL_FIX");?>.class.php文件</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <input type="submit" class="btn" value="添加模型" style="margin-top:20px;"/>
    </form>
</div>
</body>
</html>