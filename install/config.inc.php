<?php
if (!defined("HDPHP_PATH"))exit("No direct script access allowed");
return array(
    "DB_DRIVER"                     => "mysqli",//数据库驱动
    "DB_HOST"                       => "127.0.0.1",//数据库连接主机
    "DB_PORT"                       => 3306,//数据库连接端口
    "DB_USER"                       => "root",//数据库用户名
    "DB_PASSWORD"                   => "admin888",//数据库密码
    "DB_DATABASE"                   => "a1",//数据库名称
    "DB_PREFIX"                     => "hd_",//表前缀
    "WEB_MASTER"                    => "admin",//站长
    "INSERT_TEST_DATA"              => "1",//安装测试数据
    "VERSION"                       => "HDCMS 简体中文 UTF8 版 2013.11 Beta1",//HDCMS版本
);