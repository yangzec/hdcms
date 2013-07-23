<?php
/**
 * HTML函数库
 */
function get_category()
{
    $cat = F("category", false, './data/cache/category');
    $db = M("category");
    $mid = $this->_get("mid");
    if ($mid) {
        $db->where = "mid=$mid";
    }
    $category = Data::channel($db->all(), "cid", 'pid', 0, '', 2, '─');
    $this->assign("category", $category);
}

?>