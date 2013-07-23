SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `hdcms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `hdcms` ;

-- -----------------------------------------------------
-- Table `hdcms`.`hd_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_category` (
  `cid` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目ID' ,
  `pid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级ID' ,
  `cat_name` CHAR(30) NOT NULL DEFAULT '' COMMENT '栏目名称' ,
  `html_dir` CHAR(30) NOT NULL DEFAULT '' COMMENT '静态目录' ,
  `cat_keyworks` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '栏目关键字' ,
  `cat_description` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '栏目描述' ,
  `list_tpl` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '列表页模板' ,
  `arc_tpl` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '内容页模板' ,
  `is_cat_html` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '栏目生成Html' ,
  `is_arc_html` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '内容页生成Html\n\n' ,
  `list_html_url` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n' ,
  `arc_html_url` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则' ,
  PRIMARY KEY (`cid`) )
ENGINE = MyISAM
COMMENT = '栏目表';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_news`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_news` (
  `nid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
  `title` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '标题' ,
  `thumb` CHAR(200) NOT NULL DEFAULT '' COMMENT '缩略图' ,
  `keywords` CHAR(45) NOT NULL DEFAULT '' COMMENT '关键字' ,
  `click` MEDIUMINT NOT NULL DEFAULT 100 COMMENT '点击次数' ,
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '描述' ,
  `source` CHAR(30) NOT NULL DEFAULT '' COMMENT '来源' ,
  `redirecturl` CHAR(100) NOT NULL DEFAULT '' COMMENT '转向链接' ,
  `allowreply` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '是否允许回复' ,
  `author` CHAR(45) NOT NULL COMMENT '作者' ,
  `addtime` INT(10) NOT NULL COMMENT '添加时间' ,
  `updatetime` INT(10) NOT NULL COMMENT '发布时间 ' ,
  `color` CHAR(7) NOT NULL COMMENT '标题颜色\n' ,
  `ishtml` TINYINT(1) NOT NULL DEFAULT 1 ,
  `username` CHAR(20) NOT NULL ,
  `cid` SMALLINT UNSIGNED NOT NULL COMMENT '栏目cid' ,
  PRIMARY KEY (`nid`) ,
  INDEX `fk_hd_news_hd_category1_idx` (`cid` ASC) )
ENGINE = MyISAM
COMMENT = '文章表';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_news_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_news_data` (
  `nd_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cid` SMALLINT UNSIGNED NOT NULL COMMENT '栏目ID' ,
  `nid` INT UNSIGNED NOT NULL COMMENT '文章主表ID' ,
  `text` TEXT NULL COMMENT '正文' ,
  PRIMARY KEY (`nd_id`) ,
  INDEX `fk_hd_news_data_hd_category1_idx` (`cid` ASC) ,
  INDEX `fk_hd_news_data_hd_news1_idx` (`nid` ASC) )
ENGINE = MyISAM
COMMENT = '文章数据表';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_comment` (
  `mid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nid` INT UNSIGNED NOT NULL COMMENT '文章ID' ,
  `groupid` SMALLINT UNSIGNED NOT NULL DEFAULT 7 COMMENT '组id\n1 基本配置\n2 ' ,
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户名' ,
  `ip` CHAR(15) NOT NULL DEFAULT '' COMMENT 'IP地址' ,
  `display` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否显示' ,
  `content` VARCHAR(45) NULL ,
  PRIMARY KEY (`mid`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_access`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_access` (
  `rid` SMALLINT(5) UNSIGNED NOT NULL ,
  `nid` SMALLINT(5) UNSIGNED NOT NULL ,
  `level` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 ,
  INDEX `gid` (`rid` ASC) ,
  INDEX `nid` (`nid` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_node`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_node` (
  `nid` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` CHAR(30) NOT NULL ,
  `title` VARCHAR(60) NULL DEFAULT NULL ,
  `state` TINYINT(1) NULL DEFAULT '1' ,
  `des` CHAR(255) NULL DEFAULT NULL ,
  `sort` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '100' ,
  `pid` SMALLINT(5) UNSIGNED NOT NULL ,
  `level` TINYINT(1) UNSIGNED NOT NULL ,
  PRIMARY KEY (`nid`) ,
  INDEX `level` (`level` ASC) ,
  INDEX `state` (`state` ASC) ,
  INDEX `pid` (`pid` ASC) ,
  INDEX `name` (`name` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_role` (
  `rid` SMALLINT(5) NOT NULL AUTO_INCREMENT ,
  `rname` CHAR(60) NULL DEFAULT NULL ,
  `pid` SMALLINT(5) NULL DEFAULT NULL ,
  `state` TINYINT(1) NULL DEFAULT NULL ,
  `title` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`rid`) ,
  INDEX `gid` (`rid` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_user` (
  `uid` INT(10) NOT NULL AUTO_INCREMENT ,
  `username` CHAR(30) NULL DEFAULT NULL ,
  `password` CHAR(40) NULL DEFAULT NULL ,
  PRIMARY KEY (`uid`) ,
  INDEX `username` (`username` ASC) ,
  INDEX `password` (`password` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_user_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_user_role` (
  `uid` INT(10) UNSIGNED NOT NULL ,
  `rid` INT(10) UNSIGNED NOT NULL ,
  INDEX `uid` (`uid` ASC) ,
  INDEX `nid` (`rid` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hdcms`.`hd_system`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_system` (
  `sid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '配置名称\n' ,
  `value` TEXT NOT NULL COMMENT '配置值' ,
  `groupid` ENUM('站点配置','性能设置','上传配置','交互设置','会员设置','邮箱配置','安全设置','其它设置') NOT NULL DEFAULT '站点配置' COMMENT '配置类型' ,
  `info` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '配置描述' ,
  `type` ENUM('字符串','数值','单行文本','多行文本') NOT NULL DEFAULT '字符串' COMMENT '表示类型\n1 字符串\n2 数字\n3 单行文本\n4 多行文本' ,
  PRIMARY KEY (`sid`) )
ENGINE = MyISAM
COMMENT = '系统配置';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_upload`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_upload` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
  `arcid` INT UNSIGNED NULL COMMENT '文章ID' ,
  `mid` SMALLINT UNSIGNED NULL COMMENT '模型ID' ,
  `catid` SMALLINT UNSIGNED NULL COMMENT '栏目cid' ,
  `filename` VARCHAR(45) NULL COMMENT '文件名' ,
  `path` CHAR(200) NULL COMMENT '文件路径 ' ,
  `ext` VARCHAR(45) NULL COMMENT '扩展名' ,
  `isimage` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '图片' ,
  `filesize` MEDIUMINT UNSIGNED NULL COMMENT '文件大小' ,
  `uptime` INT(10) NULL COMMENT '上传时间' ,
  `uid` INT UNSIGNED NULL COMMENT '用户ID' ,
  PRIMARY KEY (`aid`) )
ENGINE = MyISAM
COMMENT = '上传文件';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_model`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_model` (
  `mid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
  `model_name` CHAR(30) NOT NULL DEFAULT '' COMMENT '模型名称' ,
  `tablename` CHAR(20) NOT NULL DEFAULT '' COMMENT '主表名' ,
  `disabled` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '禁用 1 开启 0 关闭' ,
  `description` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '模型描述' ,
  PRIMARY KEY (`mid`) )
ENGINE = MyISAM
COMMENT = '模型表';


-- -----------------------------------------------------
-- Table `hdcms`.`hd_model_field`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hdcms`.`hd_model_field` (
  `fid` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `model_mid` INT UNSIGNED NOT NULL COMMENT '模型ID' ,
  `fname` VARCHAR(45) NOT NULL COMMENT '字段name名称' ,
  `title` VARCHAR(45) NOT NULL COMMENT '中文描述' ,
  `info` VARCHAR(255) NOT NULL COMMENT '字段介绍' ,
  `css` VARCHAR(45) NOT NULL ,
  `isparent` TINYINT(1) NOT NULL COMMENT '主表字段 1 是 0 不是' ,
  `validation` VARCHAR(45) NOT NULL COMMENT '验证规则，只能是正则' ,
  `error` VARCHAR(45) NOT NULL COMMENT '验证失败提示信息' ,
  `type` VARCHAR(45) NOT NULL COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|' ,
  `fieldset` VARCHAR(45) NOT NULL COMMENT '字段设置' ,
  PRIMARY KEY (`fid`, `model_mid`) ,
  INDEX `fk_hd_model_field_hd_model1_idx` (`model_mid` ASC) )
ENGINE = MyISAM
COMMENT = '模型字段';

USE `hdcms` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
