<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'aid' => 
  array (
    'field' => 'aid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(60)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'thumb' => 
  array (
    'field' => 'thumb',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'click' => 
  array (
    'field' => 'click',
    'type' => 'mediumint(9)',
    'null' => 'NO',
    'key' => false,
    'default' => '100',
    'extra' => '',
  ),
  'source' => 
  array (
    'field' => 'source',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'redirecturl' => 
  array (
    'field' => 'redirecturl',
    'type' => 'char(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'allowreply' => 
  array (
    'field' => 'allowreply',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'author' => 
  array (
    'field' => 'author',
    'type' => 'char(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'addtime' => 
  array (
    'field' => 'addtime',
    'type' => 'int(10)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'updatetime' => 
  array (
    'field' => 'updatetime',
    'type' => 'int(10)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'color' => 
  array (
    'field' => 'color',
    'type' => 'char(7)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'ishtml' => 
  array (
    'field' => 'ishtml',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>