<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if (!defined("HDPHP_PATH")) exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo C("webname");?> 会员中心</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Account&m=edit';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Account';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Account&m=edit';
		GROUP = 'http://localhost/hdcms/hdcms';
		TPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Account';
		STATIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Static';
		PUBLIC = 'http://localhost/hdcms/hdcms/App/Member/Tpl/Public';
		COMMON = 'http://localhost/hdcms/Common';
</script>
    <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/App/Member/Tpl/Account/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hdcms/App/Member/Tpl/Account/css/css.css"/>
</head>
<body>
<div class="topbar">
    <div class="container">
        <div class="user_info">
            <span><?php echo $_SESSION['username'];?> | <?php echo $_SESSION['rname'];?></span>
            <a href="<?php echo U('Login/out');?>" target="_top">退出</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="menu">
        <!--        <a class="top_menu " href="<?php echo U('Home/index');?>">家园</a>-->
        <a class="top_menu " href="<?php echo U('Content/index');?>">文章</a>
        <!--        <a class="top_menu " href="<?php echo U('Space/index');?>">空间</a>-->
        <a class="top_menu action" href="<?php echo U('Account/edit');?>">帐号</a>
    </div>
    <div class="content">
        <div class="grid">
            <div class="profile">
                <a href="<?php echo U('Account/edit',array('action'=>1));?>">
                    <img id="favicon" src="<?php echo $_SESSION['favicon'];?>"/>
                </a>
            </div>
            <ul class="list">
                <li class="list-item">
                    <a href="javascript:;" <?php if($_GET['action']==0){?>class="action"<?php }?>>基本资料</a>
                </li>
                <li class="list-item">
                    <a href="javascript:;" <?php if($_GET['action']==1){?>class="action"<?php }?>>修改头像</a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div id="con">
                <form action="<?php echo U('edit');?>" method="post" enctype="multipart/form-data">
                    <div class="tab">
                        <ul class="tab_menu">
                            <li lab="base">
                                <a href="#">基本资料</a>
                            </li>
                            <li lab="Avatar">
                                <a href="#">修改头像</a>
                            </li>
                        </ul>
                        <div class="tab_content">
                            <div id="base">
                                <table class="table1">
                                    <tr>
                                        <th class="w100">用户名</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled"
                                                   value="<?php echo $field['username'];?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>用户组</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled" value="<?php echo $field['rname'];?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>呢称</th>
                                        <td>
                                            <input type="text" class="w200" name="realname" value="<?php echo $field['realname'];?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w100">原登陆密码</th>
                                        <td>
                                            <input type="password" class="w200" name="old_password" value=""/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>新密码</th>
                                        <td>
                                            <input type="password" class="w200" name="password" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>确认新密码</th>
                                        <td>
                                            <input type="password" class="w200" name="c_password" value=""/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>邮箱</th>
                                        <td>
                                            <input type="text" class="w200" name="email" value="<?php echo $field['email'];?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>QQ</th>
                                        <td>
                                            <input type="text" class="w200" name="qq" value="<?php echo $field['qq'];?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>性别</th>
                                        <td>
                                            <label><input type="radio" name="sex" value="1"
                                                <?php if($field['sex']==1){?>checked='checked'<?php }?>
                                                /> 男</label>
                                            <label><input type="radio" name="sex" value="2"
                                                <?php if($field['sex']==2){?>checked='checked'<?php }?>
                                                /> 女</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w50">积分</th>
                                        <td>
                                            <input type="text" class="w200" disabled="disabled"
                                                   value="<?php echo $field['credits'];?>"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div id="Avatar">
                                <table class="table1">
                                    <tr>
                                        <th>选择上传的文件</th>
                                        <td>
                                            <input type="file" name="favicon"/>
                                            大小<?php echo C("FAVICON_WIDTH");?>x<?php echo C("FAVICON_HEIGHT");?>像
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>原来的头像</th>
                                        <td>
                                            <img src="http://localhost/hdcms/<?php echo $field['favicon'];?>" style="width:120px;height: 120px;"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="确定" class="btn1"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>