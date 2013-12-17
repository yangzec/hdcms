<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
return array_merge(
    array(
        //标签
        "TPL_TAGS" => array('Content.Tag.ContentTag'),
        //自动加载函数库
        "AUTO_LOAD_FILE" => array(GROUP_PATH . 'Hdcms/Content/Lib/functions.php'),
    )
);

?>