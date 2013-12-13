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
  'flagname' => 
  array (
    'field' => 'flagname',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'system' => 
  array (
    'field' => 'system',
    'type' => 'tinyint(1) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>