<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`pid`,`title`,`creditslower`,`is_admin`) VALUES('1','超级管理员','0','超级管理员','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`pid`,`title`,`creditslower`,`is_admin`) VALUES('2','编辑','0','内容编辑','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`pid`,`title`,`creditslower`,`is_admin`) VALUES('3','发布人员','0','发布人员','0','1')");
