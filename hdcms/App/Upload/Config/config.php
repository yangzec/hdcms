<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$config = array(
    "TPL_TAGS" => array(),
    "TPL_FIX" => ".php"
);
return array_merge($config,require "./data/config/core.inc.php", $config);
?>