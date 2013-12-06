<?php if (!defined("HDPHP_PATH")) exit;
return array_merge(
    require "./data/config/config.inc.php", //基本
    require "./data/config/db.inc.php",//数据库
    array(
        "DEBUG_SHOW" => 0,
        "SESSION_ENGINE"=>"mysql",
        "WEB_MASTER"=>"admin",//站长名
        "PATHINFO_HTML" => "",
        "URL_TYPE" => 2,
        "TPL_ERROR" =>"./data/template/error.html", //错误页面
        "TPL_SUCCESS" => "./data/template/success.html", //正确页面
        "TPL_FIX" => ".php"
    )
);