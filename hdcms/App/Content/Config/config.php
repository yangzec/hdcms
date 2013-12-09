<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
return array_merge(
    array(
        //标签
        "TPL_TAGS" => array("Content"),
        //错误页面
        "TPL_ERROR" => "./data/template/error.html",
        //正确页面
        "TPL_SUCCESS" => "./data/template/success.html",
    )
);

?>