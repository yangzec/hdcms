<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."model (`mid`,`model_name`,`tablename`,`enable`,`description`,`app_name`,`type`,`is_submit`,`m_order`,`is_system`) VALUES('1','普通文章','content','1','','Content','1','0','0','1')");
