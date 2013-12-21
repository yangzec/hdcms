<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content_flag (`aid`,`fid`,`cid`) VALUES('2','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_flag (`aid`,`fid`,`cid`) VALUES('1','3','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_flag (`aid`,`fid`,`cid`) VALUES('1','2','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_flag (`aid`,`fid`,`cid`) VALUES('15','4','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_flag (`aid`,`fid`,`cid`) VALUES('14','4','1')");
