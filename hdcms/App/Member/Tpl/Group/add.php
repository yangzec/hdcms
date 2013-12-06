<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加会员组</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" >会员组列表</a></li>
            <li><a href="javascript:;" class="action">添加会员组</a></li>
        </ul>
    </div>
    <form action="{|U:'add'}" method="post" onsubmit="return false;">
        <table class="table1">
            <tr>
                <th class="w100">会员组名称</th>
                <td>
                    <input type="text" name="gname" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分小于</th>
                <td>
                    <input type="text" name="point" class="w200" value="0"/>
                </td>
            </tr>
            <tr>
                <th class="w100">用户权限</th>
                <td>
                  <ul>
                      <li>
                          <label><input type="checkbox" value="1" name="allowpost" checked="checked"/> 允许投稿 </label>
                      </li>
                      <li>
                          <label><input type="checkbox" value="1" name="allowpostverify"/> 投稿不需审核 </label>
                      </li>
                      <li>
                          <label><input type="checkbox" value="1" name="allowsendmessage" checked="checked"/> 允许发短消息 </label>
                      </li>
                  </ul>
                </td>
            </tr>
            <tr>
                <th class="w100">简洁描述</th>
                <td>
                    <input type="text" name="description" class="w400"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>