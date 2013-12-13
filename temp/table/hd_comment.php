<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'comment_id' => 
  array (
    'field' => 'comment_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'aid' => 
  array (
    'field' => 'aid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'comment' => 
  array (
    'field' => 'comment',
    'type' => 'text',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'uid' => 
  array (
    'field' => 'uid',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
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
  'c_status' => 
  array (
    'field' => 'c_status',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'addtime' => 
  array (
    'field' => 'addtime',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'path' => 
  array (
    'field' => 'path',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
);
?>