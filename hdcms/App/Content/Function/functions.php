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

//获得内容页模板
function get_content_tpl($aid)
{
    $db = K("ContentView");
    $content = $db->join("category")->find($aid);
    $tpl = empty($content['template']) ? $content['arc_tpl'] : $content['template'];
    return str_replace('{style}', './template/' . C("WEB_STYLE"), $tpl);
}