<?php if(!defined('HDPHP_PATH'))exit;
return array (
  0 => 
  array (
    'cid' => '1',
    'pid' => '0',
    'catname' => '新闻',
    'html_dir' => 'news',
    'keyworks' => '栏目关键字',
    'description' => '',
    'list_tpl' => '{style}/news_list.html',
    'arc_tpl' => '{style}/news_article.html',
    'is_cat_html' => '1',
    'is_arc_html' => '1',
    'list_html_url' => '{catdir}/list_{cid}_{page}.html',
    'arc_html_url' => '{catdir}/{y}/{m}{d}/{aid}.html',
    'mid' => '1',
    'cattype' => '1',
    'urltype' => '1',
    'redirecturl' => '',
    'model_name' => '普通文章',
    'tablename' => 'article',
    'enable' => '1',
    'control' => 'Article',
    'type' => '1',
    'level' => 1,
    'html' => '',
  ),
);
?>