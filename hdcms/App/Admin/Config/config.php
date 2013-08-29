<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$config = array(
    "DEBUG_SHOW" => 0,
    "AUTO_LOAD_FILE" => array("functions","html","study","./hdcms/Common/Extend/Lib/functions.php"),
    "PATHINFO_HTML" => "",
    "URL_TYPE" => 2, //普通模式Url
    "RBAC_NO_AUTH" => array(
        "index/index",
        "index/welcome",
        "cache/all"
    ),
    "RBAC_TYPE" => 1,
);
return array_merge(include "./data/config/core.inc.php", $config);
?>