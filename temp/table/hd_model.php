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
  'app_name' => 
  array (
    'field' => 'app_name',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'type' => 
  array (
    'field' => 'type',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'is_submit' => 
  array (
    'field' => 'is_submit',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'm_order' => 
  array (
    'field' => 'm_order',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'is_system' => 
  array (
    'field' => 'is_system',
    'type' => 'tinyint(1) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>