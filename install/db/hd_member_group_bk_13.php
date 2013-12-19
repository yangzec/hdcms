<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."member_group (`gid`,`is_system`,`point`,`allowpost`,`allowpostverify`,`allowsendmessage`,`description`,`gname`) VALUES('2','1','100','1','1','1','新手上路','新手上路')");
$db->exe("REPLACE INTO ".$db_prefix."member_group (`gid`,`is_system`,`point`,`allowpost`,`allowpostverify`,`allowsendmessage`,`description`,`gname`) VALUES('3','1','200','1','0','0','中级会员 	','中级会员 	')");
$db->exe("REPLACE INTO ".$db_prefix."member_group (`gid`,`is_system`,`point`,`allowpost`,`allowpostverify`,`allowsendmessage`,`description`,`gname`) VALUES('4','1','300','1','0','0','高级会员','高级会员')");
$db->exe("REPLACE INTO ".$db_prefix."member_group (`gid`,`is_system`,`point`,`allowpost`,`allowpostverify`,`allowsendmessage`,`description`,`gname`) VALUES('5','1','500','1','1','1','','钻石会员')");
