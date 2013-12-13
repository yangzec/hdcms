<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'sessid' => 
  array (
    'field' => 'sessid',
    'type' => 'char(32)',
    'null' => 'NO',
    'key' => true,
    'default' => '',
    'extra' => '',
  ),
  'data' => 
  array (
    'field' => 'data',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'atime' => 
  array (
    'field' => 'atime',
    'type' => 'int(10)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'ip' => 
  array (
    'field' => 'ip',
    'type' => 'char(15)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
);
?>