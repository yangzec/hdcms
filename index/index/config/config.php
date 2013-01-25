<?php
if (!defined("PATH_HD")) exit('No direct script access allowed');
/**
 * Copyright    [HDPHP框架] (C)2011-2012 houdunwang.com ,Inc.
 * Licensed     www.apache.org/licenses/LICENSE-2.0
 * Encoding     UTF-8
 * Version      $Id: config.php   2012-6-15
 * @author      向军  houdunwangxj@gmail.com
 * Link         www.hdphp.com
 */
//基本配置文件
return array(
//基本参数
    "CHARSET" => "utf8", //字符集设置
    "DEFAULT_TIME_ZONE" => "PRC", //默认时区
    "HTML_PATH" => "h", //静态HTML保存目录
    "DEBUG" => 1, //开启调试模式
    "DEBUG_AJAX" => 0, //AJAX异步时关闭调试信息显示   1 为显示调试信息  0 关闭调试信息
    "ALWAYS_COMPILE_TPL" => 0, //开启调试模式时，无论模板有无修改，每次都编译模板文件，需要将配置DEBUG设置为1
    "SESSION_AUTO" => 1, //自动开启SESSION
    "LANGUAGE"=>"",//语言包
    "AUTH_KEY"=>"houdunwang.com",//验证key与验证函数配合使用
    "CHECK_FILE_CASE"=>0,//windows环境下文件名区分大小写
    "ERROR_404"=>__HDPHP_TPL__.'/404.html',//404跳转的URL地址  此处必须为url地址如 http://localhost/404.html 不能为 d:/www/404.html
//数据库
    "DB_DRIVER" => "mysqli", //数据库驱动
    "DB_HOST" => "127.0.0.1", //数据库连接主机  如localhost
    "DB_PORT" => 3306, //数据库连接端口
    "DB_USER" => "root", //数据库用户名
    "DB_PASSWORD" => "", //数据库密码
    "DB_DATABASE" => "", //数据库名称
    "DB_PREFIX" => "", //表前缀
    "DB_BACKUP"=>PATH_ROOT."/backup",//数据库备份目录
//系统调试
    "ERROR_MESSAGE" => "出错了", //关闭DEBUG时显示的错误内容
    "DEBUG_MENU"=>1,//显示debug菜单
    "SHOW_NOTICE" => 1, //提示性错误显示
    "SHOW_SYSTEM" => 1, //显示系统信息
    "SHOW_INCLUDE" => 1, //显示加载文件信息
    "SHOW_SQL" => 1, //显示执行的SQL语句
    "SHOW_TPL_COMPILE" => 1, //显示模板编译文件
    "ERROR_TPL"=>PATH_HD_TPL . '/hd_error.html',//显示错误信息模板文件,注意如果模板文件不存在将看不到错误，不能使用应用常量如PATH_TPL可以使用PATH_APP
//日志处理
    "LOG_SAVE" => 1, //错误写入日志文件中
    "LOG_KEY" => "houdunwang.com", //日志文件保密密匙串
    "LOG_SIZE" => 2000000, //日志文件大小
    "LOG_TYPE" => array("error", "notice", "sql"), //保存日志类型
//SESSION
    "SESSION_NAME" => "hdsid", //储存SESSION_ID的COOKIE名
    "SESSION_ENGINE" => "file", //file文件 mysql数据库处理 memcache为memcache缓存处理
    "SESSION_LIFTTIME" => 2440, //在线保持时间(秒)SESSION过期时间
    "SESSION_TABLE_NAME" => "session", //储存SESSION的数据表名，不要写前缀系统会自动添加
    "SESSION_GC_DIVISOR" => 10, //清理过期用户频率，数字越小清理越频繁根据网站并发自行设置
//URL设置
    "URL_REWRITE" => 0, //url重写模式 使用方式请参考HDPHP手册   如果设置错误 网站将无法访问
    "URL_TYPE" => 1, /*
      1 pathinfo模式 :  index.php/index/index
      2 普通模式：例: index.php?m=index&a=index
     */
    "PATHINFO_Dli" => "/", //PATHINFO分隔符
    "PATHINFO_VAR" => "q", //兼容模式分隔符
    "PATHINFO_HTML" => ".html", //伪静态扩展名
//url变量
    "VAR_APP" => "a", //应用变量名，只有以应用组形式访问才有效
    "VAR_CONTROL" => "c", //默认模块名
    "VAR_METHOD" => "m", //动作名
//项目参数
    "DEFAULT_NAME" => "@", //应用名称
    "DEFAULT_APP" => "index", //默认项目应用，只有以应用组形式访问才有效
    "DEFAULT_CONTROL" => "Index", //默认控制器
    "DEFAULT_METHOD" => "index", //默认动作名
    "CONTROL_FIX" => "Control", //控制器文件后缀
    "MODEL_FIX" => "Model", //模型文件名后缀
    "FILTER_FUNCTION"=>"htmlspecialchars",//过滤函数使用$this->_get("hdphp")或$this->_post("hdphp")等时使用;
//URL路由设置
    "route" => array(),
//缓存控制
    "CACHE_TYPE" => "file", //缓存类型，可选择类型有：file:文件缓存 memcache: memcache缓存
    "CACHE_HOST"=>array("127.0.0.1:11211"),//MEMCACHE缓存设置 localhost主机  11211为端口
    "CACHE_TIME" => 1800, //全局默认缓存时间 如果缓存时没有指定时间将以此为准,单位秒,0为永久缓存
    "CACHE_ZIP"=>true,//缓存数据是否压缩  true压缩  false不压缩
    "CACHE_SELECT_TIME" => 0, //SQL SELECT查询缓存时间 0为永久缓存 SELECT中的字段按需取不要取无用字段
    "CACHE_SELECT_LENGTH"=>30,//SELECT结果数量超过这个值不进行缓存
    "CACHE_TPL_TIME" => 0, //模板缓存时间   0为永久缓存
//文件上传
    "UPLOAD_THUMB_ON" => 0, //上传的图片是进行缩略图处理       1进行   0不进行
    "UPLOAD_EXT_SIZE" => array("jpg" => 200000, "jpeg" => 200000, "gif" => 200000,
        "png" => 200000, "bmg" => 200000, "zip" => 300000,
        "txt" => 300000, "rar" => 300000, "doc" => 300000), //上传类型与大小
    "UPLOAD_PATH" => PATH_ROOT . "/upload", //上传路径
    "UPLOAD_IMG_DIR" => "img", //图片上传目录名 系统会以UPLOAD_PATH项的子目录形式创建
    "UPLOAD_IMG_RESIZE_ON" => 1, /* 上传图片缩放处理，设置0或false为关闭缩放处理
      如果上传图片宽度或高度超过以下参数值系统进行缩放 */
    "UPLOAD_IMG_MAX_WIDTH" => 2000000, //上传图片超过这个宽度值，系统进行缩放处理 单位像素
    "UPLOAD_IMG_MAX_HEIGHT" => 2000000, //上传图片超过这个高度值，系统进行缩放处理 单位像素
//图像水印处理
    "WATER_ON" => 1, //水印开关
    "WATER_FONT" => PATH_HD . "/data/font/font.ttf", //水印字体
    "WATER_IMG" => PATH_HD . "/data/water/water.png", //水印图像
    "WATER_POS" => 9, //水印位置
    "WATER_PCT" => 60, //水印透明度
    "WATER_QUALITY" => 80, //水印压缩质量
    "WATER_TEXT" => "WWW.HOUDUNWANG.COM", //水印文字
    "WATER_TEXT_COLOR" => "#f00f00", //水印文字颜色
    "WATER_TEXT_SIZE" => 12, //水印文字大小
//图片缩略图
    "THUMB_PREFIX" => "", //缩略图前缀
    "THUMB_ENDFIX" => "_thumb", //缩略图后缀
    "THUMB_TYPE" => 6, //生成缩略图方式,
    //1:固定宽度  高度自增      2:固定高度  宽度自增    3:固定宽度  高度裁切
    //4:固定高度  宽度裁切      5:缩放最大边 原图不裁切  6:缩略图尺寸不变，自动裁切图片
    "THUMB_WIDTH" => 300, //缩略图宽度
    "THUMB_HEIGHT" => 300, //缩略图高度
    "THUMB_PATH" => "", //缩略图路径
//验证码
    "CODE_FONT" => PATH_HD . "/data/font/font.ttf", //验证码字体
    "CODE_STR" => "1234567890abcdefghijklmnopqrstuvwsyz", //验证码种子
    "CODE_WIDTH" => 100, //验证码宽度
    "CODE_HEIGHT" => 30, //验证码高度
    "CODE_BG_COLOR" => "#CCE8CF", //验证码背景颜色
    "CODE_LEN" => 4, //长度
    "CODE_FONT_SIZE" => 16, //字体大小
    "CODE_FONT_COLOR" => "", //字体颜色
//分页处理
    "PAGE_VAR" => "page", //分页GET变量
    "PAGE_ROW" => 10, //显示页码数量
    "ARC_ROW" => 10, //每页显示条数
    "PAGE_STYLE" => 2, //页码显示风格
    "PAGE_DESC" => array("pre" => "上一页", "next" => "下一页",
        "first" => "首页", "end" => "尾页", "unit" => "条"), //分页文字设置
//模板参数
    "TPL_ENGINE" => "hd", //模板引擎  支持smarty模版引擎与HD后盾模版引擎  建议使用HD模版引擎 效率及扩展性更高
    "TPL_FIX" => ".html", //模版文件扩展名
    "TPL_TAG_LEFT" => "<", //模板左标签
    "TPL_TAG_RIGHT" => ">", //模板右标签
    "TPL_DIR" => "tpl", //模板文件的目录名
    "TPL_TAGS" => "", //扩展标签库用,分隔  当前模块的标签库可以不用写 系统会自动加载
    "TPL_STYLE" => "", //如果有多风格模版时，这里添上目录名  那么路径结果就会变成 TPL_PATH/TPL_STYLE形式
    "TPL_COMPILE" => true, //开启模板编译
    "TPL_ERROR" => "", //错误的模板页面
    "TPL_SUCCESS" => "", //正确的模板页面
//购物车参数
    "CART_NAME" => "cart", //储存在$_SESSION中的购物车名称
//文本编辑器
    "EDITOR_TYPE" => 2, //复文本编辑器  1 baidu  2 kindeditor
    "EDITOR_STYLE" => 1, //1 完全模式(全部工具条)  2 精简模式 默认为1
    "EDITOR_MAX_STR" => 2000, //编辑器允许输入最大字数
    "EDITOR_WIDTH" => "100%", //编辑器高度
    "EDITOR_HEIGHT" => 300, //编辑器高度
    "EDITOR_FILE_SIZE" => 2000000, //上传图片文件大小   单位是字节
//RBAC基于角色的权限控制参数|注意：所有数据表不要写表前缀
    "RBAC_TYPE" => 1, //1时时认证｜2登录认证
    "RBAC_SUPER_ADMIN" => "super_admin", //超级管理员  认证SESSION键名
    "RBAC_USERNAME_FIELD" => "username", //用户表中的用户名字段名称
    "RBAC_PASSWORD_FIELD" => "password", //用户表中的密码字段名称
    "RBAC_AUTH_KEY" => "user", //用户登录后在SESSION中储存的用户ID
    "RBAC_NO_AUTH" => array(), //不需要验证的控制器或方法如：array(index/index)表示index控制器的index方法不需要验证
    "RBAC_USER_TABLE" => "user", //储存用户信息的mysql表
    "RBAC_ROLE_TABLE" => "role", //储存角色信息的mysql表
    "RBAC_NODE_TABLE" => "node", //储存节点信息的mysql表
    "RBAC_ROLE_USER_TABLE" => "user_role", //角色与用户中间关联表
    "ACCESS_TABLE" => "access", //权限分配表
//邮箱配置
    "EMAIL_USERNAME" => "", //发送邮件邮箱用户名
    "EMAIL_PASSWORD" => "", //发送邮件邮箱密码
    "EMAIL_HOST" => "", //邮箱服务器smtp地址如smtp.gmail.com或smtp.126.com  建议使用126服务器
    "EMAIL_PORT" => 25, //邮箱服务器smtp端口，126等25，gmail 465
    "EMAIL_SSL"=>false,//服务器是否采用SSL   126等值为false   google必须为true
    "EMAIL_CHARSET" => "", //字符集设置，中文乱码就是这个没有设置好 如utf8
    "EMAIL_FORMMAIL" => "", //发送人发件箱显示的邮箱址址
    "EMAIL_FROMNAME" => "后盾网", //发送人发件箱显示的用户名
);
?>