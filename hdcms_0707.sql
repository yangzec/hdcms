-- MySQL dump 10.13  Distrib 5.6.10, for osx10.7 (x86_64)
--
-- Host: localhost    Database: hdcms
-- ------------------------------------------------------
-- Server version	5.6.10

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hd_access`
--

DROP TABLE IF EXISTS `hd_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_access`
--

LOCK TABLES `hd_access` WRITE;
/*!40000 ALTER TABLE `hd_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_category`
--

DROP TABLE IF EXISTS `hd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `cat_name` char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `html_dir` char(30) NOT NULL DEFAULT '' COMMENT '静态目录',
  `cat_keyworks` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目关键字',
  `cat_description` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `list_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `is_cat_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目生成Html',
  `is_arc_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '内容页生成Html\n\n',
  `list_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_category`
--

LOCK TABLES `hd_category` WRITE;
/*!40000 ALTER TABLE `hd_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_comment`
--

DROP TABLE IF EXISTS `hd_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_comment` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL COMMENT '文章ID',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '7' COMMENT '组id\n1 基本配置\n2 ',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `display` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `content` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_comment`
--

LOCK TABLES `hd_comment` WRITE;
/*!40000 ALTER TABLE `hd_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_news`
--

DROP TABLE IF EXISTS `hd_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_news` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` varchar(100) NOT NULL COMMENT '缩略图',
  `keywords` char(45) NOT NULL COMMENT '关键字',
  `click` mediumint(9) NOT NULL COMMENT '点击次数',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `source` char(30) NOT NULL COMMENT '来源',
  `redirecturl` char(100) NOT NULL COMMENT '转向链接',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `tag` varchar(255) NOT NULL COMMENT 'TAG标签',
  `author` char(45) NOT NULL COMMENT '作者',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `updatetime` int(10) NOT NULL COMMENT '发布时间 ',
  `color` char(7) NOT NULL COMMENT '标题颜色\n',
  `ishtml` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_news`
--

LOCK TABLES `hd_news` WRITE;
/*!40000 ALTER TABLE `hd_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_node`
--

DROP TABLE IF EXISTS `hd_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_node` (
  `nid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1',
  `des` char(255) DEFAULT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '100',
  `pid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `level` (`level`),
  KEY `state` (`state`),
  KEY `pid` (`pid`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_node`
--

LOCK TABLES `hd_node` WRITE;
/*!40000 ALTER TABLE `hd_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_role`
--

DROP TABLE IF EXISTS `hd_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_role`
--

LOCK TABLES `hd_role` WRITE;
/*!40000 ALTER TABLE `hd_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_system`
--

DROP TABLE IF EXISTS `hd_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_system` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `groupid` enum('站点配置','基本设置','上传配置','模板风格','会员设置','邮箱配置','安全设置','其它设置') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `info` varchar(45) NOT NULL DEFAULT '' COMMENT '配置描述',
  `type` enum('string','number','input','textarea','radio','checkbox','select') DEFAULT NULL,
  `param` text,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COMMENT='系统配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_system`
--

LOCK TABLES `hd_system` WRITE;
/*!40000 ALTER TABLE `hd_system` DISABLE KEYS */;
INSERT INTO `hd_system` VALUES (1,'webname','后盾网','站点配置','网站名称','string',''),(2,'icp','京ICP备12048441号-3','站点配置','ICP备案号','string',''),(3,'htmldir','h','站点配置','文档HTML默认保存路径','string',''),(4,'copyright','Copyright © 2012-2013 HDCMS 后盾网 版权所有','站点配置','网站版权信息','string',''),(5,'keywords','php培训,php实训,后盾网','站点配置','网站关键词','string',''),(6,'description','php顶尖培训--后盾网','站点配置','网站描述','string',''),(8,'email','houdunwang@gmail.com','站点配置','管理员邮箱','string',''),(9,'backup_dir','backup','基本设置','数据备份目录','string','\'\''),(10,'site_stat','2','站点配置','网站开关','radio','1:开,2:关'),(13,'editor','ueditor','基本设置','编辑器','radio','1:ueditor,2:keditor'),(14,'db_driver','mysqli','基本设置','数据库驱动','radio','1:mysql,2:mysqli,3:pdo'),(15,'auth_key','houdunwang.com','基本设置','cookie加密KEY','string',NULL),(16,'upload_path','upload','上传配置','上传目录','string',NULL),(17,'upload_img_path','img','上传配置','上传图片目录','string',NULL),(18,'allow_type','jpg,jpeg,png,bmp,gif','上传配置','允许上传文件类型','string',NULL),(19,'allow_size','2','上传配置','允许上传大小(单位MB)','string',NULL),(20,'water_on','1','站点配置','上传文件加水印','radio','1:加水印,2:不加'),(114,'tpl_style','houdunwang','模板风格','模板风格','string',NULL);
/*!40000 ALTER TABLE `hd_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user`
--

DROP TABLE IF EXISTS `hd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user`
--

LOCK TABLES `hd_user` WRITE;
/*!40000 ALTER TABLE `hd_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_role`
--

DROP TABLE IF EXISTS `hd_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_role` (
  `uid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`),
  KEY `nid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_role`
--

LOCK TABLES `hd_user_role` WRITE;
/*!40000 ALTER TABLE `hd_user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-08  5:07:10
