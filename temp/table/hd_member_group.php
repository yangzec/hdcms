<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'gid' => 
  array (
    'field' => 'gid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'is_system' => 
  array (
    'field' => 'is_system',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '2',
    'extra' => '',
  ),
  'point' => 
  array (
    'field' => 'point',
    'type' => 'mediumint(8) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'allowpost' => 
  array (
    'field' => 'allowpost',
    'type' => 'smallint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'allowpostverify' => 
  array (
    'field' => 'allowpostverify',
    'type' => 'smallint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'allowsendmessage' => 
  array (
    'field' => 'allowsendmessage',
    'type' => 'smallint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'description' => 
  array (
    'field' => 'description',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'gname' => 
  array (
    'field' => 'gname',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>