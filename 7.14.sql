/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50610
 Source Host           : localhost
 Source Database       : hdcms

 Target Server Type    : MySQL
 Target Server Version : 50610
 File Encoding         : utf-8

 Date: 07/14/2013 03:52:22 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `hd_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_access`;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_category`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category`;
CREATE TABLE `hd_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
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
  `mid` smallint(6) NOT NULL COMMENT '模型ID',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `hd_category`
-- ----------------------------
BEGIN;
INSERT INTO `hd_category` VALUES ('16', '0', 'sdfsdf', 'sdfsdf', 'sdf', 'sdfsdf', '{style}/news_list.html', '{style}/news_article.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{Y}/{M}{D}/{aid}.html', '35');
COMMIT;

-- ----------------------------
--  Table structure for `hd_comment`
-- ----------------------------
DROP TABLE IF EXISTS `hd_comment`;
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

-- ----------------------------
--  Table structure for `hd_model`
-- ----------------------------
DROP TABLE IF EXISTS `hd_model`;
CREATE TABLE `hd_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `tablename` char(20) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(45) NOT NULL DEFAULT '' COMMENT '模型描述',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '文章模型', 'news', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `hd_model_field`
-- ----------------------------
DROP TABLE IF EXISTS `hd_model_field`;
CREATE TABLE `hd_model_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL COMMENT '模型ID',
  `show_type` varchar(45) NOT NULL COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `field_name` varchar(45) NOT NULL COMMENT '字段name名称',
  `title` varchar(45) NOT NULL COMMENT '字段标题 ',
  `message` varchar(255) NOT NULL COMMENT '字段提示',
  `css` varchar(45) NOT NULL COMMENT 'css样式',
  `is_main_table` tinyint(4) NOT NULL COMMENT '是否为主表',
  `validation` varchar(45) NOT NULL COMMENT '验证规则，只能是正则',
  `error` varchar(45) NOT NULL COMMENT '验证失败提示信息',
  `set` text NOT NULL COMMENT '字段设置',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开启',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `field_type` char(20) NOT NULL COMMENT '表字段类型',
  `field_size` smallint(6) NOT NULL COMMENT '表字段大小',
  PRIMARY KEY (`fid`,`mid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Table structure for `hd_news`
-- ----------------------------
DROP TABLE IF EXISTS `hd_news`;
CREATE TABLE `hd_news` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` char(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `keywords` char(45) NOT NULL DEFAULT '' COMMENT '关键字',
  `click` mediumint(9) NOT NULL DEFAULT '100' COMMENT '点击次数',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `source` char(30) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` char(100) NOT NULL DEFAULT '' COMMENT '转向链接',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `author` char(45) NOT NULL COMMENT '作者',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `updatetime` int(10) NOT NULL COMMENT '发布时间 ',
  `color` char(7) NOT NULL COMMENT '标题颜色\n',
  `ishtml` tinyint(1) NOT NULL DEFAULT '1',
  `username` char(20) NOT NULL,
  `cid` smallint(5) unsigned NOT NULL COMMENT '栏目cid',
  PRIMARY KEY (`nid`),
  KEY `fk_hd_news_hd_category1_idx` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
--  Table structure for `hd_news_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_news_data`;
CREATE TABLE `hd_news_data` (
  `nd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL COMMENT '栏目ID',
  `nid` int(10) unsigned NOT NULL COMMENT '文章主表ID',
  `text` text COMMENT '正文',
  PRIMARY KEY (`nd_id`),
  KEY `fk_hd_news_data_hd_category1_idx` (`cid`),
  KEY `fk_hd_news_data_hd_news1_idx` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章数据表';

-- ----------------------------
--  Table structure for `hd_node`
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
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

-- ----------------------------
--  Table structure for `hd_role`
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_system`
-- ----------------------------
DROP TABLE IF EXISTS `hd_system`;
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

-- ----------------------------
--  Records of `hd_system`
-- ----------------------------
BEGIN;
INSERT INTO `hd_system` VALUES ('1', 'webname', '后盾网77788787', '站点配置', '网站名称', 'string', ''), ('2', 'icp', '京ICP备12048441号-3', '站点配置', 'ICP备案号', 'string', ''), ('3', 'htmldir', 'h', '站点配置', '文档HTML默认保存路径', 'string', ''), ('4', 'copyright', 'Copyright © 2012-2013 HDCMS 后盾网 版权所有', '站点配置', '网站版权信息', 'string', ''), ('5', 'keywords', 'php培训,php实训,后盾网', '站点配置', '网站关键词', 'string', ''), ('6', 'description', 'php顶尖培训--后盾网', '站点配置', '网站描述', 'string', ''), ('8', 'email', 'houdunwang@gmail.com', '站点配置', '管理员邮箱', 'string', ''), ('9', 'backup_dir', 'backup', '基本设置', '数据备份目录', 'string', '\'\''), ('10', 'site_stat', '2', '站点配置', '网站开关', 'radio', '1:开,2:关'), ('13', 'editor', 'ueditor', '基本设置', '编辑器', 'radio', '1:ueditor,2:keditor'), ('14', 'db_driver', 'mysqli', '基本设置', '数据库驱动', 'radio', '1:mysql,2:mysqli,3:pdo'), ('15', 'auth_key', 'houdunwang.com', '基本设置', 'cookie加密KEY', 'string', null), ('16', 'upload_path', 'upload', '上传配置', '上传目录', 'string', null), ('17', 'upload_img_path', 'img', '上传配置', '上传图片目录', 'string', null), ('18', 'allow_type', 'jpg,jpeg,png,bmp,gif', '上传配置', '允许上传文件类型', 'string', null), ('19', 'allow_size', '2', '上传配置', '允许上传大小(单位MB)', 'string', null), ('20', 'water_on', '1', '站点配置', '上传文件加水印', 'radio', '1:加水印,2:不加'), ('114', 'tpl_style', 'default', '模板风格', '模板风格', 'string', null);
COMMIT;

-- ----------------------------
--  Table structure for `hd_upload`
-- ----------------------------
DROP TABLE IF EXISTS `hd_upload`;
CREATE TABLE `hd_upload` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `arcid` int(10) unsigned DEFAULT NULL COMMENT '文章ID',
  `mid` smallint(5) unsigned DEFAULT NULL COMMENT '模型ID',
  `catid` smallint(5) unsigned DEFAULT NULL COMMENT '栏目cid',
  `filename` varchar(45) DEFAULT NULL COMMENT '文件名',
  `path` char(200) DEFAULT NULL COMMENT '文件路径 ',
  `ext` varchar(45) DEFAULT NULL COMMENT '扩展名',
  `isimage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `filesize` mediumint(8) unsigned DEFAULT NULL COMMENT '文件大小',
  `uptime` int(10) DEFAULT NULL COMMENT '上传时间',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
--  Table structure for `hd_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_role`;
CREATE TABLE `hd_user_role` (
  `uid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`),
  KEY `nid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

