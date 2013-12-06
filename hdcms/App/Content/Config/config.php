<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array_merge(
    require "./data/config/core.inc.php",
    array(
        "TPL_FIX" => ".php",
        //标签
        "TPL_TAGS" => array("Content"),
        "auto_load_file" => array(GROUP_PATH."/App/Content/Lib/function")
    )
);

?>