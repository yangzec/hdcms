<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'bid' => 
  array (
    'field' => 'bid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'addtime' => 
  array (
    'field' => 'addtime',
    'type' => 'int(10)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'email' => 
  array (
    'field' => 'email',
    'type' => 'char(50)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'content' => 
  array (
    'field' => 'content',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'reply' => 
  array (
    'field' => 'reply',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '感谢您的反馈，你的问题已经处理!',
    'extra' => '',
  ),
  'type' => 
  array (
    'field' => 'type',
    'type' => 'enum(\'BUG反馈\',\'功能建议\')',
    'null' => 'NO',
    'key' => false,
    'default' => 'BUG反馈',
    'extra' => '',
  ),
  'status' => 
  array (
    'field' => 'status',
    'type' => 'enum(\'未审核\',\'处理中\',\'已解决\')',
    'null' => 'NO',
    'key' => false,
    'default' => '未审核',
    'extra' => '',
  ),
);
?>