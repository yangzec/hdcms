<?php
if (!defined("HDPHP_PATH")) exit;
//获得栏目url
function get_category_url($cid)
{
    $category = F("category", false, CATEGORY_CACHE_PATH);
    $cat = $category[$cid];
}

//获得栏目模板
function get_category_tpl($cid)
{
    $category = F("category", false, CATEGORY_CACHE_PATH);
    return str_replace('{style}', './template/' . C("WEB_STYLE"), $category[$cid]['list_tpl']);
}