<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$config = array(
    "DEBUG_SHOW" => 1,
    "AUTO_LOAD_FILE" => "functions,html",
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