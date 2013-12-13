<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'id' => 
  array (
    'field' => 'id',
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
  'type' => 
  array (
    'field' => 'type',
    'type' => 'enum(\'站点配置\',\'高级设置\',\'上传配置\',\'会员设置\',\'邮箱配置\',\'安全设置\',\'水印设置\',\'内容相关\')',
    'null' => 'NO',
    'key' => false,
    'default' => '站点配置',
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'show_type' => 
  array (
    'field' => 'show_type',
    'type' => 'enum(\'文本\',\'数字\',\'布尔(1/0)\',\'多行文本\')',
    'null' => 'YES',
    'key' => false,
    'default' => '文本',
    'extra' => '',
  ),
);
?>