<?php
/**
 * 前台应用标签库
 * Class IndexTag
 * @author hdxj <houdunwangxj@gmail.com>
 */
class IndexTag
{
    public $tag = array(
        'treeview' => array('block' => 0)
    );

    // treeview js控件
    public function _treeview($attr, $content)
    {
        $path = __ROOT__ . '/hdcms/Static/js/treeview';
        $html = " <link rel='stylesheet' href='{$path}/jquery.treeview.css' />";
        $html .= "<script src='{$path}/lib/jquery.cookie.js' type='text/javascript'></script>";
        $html .= "<script src='{$path}/jquery.treeview.js' type='text/javascript'></script>";
        $html .= "<script src='{$path}/jquery.treeview.edit.js' type='text/javascript'></script>";
        return $html;
    }
}