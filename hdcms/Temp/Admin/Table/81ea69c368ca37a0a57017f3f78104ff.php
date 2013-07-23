<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'fid' => 
  array (
    'field' => 'fid',
    'type' => 'mediumint(8) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'mid' => 
  array (
    'field' => 'mid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => '',
  ),
  'show_type' => 
  array (
    'field' => 'show_type',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'is_main_table' => 
  array (
    'field' => 'is_main_table',
    'type' => 'tinyint(4)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'field_name' => 
  array (
    'field' => 'field_name',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'message' => 
  array (
    'field' => 'message',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'set' => 
  array (
    'field' => 'set',
    'type' => 'text',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'field_type' => 
  array (
    'field' => 'field_type',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'field_size' => 
  array (
    'field' => 'field_size',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'css' => 
  array (
    'field' => 'css',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'required' => 
  array (
    'field' => 'required',
    'type' => 'tinyint(4)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'validation' => 
  array (
    'field' => 'validation',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'error' => 
  array (
    'field' => 'error',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
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
  'is_system' => 
  array (
    'field' => 'is_system',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'fieldsort' => 
  array (
    'field' => 'fieldsort',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>