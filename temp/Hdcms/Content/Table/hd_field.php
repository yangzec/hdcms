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
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'show_type' => 
  array (
    'field' => 'show_type',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'table_type' => 
  array (
    'field' => 'table_type',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'table_name' => 
  array (
    'field' => 'table_name',
    'type' => 'varchar(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'field_name' => 
  array (
    'field' => 'field_name',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'varchar(45)',
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
  'member_show' => 
  array (
    'field' => 'member_show',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
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
);
?>