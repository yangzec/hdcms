<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'tid' => 
  array (
    'field' => 'tid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'tag_name' => 
  array (
    'field' => 'tag_name',
    'type' => 'char(60)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'option' => 
  array (
    'field' => 'option',
    'type' => 'mediumtext',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'content' => 
  array (
    'field' => 'content',
    'type' => 'text',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'updatetime' => 
  array (
    'field' => 'updatetime',
    'type' => 'int(10)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>