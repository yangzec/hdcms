<?php
/**
 * 获得文章url
 * @param $field 文章字段包含主附表与内容
 * @return string url地址
 */
function getArticleUrl($field){
    $aid = $field['aid'];
    $cid = $field['cid'];
    $mid = $field['mid'];
    return __WEB__."?c=index&m=article&aid=$aid&cid=$cid&mid=$mid";
}