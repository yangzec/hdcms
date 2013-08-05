<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$config = array(
    "DEBUG_SHOW" => 0,
);
$config = array_merge(include "./data/config/core.inc.php", $config);
$config['TPL_DIR'] = './template/' . $config['style'];
return $config;
?>