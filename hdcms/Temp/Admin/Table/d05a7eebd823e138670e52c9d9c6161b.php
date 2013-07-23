<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'mid' => 
  array (
    'field' => 'mid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'model_name' => 
  array (
    'field' => 'model_name',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'tablename' => 
  array (
    'field' => 'tablename',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'enable' => 
  array (
    'field' => 'enable',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'description' => 
  array (
    'field' => 'description',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'control' => 
  array (
    'field' => 'control',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'type' => 
  array (
    'field' => 'type',
    'type' => 'enum(\'1\',\'2\')',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
);
?>