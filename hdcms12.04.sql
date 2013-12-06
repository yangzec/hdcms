/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50528
 Source Host           : localhost
 Source Database       : hdcms

 Target Server Type    : MySQL
 Target Server Version : 50528
 File Encoding         : utf-8

 Date: 12/04/2013 04:51:50 AM
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
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_bug`
-- ----------------------------
DROP TABLE IF EXISTS `hd_bug`;
CREATE TABLE `hd_bug` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '' COMMENT '反馈者',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `email` char(50) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL COMMENT '反馈内容',
  `reply` varchar(100) NOT NULL DEFAULT '' COMMENT '回复',
  `type` enum('BUG反馈','功能建议') DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_category`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category`;
CREATE TABLE `hd_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `catname` char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catdir` varchar(100) DEFAULT NULL,
  `keyworks` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目关键字',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `index_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `is_cat_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目生成Html',
  `is_arc_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '内容页生成Html\n\n',
  `list_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
  `mid` smallint(6) NOT NULL COMMENT '模型ID',
  `cattype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 栏目  2 封面 3 外部链接',
  `urltype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 静态访问 2 动态访问',
  `cat_redirecturl` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转url',
  `catorder` smallint(5) unsigned DEFAULT '0' COMMENT '栏目排序',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `hd_category`
-- ----------------------------
BEGIN;
INSERT INTO `hd_category` VALUES ('1', '0', '前端开发', 'qianduankaifa', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '1', '', '0'), ('2', '1', '互联网事', 'hulianwangshi', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '', '0'), ('3', '1', '经验技巧', 'jingyanjiqiao', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '', '0'), ('4', '1', '设计创意', 'shejichuangyi', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '', '0'), ('5', '0', '前端资源', 'qianduanziyuan', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '1', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_category_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category_access`;
CREATE TABLE `hd_category_access` (
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `mid` smallint(1) NOT NULL DEFAULT '0' COMMENT '模型mid',
  `issend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许投稿 1允许 0 不允许',
  `isshow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许访问 1 允许 0 不允许',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_comment`
-- ----------------------------
DROP TABLE IF EXISTS `hd_comment`;
CREATE TABLE `hd_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论mid',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章aid',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id\n1 基本配置\n2 ',
  `comment` text NOT NULL COMMENT '评论内容',
  `uid` int(11) NOT NULL COMMENT '用户名',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `c_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1 显示  0 不显示',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '回复时间',
  `pid` int(11) DEFAULT '0' COMMENT '父级id',
  `path` varchar(255) DEFAULT '',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_comment`
-- ----------------------------
BEGIN;
INSERT INTO `hd_comment` VALUES ('31', '18', '2', '1', '1', '0.0.0.0', '1', '1385948554', '0', '0'), ('32', '18', '2', '23', '1', '0.0.0.0', '1', '1385948558', '0', '0_31'), ('33', '18', '2', '13', '1', '0.0.0.0', '1', '1385948560', '0', '0'), ('34', '18', '2', '34', '1', '0.0.0.0', '1', '1385948564', '0', '0_33'), ('35', '18', '2', '45', '1', '0.0.0.0', '1', '1385948567', '0', '0_33_34'), ('36', '18', '2', '87', '1', '0.0.0.0', '1', '1385948570', '0', '0_33_34_35'), ('37', '18', '2', '12', '1', '0.0.0.0', '1', '1385948692', '0', '0'), ('38', '18', '2', '12', '1', '0.0.0.0', '1', '1385948693', '0', '0'), ('39', '18', '2', '12', '1', '0.0.0.0', '1', '1385948694', '0', '0'), ('40', '18', '2', '23', '1', '0.0.0.0', '1', '1385948707', '0', '0'), ('41', '18', '2', '', '0', '0.0.0.0', '1', '1385949078', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_config`
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `groupid` enum('站点配置','高级设置','上传配置','模板风格','会员设置','邮箱配置','安全设置','其它设置','水印设置','内容相关') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
--  Records of `hd_config`
-- ----------------------------
BEGIN;
INSERT INTO `hd_config` VALUES ('1', 'webname', '后盾网-中国顶尖php培训机构', '站点配置', '网站名称'), ('2', 'icp', '京ICP备12048441号-3', '站点配置', 'ICP备案号'), ('3', 'htmldir', 'html', '站点配置', '静态html目录'), ('4', 'copyright', 'Copyright © 2012-2013 HDCMS 后盾网 版权所有', '站点配置', '网站版权信息'), ('5', 'keywords', 'php培训,php实训,后盾网', '站点配置', '网站关键词'), ('6', 'description', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述'), ('8', 'email', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱'), ('9', 'backup_dir', 'backup', '高级设置', '数据备份目录'), ('10', 'site_stat', '1', '站点配置', '网站开关'), ('13', 'editor', 'ueditor', '高级设置', '编辑器'), ('15', 'auth_key', 'houdunwang.com', '安全设置', 'cookie加密KEY'), ('16', 'upload_path', 'upload', '上传配置', '上传目录'), ('17', 'upload_img_path', 'img', '上传配置', '上传图片目录'), ('18', 'allow_type', 'jpg,jpeg,png,bmp,gif', '上传配置', '允许上传文件类型'), ('19', 'allow_size', '2048000', '上传配置', '允许上传大小'), ('20', 'water_on', '0', '水印设置', '上传文件加水印'), ('114', 'WEB_STYLE', 'default', '模板风格', '模板风格'), ('115', 'member_verify', '0', '会员设置', '会员注册是否需要审核'), ('116', 'reg_show_code', '0', '会员设置', '会员注册是否显示验证码'), ('119', 'reg_email', '1', '会员设置', '注册成功是否发邮件'), ('120', 'reg_interval', '0', '会员设置', '2次注册间隔间间'), ('121', 'member_group', '4', '其它设置', '默认会员组'), ('122', 'ADMIN_LIST_ROW', '15', '高级设置', '后台列表页数据显示行数'), ('123', 'TOKEN_ON', '0', '安全设置', '表单使用令牌验证'), ('124', 'LOG_KEY', 'houdunwang.com', '安全设置', '日志文件加密KEY'), ('125', 'SESSION_NAME', 'hdsid', '安全设置', 'SESSION_NAME值'), ('126', 'SUPER_ADMIN_KEY', 'SUPER_ADMIN', '安全设置', '站长令牌名称'), ('127', 'tel', '010-64825057', '站点配置', '联系电话'), ('128', 'water_text', 'houdunwang.com', '水印设置', '水印文字'), ('129', 'water_text_size', '16', '水印设置', '文字大小'), ('130', 'WATER_IMG', './data/water/water.png', '水印设置', '水印图像'), ('131', 'WATER_PCT', '0', '水印设置', '水印图片透明度'), ('132', 'WATER_QUALITY', '80', '水印设置', '图片压缩比'), ('133', 'WATER_POS', '9', '水印设置', '水印位置'), ('134', 'DEL_CONTENT_MODEL', '2', '高级设置', '文章删除方式'), ('136', 'DOWN_REMOVE_PIC_SIZE', '500', '高级设置', '下载远程资源允许最大值'), ('137', 'COMMENT_STATUS', '1', '会员设置', '评论需要审核'), ('138', 'FAVICON_WIDTH', '180', '会员设置', '会员头像宽度'), ('139', 'FAVICON_HEIGHT', '180', '会员设置', '会员头像高度'), ('140', 'UPLOAD_IMG_MAX_WIDTH', '650', '高级设置', '图片超过这个尺寸进行缩放'), ('141', 'UPLOAD_IMG_MAX_HEIGHT', '650', '高级设置', '图片超过这个尺寸进行缩放'), ('142', 'down_remote_pic', '0', '内容相关', '下载远程图片'), ('143', 'auto_desc', '1', '内容相关', '截取内容为摘要'), ('144', 'auto_thumb', '0', '内容相关', '提取内容图片为缩略图'), ('145', 'THUMB_WIDTH', '300', '内容相关', '缩略图最大尺寸（宽度）'), ('146', 'THUMB_HEIGHT', '300', '内容相关', '缩略图最大尺寸（高度）'), ('147', 'MEMBER_CONTENT_STATUS', '0', '会员设置', '会员发表文章需要审核'), ('148', 'DEFAULT_USER_GROUP', '2', '会员设置', '新注册会员初始组');
COMMIT;

-- ----------------------------
--  Table structure for `hd_content`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content`;
CREATE TABLE `hd_content` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(60) NOT NULL DEFAULT '' COMMENT '标题',
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `thumb` char(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `source` char(30) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` char(100) NOT NULL DEFAULT '' COMMENT '转向链接',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `author` char(45) NOT NULL DEFAULT '' COMMENT '作者',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间 ',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色\n',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板\n',
  `ishtml` tinyint(1) NOT NULL DEFAULT '1',
  `username` char(20) NOT NULL DEFAULT '',
  `arc_sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 正常  2 回收站',
  `cid` smallint(6) NOT NULL DEFAULT '0',
  `url` char(100) NOT NULL COMMENT 'url地址',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_content`
-- ----------------------------
BEGIN;
INSERT INTO `hd_content` VALUES ('35', 'dsfdfsdf', '0', '', '100', '后盾网-中国顶尖php培训机构', '', '1', '', '1385924531', '1385924527', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/35.html'), ('18', '苹果、谷歌和亚马逊等公司的14个怪异面试题', '0', 'upload/Content/2013/11/29/89241385687620.jpg', '100', '', '', '1', '', '2147483647', '1385687578', '', '', '1', 'admin', '0', '0', '2', 'html/hulianwangshi/1970/11/18.html'), ('45', 'sdfdsf', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385943053', '1385943053', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/45.html'), ('43', '1223333333333333', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385942820', '1385942820', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/43.html'), ('44', '99999', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385942875', '1385942875', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/44.html'), ('21', 'Chrome浏览器迎来发布五周年', '0', 'upload/Content/2013/11/29/36741385687740.jpg', '100', '', '', '1', '', '0', '1385687721', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/1970/11/21.html'), ('22', ' 微软发布Windows 8.1开发者指南', '0', 'upload/Content/2013/11/29/21471385687761.jpg', '100', '', '', '1', '', '0', '1385687752', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/1970/11/22.html'), ('23', 'sdf', '0', '', '100', '', '', '1', '', '0', '1385959835', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/1970/11/23.html'), ('24', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '3', 'html/jingyanjiqiao/1970/11/24.html'), ('25', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '3', 'html/jingyanjiqiao/1970/11/25.html'), ('26', 'sdfsdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '3', 'html/jingyanjiqiao/1970/11/26.html'), ('27', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '2', 'html/hulianwangshi/1970/11/27.html'), ('28', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '3', 'html/jingyanjiqiao/1970/11/28.html'), ('29', 'dsf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '2', 'html/hulianwangshi/1970/11/29.html'), ('30', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '2', 'html/hulianwangshi/1970/11/30.html'), ('31', 'sdf', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '2', 'html/hulianwangshi/1970/11/31.html'), ('32', '1212', '0', '', '0', '', '', '1', '', '0', '0', '', '', '1', '', '0', '1', '2', 'html/hulianwangshi/1970/11/32.html'), ('33', 'sdf', '0', '', '100', '', '', '1', '', '0', '1385924195', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/1970/11/33.html'), ('34', 'dsf', '0', '', '100', '', '', '1', '', '0', '1385924302', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/1970/11/34.html'), ('36', '121', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385924547', '0', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/36.html'), ('37', '9999', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385924557', '0', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/37.html'), ('38', 'sdf', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385924656', '0', '', '', '1', 'admin', '0', '1', '3', 'html/jingyanjiqiao/2013/122/38.html'), ('39', '12122666', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385924672', '0', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/39.html'), ('41', 'dfdsfsdf', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385928234', '1385928234', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/41.html'), ('42', 'dsdsf', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385942800', '1385942800', '', '', '1', 'admin', '0', '1', '2', 'html/hulianwangshi/2013/122/42.html'), ('46', 'ddddd', '0', '', '0', '后盾网-中国顶尖php培训机构', '', '1', '', '1385943109', '1385943109', '', '', '1', 'admin', '0', '0', '2', 'html/hulianwangshi/2013/122/46.html');
COMMIT;

-- ----------------------------
--  Table structure for `hd_content_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `keywords` char(45) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text COMMENT '正文',
  `title1` char(255) NOT NULL DEFAULT '',
  `title1sdf` char(255) NOT NULL DEFAULT '',
  `nametc` varchar(255) NOT NULL DEFAULT '',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_content_data`
-- ----------------------------
BEGIN;
INSERT INTO `hd_content_data` VALUES ('18', '大多数,人的,一生,都会,好几,甚至,更多,工作,每次', '大多数人的一生都会换好几份甚至更多份工作，但每次换工作都是希望能有一个好的起点和薪酬，但能提供这样条件的大都是大公司，而这些大公司一般来说在面试中都会问一两个比较奇怪的问题，如果你之前表现还算可以，这个时候再抓住所提的怪异问题，或许就能够打动面试官。那如何做好“战前”准备？那就要不打无准备之仗，就要事前看一些怪异的开放式面试题，而今天国外媒体BusinessInsider也正好发表了相关的文章——', '<p style=\"text-align:center;\"><a href=\"http://localhost/hdcms/http://localhost/hdcms/upload/Content/2013/11/29/60911385687621.jpg\" target=\"_blank\"><img src=\"http://localhost/hdcms/http://localhost/hdcms/upload/Content/2013/11/29/60911385687621.jpg\"/></a></p><p>大多数人的一生都会换好几份甚至更多份工作，但每次换工作都是希望能有一个好的起点和薪酬，但能提供这样条件的大都是大公司，而这些大公司一般来说在面试中都会问一两个比较奇怪的问题，如果你之前表现还算可以，这个时候再抓住所提的怪异问题，或许就能够打动面试官。</p><p>那如何做好“战前”准备？那就要不打无准备之仗，就要事前看一些怪异的开放式面试题，而今天国外媒体BusinessInsider也正好发表了相关的文章——《14个苹果、谷歌和亚马逊的怪异开放式面试题》，值此之际我们就一起看看这些怪异的开放式面试题吧。</p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('21', '谷歌,放出,第一个,再到,成为,市场占有率,高的,浏览器,之一', '从谷歌放出Chrome的第一个Beta版，再到Chrome成为市场占有率最高的浏览器之一，小伙伴们一起见证了Chrome浏览器的成长。而正是5年前的今天，谷歌放出第一个 Chrome Beta 版本的下载。原来，天天陪伴我们的Chrome浏览器已经5岁了。2008\r\n年9月2日，谷歌官方博客表示将于第二天在超过100个国家同时发布“Google \r\nChrome”的Beta版，然而负责用', '<p>从谷歌放出Chrome的第一个Beta版，再到Chrome成为市场占有率最高的浏览器之一，小伙伴们一起见证了Chrome浏览器的成长。而正是5年前的今天，谷歌放出第一个 Chrome Beta&nbsp;版本的下载。原来，天天陪伴我们的Chrome浏览器已经5岁了。</p><p style=\"text-align:center;\"><img src=\"http://localhost/hdcms/http://localhost/hdcms/upload/Content/2013/11/29/40541385687740.jpg\" height=\"500\" width=\"500\"/></p><p>2008\r\n年9月2日，谷歌官方博客表示将于第二天在超过100个国家同时发布“Google \r\nChrome”的Beta版，然而负责用漫画解释Chrome浏览器特色和研发动机的作者菲利普.蓝森（Philipp \r\nLenssen）却提前收到了谷歌公司的信件，错以为时间提前，于是在2008年9月1日就将这个解释Chrome通途的漫画放到了自己的网站上。因此谷\r\n歌将错就错，随即将Chrome Beta提前了一天。</p>', '', '', ''), ('23', '', 'dsfsdfsdf', '<p>dsfsdfsdf<br/></p>', '', '', ''), ('24', '', '', '<p>sdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('22', '目前,微软,官方,正式,宣布,但该,公司,有向,开发者', '目\r\n前，微软官方已正式宣布 Windows 8.1RTM，但该公司并没有向开发者们提前发布这一最新系统，这对于想要为最新的 Windows 8.1 \r\n开发或优化应用的开发者们来说可不是什么好消息，好在现在微软已经向开发者们提供了为优化应用为目的的开发指南及资源。微软在其官方博客中称：“你可以在 Windows 8.1 公开发布的那一天提交应用，不过你现在已经可以利用 Visual Studio', '<p style=\"text-align:center;\"><img src=\"http://localhost/hdcms/http://localhost/hdcms/upload/Content/2013/11/29/99741385687762.jpg\" height=\"222\" width=\"600\"/></p><p>目\r\n前，微软官方已正式宣布 Windows 8.1RTM，但该公司并没有向开发者们提前发布这一最新系统，这对于想要为最新的 Windows 8.1 \r\n开发或优化应用的开发者们来说可不是什么好消息，好在现在微软已经向开发者们提供了为优化应用为目的的开发指南及资源。</p><p>微软在其官方博客中称：“你可以在 Windows 8.1 公开发布的那一天提交应用，不过你现在已经可以利用 Visual Studio 2013 预览版以及 Windows 8.1 预览版来开发，你可以参考&nbsp;<a href=\"http://msdn.microsoft.com/en-us/windows/apps/\" target=\"_blank\">Windows 开发者中心</a>，并在那里下载必要的软件资源。”</p><p>Windows\r\n 8.1 预览版中已经集成了开发者工具，例如 Visual Studio 2013，开发者可以使用与之相同的资源来为最终版的 Windows \r\n8.1 开发应用。此外，如果 iOS 及 Android 软件开发者们也有意为 Window 8.1 开发应用，微软也会向其提供相应的参考资源。</p><p>对\r\n于新手，微软还提供了入门级开发工具，并计划在 Windows 8.1 和 Visual Studio 在 10 月 18 \r\n日正式面世时在其官方博客以及 Windows Dev Center 中提供更多的指导以便开发者们对 Windows 8.1 的应用进行优化。</p><p>微软表示，Windows 8.1 根据用户反馈进行了大幅度的改善，例如开始按钮的回归，从桌面直接启动，可禁用的 hot corner 以及其核心应用的改进，包括 Xbox Music、Bing Weather 以及 Bing News。</p>', '', '', ''), ('25', '', '', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('26', '', '', '<p>sdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('27', '', '', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('28', '', '', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('29', '', '', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('30', '', '', '<p>sdfsdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('31', '', '', '<p>sdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('32', '', '', '<p>1212<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('33', '', 'sdf', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('34', '', 'sdf', '<p>sdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('35', '', 'dsffd', '<p>dsffd<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('36', '', '', '<p>2121212<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('37', '', '', '<p>9999<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('38', '', '', '<p>dsf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('39', '', '', '<p>6666<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('41', '', '', '<p>sdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('42', '', '', '<p>sdfsdf<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('43', '', '', '<p>333333333<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('44', '', '', '<p>9999<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('45', '', '', '<p>sdffsd<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', ''), ('46', '', '', '<p>ddddd<br/></p><div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\"></div>', '', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `hd_content_flag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_flag`;
CREATE TABLE `hd_content_flag` (
  `aid` int(11) unsigned NOT NULL COMMENT '文章id',
  `fid` mediumint(9) unsigned NOT NULL COMMENT '属性id',
  `cid` smallint(6) unsigned NOT NULL COMMENT '栏目ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_content_flag`
-- ----------------------------
BEGIN;
INSERT INTO `hd_content_flag` VALUES ('245', '4', '1'), ('247', '4', '1'), ('248', '4', '1'), ('254', '4', '5'), ('255', '4', '5'), ('256', '1', '1'), ('256', '2', '1'), ('256', '3', '1'), ('256', '4', '1'), ('257', '3', '1'), ('257', '4', '1'), ('257', '4', '1'), ('18', '4', '2'), ('23', '3', '2'), ('23', '2', '2'), ('21', '4', '2'), ('21', '4', '2'), ('22', '4', '2'), ('22', '4', '2'), ('22', '3', '2'), ('21', '2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `hd_extcredits`
-- ----------------------------
DROP TABLE IF EXISTS `hd_extcredits`;
CREATE TABLE `hd_extcredits` (
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户uid',
  `extcredits1` int(10) unsigned DEFAULT NULL COMMENT '积分1',
  `extcredits2` int(10) unsigned DEFAULT NULL COMMENT '积分2',
  `extcredits3` int(10) unsigned DEFAULT NULL COMMENT '积分3',
  `extcredits4` int(10) unsigned DEFAULT NULL,
  `extcredits5` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户积分表';

-- ----------------------------
--  Table structure for `hd_field`
-- ----------------------------
DROP TABLE IF EXISTS `hd_field`;
CREATE TABLE `hd_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `show_type` varchar(45) NOT NULL DEFAULT '' COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `table_type` tinyint(1) NOT NULL DEFAULT '1',
  `table_name` varchar(30) NOT NULL DEFAULT '' COMMENT '所在表名',
  `field_name` varchar(45) NOT NULL DEFAULT '' COMMENT '字段name名称',
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '字段标题 ',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 0 关闭',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `fieldsort` smallint(6) NOT NULL DEFAULT '0' COMMENT '字段排序',
  `member_show` tinyint(1) NOT NULL DEFAULT '1',
  `set` text NOT NULL COMMENT '字段设置',
  PRIMARY KEY (`fid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Records of `hd_field`
-- ----------------------------
BEGIN;
INSERT INTO `hd_field` VALUES ('1', '3', 'input', '1', 'video', 'video_url', '视频地址', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('2', '3', 'input', '1', 'video', 'download', '下载地址', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('64', '16', 'editor', '1', 'stu_notice', 'content', '内容', '1', '0', '0', '1', 'array (\n  \'type\' => \'full\',\n  \'default\' => \'\',\n  \'height\' => \'200\',\n)'), ('59', '6', 'select', '1', 'project', 'pro_language', '开发语言', '1', '0', '3', '1', 'array (\n  \'message\' => \'\',\n  \'options\' => \'PHP|1,Linux|2\',\n  \'form_type\' => \'radio\',\n  \'default\' => \'1\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'required\' => \'\',\n)'), ('71', '6', 'image', '1', 'project', 'pro_pic1', '项目截图1', '1', '0', '7', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'200\',\n  \'height\' => \'200\',\n  \'water\' => \'0\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('10', '6', 'input', '1', 'project', 'pro_download', '下载地址', '1', '0', '4', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('67', '19', 'image', '1', 'kaixue', 'pic', '照片', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'200\',\n  \'height\' => \'200\',\n  \'water\' => \'0\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('12', '6', 'image', '1', 'project', 'pro_pic2', '项目截图2', '1', '0', '8', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'200\',\n  \'height\' => \'200\',\n  \'water\' => \'0\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('63', '15', 'image', '1', 'wozaihoudun', 'thumbnail', '缩略图', '1', '0', '0', '1', 'array (\n  \'upload_size\' => \'5\',\n  \'allow_upload_type\' => \'*.gif;*.jpg;*.png;*.jpeg\',\n  \'default\' => \'\',\n)'), ('76', '20', 'input', '1', 'lesson_table', 'lesson', '课程表', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('27', '8', 'editor', '1', 'stu_notice', 'content', '日志内容', '1', '0', '0', '1', 'array (\n  \'type\' => \'full\',\n  \'default\' => \'\',\n  \'height\' => \'200\',\n)'), ('69', '12', 'date', '1', 'course', 'lesson_time', '开课时间', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'format\' => \'0\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('75', '20', 'input', '1', 'lesson_table', 'advert', '广告词', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'400\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('66', '18', 'editor', '1', 'stu_notice', 'content', '内容', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'height\' => \'200\',\n  \'default\' => \'\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('77', '19', 'input', '1', 'kaixue', 'pic_swf', '视频地址', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('78', '7', 'image', '1', 'ofschool', 'photo', '工作照片', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'500\',\n  \'height\' => \'500\',\n  \'water\' => \'0\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('80', '21', 'textarea', '1', 'ask', 'reply', '回答', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'500\',\n  \'height\' => \'100\',\n  \'default\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'error\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('151', '86', 'editor', '2', 'test_data', 'edit', 'edit', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'height\' => \'100\',\n  \'default\' => \'edit\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('146', '86', 'input', '2', 'test_data', 'input', 'input', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'size\' => \'30\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('147', '86', 'textarea', '2', 'test_data', 'textarea', 'textarea', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'500\',\n  \'height\' => \'100\',\n  \'default\' => \'textarea\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'options\' => \'\',\n)'), ('148', '86', 'number', '2', 'test_data', 'num', 'num', '1', '0', '0', '1', 'array (\n  \'message\' => \'num\',\n  \'num_integer\' => \'6\',\n  \'num_decimal\' => \'2\',\n  \'size\' => \'30\',\n  \'default\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)'), ('149', '86', 'select', '2', 'test_data', 'select', 'select', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'options\' => \'男|1,女|2\',\n  \'form_type\' => \'checkbox\',\n  \'default\' => \'\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'required\' => \'\',\n)'), ('152', '86', 'images', '2', 'test_data', 'images', 'images', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'input_width\' => \'100\',\n  \'width\' => \'260\',\n  \'height\' => \'260\',\n  \'num\' => \'10\',\n  \'ispasswd\' => \'1\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('153', '86', 'date', '2', 'test_data', 'time', 'time', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'format\' => \'1\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('154', '86', 'image', '2', 'test_data', 'image', 'image', '1', '0', '0', '1', 'array (\n  \'message\' => \'\',\n  \'width\' => \'260\',\n  \'height\' => \'260\',\n  \'ispasswd\' => \'1\',\n  \'error\' => \'\',\n  \'css\' => \'\',\n  \'validation\' => \'false\',\n  \'default\' => \'\',\n  \'required\' => \'\',\n  \'options\' => \'\',\n)'), ('159', '1', 'input', '2', 'content_data', 'nametc', '名称', '1', '0', '0', '1', 'array (\n  \'message\' => \'输入英文小写字母\',\n  \'size\' => \'300\',\n  \'default\' => \'\',\n  \'ispasswd\' => \'0\',\n  \'css\' => \'\',\n  \'validation\' => \'/^(http[s]?:)?(\\\\/{2})?([a-z0-9]+\\\\.)?[a-z0-9]+(\\\\.(com|cn|cc|org|net|com.cn))$/i\',\n  \'required\' => \'0\',\n  \'error\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'options\' => \'\',\n)');
COMMIT;

-- ----------------------------
--  Table structure for `hd_flag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_flag`;
CREATE TABLE `hd_flag` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `flagname` char(20) NOT NULL,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统属性(不能删除)  2 用户定义属性',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_flag`
-- ----------------------------
BEGIN;
INSERT INTO `hd_flag` VALUES ('1', '热门', '1'), ('2', '置顶', '1'), ('3', '推荐', '1'), ('4', '图片', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `hd_member_group`;
CREATE TABLE `hd_member_group` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员组id',
  `is_system` smallint(5) unsigned NOT NULL DEFAULT '2' COMMENT '1 系统组 2 普通组',
  `point` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '积分<=时为此会员组',
  `allowpost` smallint(1) NOT NULL COMMENT '允许投稿  1 允许 2 不允许',
  `allowpostverify` smallint(1) NOT NULL COMMENT '投稿不需要审核  1 不需要  2 需要',
  `allowsendmessage` smallint(1) NOT NULL COMMENT '允许发短消息  1 允许  2 不允许',
  `description` varchar(255) NOT NULL COMMENT '用户组描述',
  `gname` char(30) NOT NULL COMMENT '会员组名称',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_member_group`
-- ----------------------------
BEGIN;
INSERT INTO `hd_member_group` VALUES ('2', '1', '100', '1', '0', '0', '新手上路', '新手上路'), ('3', '1', '200', '1', '0', '0', '中级会员 	', '中级会员 	'), ('4', '1', '300', '1', '0', '0', '高级会员', '高级会员'), ('5', '1', '500', '1', '1', '1', '', '钻石会员');
COMMIT;

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
  `control` char(30) NOT NULL COMMENT '处理程序（控制器）',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 基本模型 主、附表     2 独立模型 只有主表',
  `is_submit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 允许投稿 2 不允许投稿',
  `m_order` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', 'Content', '1', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_node`
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(30) NOT NULL DEFAULT '' COMMENT '中文标题',
  `app` char(30) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` char(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(100) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `menu_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型 1 权限+菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '0',
  `is_system` tinyint(1) DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) unsigned DEFAULT '0' COMMENT '0 普通 1 常用 ',
  `level` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_node`
-- ----------------------------
BEGIN;
INSERT INTO `hd_node` VALUES ('1', '内容', '', '', '', '', '', '1', '1', '0', '0', '0', '0', '1'), ('2', '内容管理', '', '', '', '', '', '1', '1', '1', '6', '0', '0', '2'), ('16', '系统', '', '', '', '', '', '1', '1', '0', '0', '0', '0', '1'), ('21', '后台菜单管理', 'Hdcms', 'Node', 'index', '', '', '1', '1', '19', '0', '0', '0', '3'), ('3', '附件管理', 'Upload', 'Index', 'index', '', '', '1', '1', '2', '0', '0', '0', '1'), ('12', '数据备份', 'Backup', 'Backup', 'index', '', '', '1', '1', '10', '0', '0', '1', '3'), ('10', '内容相关管理', '', '', '', '', '', '1', '1', '1', '4', '0', '0', '2'), ('13', '栏目管理', 'Category', 'Category', 'index', '', '', '1', '1', '10', '0', '0', '0', '3'), ('14', '模型管理', 'Model', 'Model', 'index', '', '', '1', '1', '10', '0', '0', '0', '3'), ('15', '推荐位管理', 'Content', 'Flag', 'index', '', '', '1', '1', '10', '0', '0', '0', '3'), ('19', '系统设置', '', '', '', '', '', '1', '1', '16', '0', '0', '0', '2'), ('4', '管理内容', 'Content', 'Content', 'index', '', '', '1', '1', '2', '1', '0', '1', '3'), ('11', '管理员设置', '', '', '', '', '', '1', '1', '16', '0', '0', '0', '2'), ('17', '管理员管理', 'Admin', 'Admin', 'index', '', '', '1', '1', '11', '0', '0', '0', '3'), ('18', '角色管理', 'Admin', 'Role', 'index', '', '', '1', '1', '11', '0', '0', '0', '3'), ('20', '网站配置', 'Hdcms', 'Config', 'edit', '', '', '1', '1', '19', '5', '0', '0', '3'), ('5', '生成静态', '', '', '', '', '', '1', '1', '1', '5', '0', '0', '2'), ('6', '批量更新栏目页', 'Html', 'Html', 'batch_category', '&', '', '1', '1', '5', '4', '0', '0', '1'), ('8', '生成首页', 'Html', 'Html', 'create_index', '&', '', '1', '1', '5', '5', '0', '0', '1'), ('9', '批量更新内容页', 'Html', 'Html', 'batch_content', '&', '', '1', '1', '5', '3', '0', '0', '1'), ('28', '修改密码', 'Admin', 'AdminManage', 'edit_password', '&', '', '1', '1', '2', '0', '0', '0', '1'), ('27', '修改个人信息', 'Admin', 'AdminManage', 'edit_info', '', '', '1', '1', '29', '1', '0', '0', '3'), ('26', '我的面板', '', '', '', '', '', '1', '1', '0', '10', '0', '0', '1'), ('29', '个人信息', '', '', '', '', '', '1', '1', '26', '0', '0', '0', '2'), ('40', '标签管理', 'Template', 'Tag', 'index', '', '', '1', '1', '37', '0', '0', '0', '1'), ('30', '会员', '', '', '', '', '', '1', '1', '0', '0', '0', '0', '1'), ('31', '会员管理', '', '', '', '', '', '1', '1', '30', '0', '0', '0', '2'), ('32', '会员管理', 'Member', 'Member', 'index', '', '', '1', '1', '31', '0', '0', '0', '1'), ('33', '审核会员', 'Member', 'Member', 'verify', '', '', '1', '1', '31', '0', '0', '0', '1'), ('34', '会员组管理', '', '', '', '', '', '1', '1', '30', '0', '0', '0', '2'), ('35', '管理会员组', 'Member', 'Group', 'index', '', '', '1', '1', '34', '0', '0', '0', '1'), ('36', '模板', '', '', '', '', '', '1', '1', '0', '0', '0', '0', '1'), ('37', '模板管理', '', '', '', '', '', '1', '1', '36', '0', '0', '0', '2'), ('38', '模板风格', 'Template', 'Style', 'index', '', '', '1', '1', '37', '0', '0', '0', '1'), ('39', '模板文件', 'Template', 'Style', 'show_dir', '', '', '1', '1', '37', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_role`
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) NOT NULL DEFAULT '',
  `pid` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `creditslower` int(255) NOT NULL DEFAULT '0' COMMENT '当前角色积分最小值',
  `is_admin` tinyint(1) DEFAULT '2' COMMENT '1 管理组  2 会员组',
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_role`
-- ----------------------------
BEGIN;
INSERT INTO `hd_role` VALUES ('1', '超级管理员', '0', '超级管理员', '0', '1'), ('2', '编辑', '0', '内容编辑', '0', '1'), ('3', '发布人员', '0', '发布人员', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_template_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_template_tag`;
CREATE TABLE `hd_template_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` char(60) NOT NULL DEFAULT '' COMMENT '标签名',
  `option` mediumtext NOT NULL COMMENT '标签选项',
  `content` text NOT NULL COMMENT '标签内容',
  `updatetime` int(10) DEFAULT NULL COMMENT '标签修改时间',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_upload`
-- ----------------------------
DROP TABLE IF EXISTS `hd_upload`;
CREATE TABLE `hd_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `aid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '文件名',
  `filename` varchar(100) NOT NULL DEFAULT '',
  `path` char(200) NOT NULL DEFAULT '' COMMENT '文件路径 ',
  `ext` varchar(45) NOT NULL DEFAULT '' COMMENT '扩展名',
  `isimage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uptime` int(10) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  PRIMARY KEY (`id`),
  KEY `aid` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
--  Records of `hd_upload`
-- ----------------------------
BEGIN;
INSERT INTO `hd_upload` VALUES ('1', '1', '1', '1', '85131385685305.png', '', 'upload/Content/2013/11/29/85131385685305.png', 'png', '1', '108477', '1385685305', '1'), ('2', '3', '1', '1', '5631385685788.png', '', 'upload/Content/2013/11/29/5631385685788.png', 'png', '1', '108477', '1385685788', '1'), ('3', '4', '1', '1', '30801385685834.jpg', '', 'upload/Content/2013/11/29/30801385685834.jpg', 'jpg', '1', '36429', '1385685834', '1'), ('4', '5', '1', '1', '80171385685858.jpg', '', 'upload/Content/2013/11/29/80171385685858.jpg', 'jpg', '1', '36333', '1385685858', '1'), ('5', '6', '1', '1', '47261385686021.jpg', '', 'upload/Content/2013/11/29/47261385686021.jpg', 'jpg', '1', '131952', '1385686021', '1'), ('6', '7', '1', '1', '56131385686211.jpg', '', 'upload/Content/2013/11/29/56131385686211.jpg', 'jpg', '1', '131952', '1385686211', '1'), ('7', '7', '1', '1', '22641385686218.jpg', '', 'upload/Content/2013/11/29/22641385686218.jpg', 'jpg', '1', '131952', '1385686218', '1'), ('8', '7', '1', '1', '10021385686252.jpg', '', 'upload/Content/2013/11/29/10021385686252.jpg', 'jpg', '1', '131952', '1385686252', '1'), ('9', '7', '1', '1', '50161385686419.jpg', '', 'upload/Content/2013/11/29/50161385686419.jpg', 'jpg', '1', '131952', '1385686419', '1'), ('10', '7', '1', '1', '7811385686419.jpg', '', 'upload/Content/2013/11/29/7811385686419.jpg', 'jpg', '1', '131952', '1385686419', '1'), ('11', '8', '1', '1', '18131385686435.jpg', '', 'upload/Content/2013/11/29/18131385686435.jpg', 'jpg', '1', '131952', '1385686435', '1'), ('12', '8', '1', '1', '66011385686436.jpg', '', 'upload/Content/2013/11/29/66011385686436.jpg', 'jpg', '1', '131952', '1385686436', '1'), ('13', '9', '1', '1', '92061385686495.jpg', '', 'upload/Content/2013/11/29/92061385686495.jpg', 'jpg', '1', '131952', '1385686495', '1'), ('14', '9', '1', '1', '35791385686496.jpg', '', 'upload/Content/2013/11/29/35791385686496.jpg', 'jpg', '1', '131952', '1385686496', '1'), ('15', '10', '1', '1', '35571385686664.jpg', '', 'upload/Content/2013/11/29/35571385686664.jpg', 'jpg', '1', '131952', '1385686664', '1'), ('16', '10', '1', '1', '6601385686665.jpg', '', 'upload/Content/2013/11/29/6601385686665.jpg', 'jpg', '1', '131952', '1385686665', '1'), ('17', '11', '1', '1', '471385686727.jpg', '', 'upload/Content/2013/11/29/471385686727.jpg', 'jpg', '1', '131952', '1385686727', '1'), ('18', '11', '1', '1', '7091385686727.jpg', '', 'upload/Content/2013/11/29/7091385686727.jpg', 'jpg', '1', '131952', '1385686727', '1'), ('19', '12', '1', '1', '90491385687077.jpg', '', 'upload/Content/2013/11/29/90491385687077.jpg', 'jpg', '1', '131952', '1385687077', '1'), ('20', '12', '1', '1', '55111385687077.jpg', '', 'upload/Content/2013/11/29/55111385687077.jpg', 'jpg', '1', '131952', '1385687077', '1'), ('21', '13', '1', '1', '52991385687107.jpg', '', 'upload/Content/2013/11/29/52991385687107.jpg', 'jpg', '1', '131952', '1385687107', '1'), ('22', '13', '1', '1', '27451385687107.jpg', '', 'upload/Content/2013/11/29/27451385687107.jpg', 'jpg', '1', '131952', '1385687107', '1'), ('23', '14', '1', '1', '98051385687141.jpg', '', 'upload/Content/2013/11/29/98051385687141.jpg', 'jpg', '1', '131952', '1385687141', '1'), ('24', '14', '1', '1', '81101385687142.jpg', '', 'upload/Content/2013/11/29/81101385687142.jpg', 'jpg', '1', '131952', '1385687142', '1'), ('25', '15', '1', '1', '3961385687178.jpg', '', 'upload/Content/2013/11/29/3961385687178.jpg', 'jpg', '1', '131952', '1385687178', '1'), ('26', '15', '1', '1', '80631385687179.jpg', '', 'upload/Content/2013/11/29/80631385687179.jpg', 'jpg', '1', '131952', '1385687179', '1'), ('27', '16', '1', '1', '11911385687193.jpg', '', 'upload/Content/2013/11/29/11911385687193.jpg', 'jpg', '1', '131952', '1385687193', '1'), ('28', '16', '1', '1', '26081385687193.jpg', '', 'upload/Content/2013/11/29/26081385687193.jpg', 'jpg', '1', '131952', '1385687193', '1'), ('29', '17', '1', '1', '1021385687208.jpg', '', 'upload/Content/2013/11/29/1021385687208.jpg', 'jpg', '1', '36333', '1385687208', '1'), ('30', '17', '1', '1', '26131385687208.jpg', '', 'upload/Content/2013/11/29/26131385687208.jpg', 'jpg', '1', '36333', '1385687208', '1'), ('31', '18', '1', '1', '89241385687620.jpg', '', 'upload/Content/2013/11/29/89241385687620.jpg', 'jpg', '1', '36429', '1385687620', '1'), ('32', '18', '1', '1', '60911385687621.jpg', '', 'upload/Content/2013/11/29/60911385687621.jpg', 'jpg', '1', '36429', '1385687621', '1'), ('33', '19', '1', '1', '42921385687660.png', '', 'upload/Content/2013/11/29/42921385687660.png', 'png', '1', '75303', '1385687660', '1'), ('34', '19', '1', '1', '2231385687662.png', '', 'upload/Content/2013/11/29/2231385687662.png', 'png', '1', '75303', '1385687662', '1'), ('35', '20', '1', '1', '64851385687717.jpg', '', 'upload/Content/2013/11/29/64851385687717.jpg', 'jpg', '1', '27710', '1385687717', '1'), ('36', '20', '1', '1', '77631385687718.jpg', '', 'upload/Content/2013/11/29/77631385687718.jpg', 'jpg', '1', '27710', '1385687718', '1'), ('37', '21', '1', '1', '36741385687740.jpg', '', 'upload/Content/2013/11/29/36741385687740.jpg', 'jpg', '1', '33247', '1385687740', '1'), ('38', '21', '1', '1', '40541385687740.jpg', '', 'upload/Content/2013/11/29/40541385687740.jpg', 'jpg', '1', '33247', '1385687740', '1'), ('39', '22', '1', '1', '21471385687761.jpg', '', 'upload/Content/2013/11/29/21471385687761.jpg', 'jpg', '1', '42511', '1385687761', '1'), ('40', '22', '1', '1', '99741385687762.jpg', '', 'upload/Content/2013/11/29/99741385687762.jpg', 'jpg', '1', '42511', '1385687762', '1'), ('41', '41', '1', '1', '1.jpg', '1', 'upload/content/2013/12/02/61991385925875.jpg', 'jpg', '1', '118564', '1385925875', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '登录IP',
  `realname` char(30) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 正常  2 锁定',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女',
  `favicon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `gid` smallint(6) NOT NULL COMMENT '会员组',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_user`
-- ----------------------------
BEGIN;
INSERT INTO `hd_user` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', 'houdunwangxj@gmail.com', '1386103216', '192.168.1.104', '后盾向军', '1', '2300071698', '1', './upload/favicon/2013/12/04/9091386090110.jpg', '0', '1', '1'), ('2', 'lisi', 'lisilisi', 'sdf@fdc.com', '0', '', '李四', '1', '23423', '1', '', '0', '0', '1'), ('3', '王五', 'admin888', 'dfs@dfs.com', '0', '', 'dsklsfd', '1', '', '1', '', '0', '0', '1'), ('4', 'sdfsdf', 'sdfsdf', '', '0', '', '', '1', '', '1', '', '0', '0', '1'), ('5', 'sdfdsfdsfdsfdsdfsd', '9d0d68198a64294b65a8875357db94ad', '', '0', '', 'sdf', '1', 'sdf', '1', '', '0', '0', '1'), ('6', 'admin1', '7fef6171469e80d32c0559f88b377245', '', '0', '', '', '1', '', '1', '', '0', '0', '1'), ('7', 'reret', 'bbad8d72c1fac1d081727158807a8798', '', '0', '', '李三国', '1', 'ds3434', '1', '', '0', '0', '4'), ('8', 'sdklsdlk', '9bf07d7d48afeb7cdfe92e55ee435e6d', '', '0', '', 'dsfsdf', '0', '', '1', '', '0', '0', '1'), ('9', 'admin888', '7fef6171469e80d32c0559f88b377245', 'admin888@fd.com', '0', '', 'admin888', '0', '3324', '1', '', '0', '0', '2'), ('10', 'sdfsdfsd', '8c71fb3f7593543f2ad180d31148a7cf', 'sdf@fdfs.com', '0', '', 'sdfds', '0', '', '1', './upload/favicon/2013/12/02/14111385958346.jpg', '0', '0', '2');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
