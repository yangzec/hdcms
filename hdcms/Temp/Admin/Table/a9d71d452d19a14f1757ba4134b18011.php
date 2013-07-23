<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'sid' => 
  array (
    'field' => 'sid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'name' => 
  array (
    'field' => 'name',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'value' => 
  array (
    'field' => 'value',
    'type' => 'text',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'groupid' => 
  array (
    'field' => 'groupid',
    'type' => 'enum(\'站点配置\',\'基本设置\',\'上传配置\',\'模板风格\',\'会员设置\',\'邮箱配置\',\'安全设置\',\'其它设置\')',
    'null' => 'NO',
    'key' => false,
    'default' => '站点配置',
    'extra' => '',
  ),
  'info' => 
  array (
    'field' => 'info',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'type' => 
  array (
    'field' => 'type',
    'type' => 'enum(\'string\',\'number\',\'input\',\'textarea\',\'radio\',\'checkbox\',\'select\')',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'param' => 
  array (
    'field' => 'param',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>