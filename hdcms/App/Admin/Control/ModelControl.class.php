<?php
class ModelControl extends RbacControl
{
    /**
     * 显示模型列表
     */
    public function index()
    {
        $db = M("model");
        $this->assign("model", $db->all());
        $this->display();
    }

    /**
     * 添加模型时Ajax验证模型是否存在
     */
    public function check_model()
    {
        $db = M("model");
        if (isset($_POST['tablename'])) {
            if (!$db->find("tablename='{$_POST['tablename']}'")) {
                $this->_ajax(1);
            }
        }
    }

    /**
     * 添加模型
     */
    public function add()
    {
        if (isset($_POST['tablename'])) {
            $db = M("model");
            $table = $_POST['tablename'];
            $_POST['control'] = ucfirst(preg_replace('@\.class\.php|' . C("CONTROL_FIX") . '@i', '', $_POST['control']));
            //Model表中添加记录
            if ($mid = $db->add()) {
                //创建模型表
                $this->create_model_table($table, $_POST['type']);
                //更新缓存
                O("CacheControl", "model");
                $msg = "添加成功<script>window.top.location.href='".__APP__."&c=index&m=index&module=module'</script>";
                $this->success($msg, "index");
            } else {
                $this->error("添加失败", "index");
            }
        } else {
            $this->display("add_show");
        }
    }

    /**
     * 创建数据表
     * @param $tableName 表名
     * @param $type 类型  基本模型|独立模型（只有主表）
     */
    private function create_model_table($tableName, $type)
    {
        $masterTable = C("DB_PREFIX") . $tableName;
        $masterSql = <<<str
-- -----------------------------------------------------
-- 主表
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `{$masterTable}` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '标题' ,
  `thumb` CHAR(200) NOT NULL DEFAULT '' COMMENT '缩略图' ,
  `click` MEDIUMINT NOT NULL DEFAULT 100 COMMENT '点击次数' ,
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
  PRIMARY KEY (`aid`) ,
  INDEX `cid` (`cid` ASC))
ENGINE = MyISAM;
str;
        $db = M();
        $db->exe($masterSql);
        //独立模型不创建附表
        if ($type != 1) return;
        $slaveTable = $masterTable . '_data';
        $slaveSql = <<<str
-- -----------------------------------------------------
-- 从表
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `{$slaveTable}`(
  `aid` INT UNSIGNED NOT NULL COMMENT '文章主表ID' ,
  `cid` SMALLINT UNSIGNED NOT NULL COMMENT '栏目ID' ,
  `keywords` CHAR(45) NOT NULL DEFAULT '' COMMENT '关键字' ,
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '描述' ,
  `content` text NULL COMMENT '正文' ,
  INDEX `cid` (`cid` ASC) ,
  INDEX `aid` (`aid` ASC) )
ENGINE = MyISAM;
str;

        $db->exe($slaveSql);
    }
}