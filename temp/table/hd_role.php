<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'rid' => 
  array (
    'field' => 'rid',
    'type' => 'smallint(5)',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'rname' => 
  array (
    'field' => 'rname',
    'type' => 'char(60)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'smallint(5)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'creditslower' => 
  array (
    'field' => 'creditslower',
    'type' => 'int(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'is_admin' => 
  array (
    'field' => 'is_admin',
    'type' => 'tinyint(1)',
    'null' => 'YES',
    'key' => false,
    'default' => '2',
    'extra' => '',
  ),
);
?>