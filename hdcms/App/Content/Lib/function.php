<?php
if (!defined("HDPHP_PATH"))
    exit('No direct script access allowed');
//获得栏目url
function get_category_url($field)
{
    if ($field['cattype'] == 3) {
        return $field['redirecturl'];
    } else if ($field['is_cat_html'] == 1) { //静态
        return __ROOT__ . '/' .C("htmldir"). '/'.$field['catdir'] . '/index.html';
    } else { //动态
        return __WEB__ . "?a=Content&c=Content&m=category&cid=" . $field['cid'];
    }
}