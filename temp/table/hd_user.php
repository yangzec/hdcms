<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'uid' => 
  array (
    'field' => 'uid',
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
  'password' => 
  array (
    'field' => 'password',
    'type' => 'char(40)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'email' => 
  array (
    'field' => 'email',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'logintime' => 
  array (
    'field' => 'logintime',
    'type' => 'int(10) unsigned',
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
  'realname' => 
  array (
    'field' => 'realname',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'status' => 
  array (
    'field' => 'status',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'qq' => 
  array (
    'field' => 'qq',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'sex' => 
  array (
    'field' => 'sex',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'favicon' => 
  array (
    'field' => 'favicon',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'credits' => 
  array (
    'field' => 'credits',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'rid' => 
  array (
    'field' => 'rid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'gid' => 
  array (
    'field' => 'gid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>