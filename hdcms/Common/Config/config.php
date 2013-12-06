<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array_merge(
    require "./data/config/core.inc.php",
    array(
        "VERSION" => "BETA 2013.11",
        "DEFAULT_APP" => "Content",
        "TPL_FIX" => ".php"
    )
);
?>