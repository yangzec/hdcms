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
     * 删除模型
     */
    public function del()
    {
        $mid = $this->_post("mid");
        if (!$mid) {
            $this->error("非法请求");
        }
        if (M("category")->find("mid=$mid")) {
            $this->_ajax(0);
        }
        $db = M("model");
        $model = $db->find($mid);
        //删除主表与表字段缓存
        $db->exe("DROP TABLE " . C("DB_PREFIX") . $model['tablename']);
        F(C("DB_DATABASE") . C("DB_PREFIX") . $model['tablename']);
        //删除附表与表字段缓存
        if ($model['type'] == 1) {
            $db->exe("DROP TABLE " . C("DB_PREFIX") . $model['tablename'] . '_data');
            F(C("DB_DATABASE") . C("DB_PREFIX") . $model['tablename'] . '_data');
        }
        $db->del($mid);
        $db->table("model_field")->del($mid);
        //删除字段缓存
        if (F($mid, NULL, './data/field/')) {
            $this->_ajax(1,"text");
        }

    }

    /**
     * 编辑模型
     */
    public function edit()
    {
        if (isset($_POST['model_name'])) {
            $db = M("model");
            $_POST['control'] = $this->_post("control","ucfirst");
            $db->save();
            $this->_ajax("1","text");
        } else {
            $mid = $this->_get("mid");
            $db = M("model");
            $model = $db->find($mid);
            $this->assign("field", $model);
            $this->display();
        }
    }

    /**
     * 添加模型
     */
    public function add()
    {
        if (isset($_POST['tablename'])) {
            $db = M("model");
            $_POST['tablename'] = $this->_post('tablename', 'strtolower');
            $table = strtolower($_POST['tablename']);
            $_POST['control'] = $this->_post("control","ucfirst");
            //Model表中添加记录

            if ($mid = $db->add()) {
                //创建模型表
                $this->create_model_table($table, $_POST['type']);
                //更新缓存
                O("CacheControl", "model");
                $msg = "添加成功<script>window.top.location.href='" . __APP__ . "&c=index&m=index&module=module'</script>";
                $this->success($msg, "index");
            } else {
                $this->error("添加失败", "index");
            }
        } else {
            $this->display();
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
  `cid` SMALLINT UNSIGNED NOT NULL default 0 COMMENT '栏目cid' ,
  `mid` SMALLINT UNSIGNED NOT NULL default 0 COMMENT '模型mid' ,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '标题' ,
  `thumb` CHAR(200) NOT NULL DEFAULT '' COMMENT '缩略图' ,
  `click` MEDIUMINT NOT NULL DEFAULT 0 COMMENT '点击次数' ,
  `source` CHAR(30) NOT NULL DEFAULT '' COMMENT '来源' ,
  `redirecturl` CHAR(100) NOT NULL DEFAULT '' COMMENT '转向链接' ,
  `allowreply` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '是否允许回复' ,
  `author` CHAR(45) NOT NULL default '' COMMENT '作者' ,
  `addtime` INT(10) NOT NULL default 0 COMMENT '添加时间' ,
  `updatetime` INT(10) NOT NULL default 0 COMMENT '发布时间 ' ,
  `color` CHAR(7) NOT NULL default '' COMMENT '标题颜色\n' ,
  `template` varchar(255) NOT NULL default '' COMMENT '模板\n' ,
  `ishtml` TINYINT(1) NOT NULL DEFAULT 1 ,
  `username` CHAR(20) NOT NULL default '',
  PRIMARY KEY (`aid`) ,
  INDEX `cid` (`cid` ASC))
ENGINE = MyISAM;
str;
        $db = M();
        $db->exe($masterSql);
        F(C("DB_DATABASE") . $masterTable, NULL, TABLE_PATH);
        //独立模型不创建附表
        if ($type != 1) return;
        $slaveTable = $masterTable . '_data';
        $slaveSql = <<<str
-- -----------------------------------------------------
-- 从表
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `{$slaveTable}`(
  `aid` INT UNSIGNED NOT NULL default 0 COMMENT '文章主表ID' ,
  `cid` SMALLINT UNSIGNED NOT NULL default 0 COMMENT '栏目ID' ,
  `keywords` CHAR(45) NOT NULL DEFAULT '' COMMENT '关键字' ,
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '描述' ,
  `content` text NULL COMMENT '正文' ,
  INDEX `cid` (`cid` ASC) ,
  INDEX `aid` (`aid` ASC) )
ENGINE = MyISAM;
str;

        $db->exe($slaveSql);
        F(C("DB_DATABASE") . $slaveTable, NULL, TABLE_PATH);
    }
}