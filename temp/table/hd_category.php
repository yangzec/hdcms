<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'catname' => 
  array (
    'field' => 'catname',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'catdir' => 
  array (
    'field' => 'catdir',
    'type' => 'varchar(100)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'keyworks' => 
  array (
    'field' => 'keyworks',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'description' => 
  array (
    'field' => 'description',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'index_tpl' => 
  array (
    'field' => 'index_tpl',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'list_tpl' => 
  array (
    'field' => 'list_tpl',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'arc_tpl' => 
  array (
    'field' => 'arc_tpl',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'is_cat_html' => 
  array (
    'field' => 'is_cat_html',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'is_arc_html' => 
  array (
    'field' => 'is_arc_html',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'list_html_url' => 
  array (
    'field' => 'list_html_url',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'arc_html_url' => 
  array (
    'field' => 'arc_html_url',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'mid' => 
  array (
    'field' => 'mid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cattype' => 
  array (
    'field' => 'cattype',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'urltype' => 
  array (
    'field' => 'urltype',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'cat_redirecturl' => 
  array (
    'field' => 'cat_redirecturl',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'catorder' => 
  array (
    'field' => 'catorder',
    'type' => 'smallint(5) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'cat_show' => 
  array (
    'field' => 'cat_show',
    'type' => 'tinyint(1)',
    'null' => 'YES',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'path' => 
  array (
    'field' => 'path',
    'type' => 'char(100)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>