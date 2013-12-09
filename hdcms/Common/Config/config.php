<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array_merge(
    require "./data/config/core.inc.php",
    array(
        //默认应用
        "DEFAULT_APP" => "Content",
        //模板后缀
        "TPL_FIX" => ".php",
        //公共函数库
        "auto_load" => array(COMMON_LIB_PATH . 'function/functions.php'),
    )
);
?>