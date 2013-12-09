<?php
define("DEBUG", true);
//应用组目录
define("GROUP_PATH", './hdcms/');
//缓存目录
define("CACHE_PATH", "./temp/cache/");
//日志
define("LOG_PATH", "./temp/log/");
//模型目录
define("MODEL_PATH", GROUP_PATH . 'Model/');
//标签目录
define("TAG_PATH", GROUP_PATH . 'Tag/');
//配置目录
define("DATA_PATH", 'data/');
//表缓存
define("TABLE_PATH", './temp/table/');
//模板编译缓存
define("COMPILE_PATH", './temp/compile/');
//模型缓存路径
define("MODEL_CACHE_PATH", DATA_PATH . 'model/');
//表字段缓存
//模型缓存路径
define("FIELD_CACHE_PATH", DATA_PATH . 'field/');
//栏目缓存路径
define("CATEGORY_CACHE_PATH", DATA_PATH . 'category/');
//菜单缓存路径
define("NODE_CACHE_PATH", DATA_PATH . 'node/');
###INSTALL_START
if (!file_exists('install/lock.php')) {
    header("Location: install/");
    exit;
}
###INSTALL_END
require "../hdphp/hdphp.php";
