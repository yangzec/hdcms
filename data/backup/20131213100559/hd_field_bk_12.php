<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`show_type`,`table_type`,`table_name`,`field_name`,`title`,`enable`,`is_system`,`fieldsort`,`member_show`,`set`) VALUES('1','3','input','2','a_data','name','name','1','0','0','1','array (
  \'message\' => \'\',
  \'size\' => \'300\',
  \'default\' => \'\',
  \'ispasswd\' => \'0\',
  \'css\' => \'css\',
  \'validation\' => \'/^\\\\d+$/\',
  \'required\' => \'1\',
  \'error\' => \'错误提示\',
  \'width\' => \'\',
  \'height\' => \'\',
  \'options\' => \'\',
)')");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`show_type`,`table_type`,`table_name`,`field_name`,`title`,`enable`,`is_system`,`fieldsort`,`member_show`,`set`) VALUES('2','3','images','2','a_data','sdffds','pic','1','0','0','1','array (
  \'message\' => \'\',
  \'input_width\' => \'100\',
  \'width\' => \'260\',
  \'height\' => \'260\',
  \'num\' => \'10\',
  \'ispasswd\' => \'1\',
  \'error\' => \'\',
  \'css\' => \'\',
  \'validation\' => \'false\',
  \'default\' => \'\',
  \'required\' => \'\',
  \'options\' => \'\',
)')");
