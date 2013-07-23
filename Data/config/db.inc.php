<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
return array(
    "DB_DRIVER"                     => "mysqli",    //数据库驱动
    "DB_HOST"                       => "127.0.0.1", //数据库连接主机  如127.0.0.1
    "DB_PORT"                       => 3306,        //数据库连接端口
    "DB_USER"                       => "root",      //数据库用户名
    "DB_PASSWORD"                   => "",          //数据库密码
    "DB_DATABASE"                   => "hdcms",          //数据库名称
    "DB_PREFIX"                     => "hd_",          //表前缀
);
?>