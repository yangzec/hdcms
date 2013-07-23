<?php if (!defined("HDPHP_PATH"))exit;
return array_merge(
	require "./data/config/db.inc.php",//数据库
	require "./data/config/base.inc.php",//基本
	require "./data/config/water.inc.php",//水印
	require "./data/config/code.inc.php"//水印
	);
?>