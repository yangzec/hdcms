<?php
/**
 * 数据库备份模块
 * Class BackupControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class BackupControl extends AuthControl
{
    /**
     * 备份列表
     */
    public function index()
    {
        $dir = Dir::tree("./data/backup");
        $this->assign("dir", $dir);
        $this->display();
    }

    /**
     * 数据备份
     */
    public function backup()
    {
        if (IS_POST || Q("get.dirname")) {
            $size = Q("size", 2000000, "intval");
            $table = Q("post.table");
            //备份表结构
            $structure = Q("post.structure", false);
            Backup::backup(array(
                "size" => $size,
                "table" => $table,
                "structure" => $structure,
                "dir" => "./data/" . C("BACKUP_DIR") . '/' . date("Ymdhis")
            ));
        } else {
            $this->assign("table", M()->getTableInfo());
            $this->display();
        }
    }

    /**
     * 还原数据
     */
    public function recovery()
    {
        Backup::recovery("data/backup/" . Q("dir"));
    }

    /**
     * 数据还原成功显示的信息
     */
    public function recoverySuccess()
    {
        O("CacheControl", "all", array("type" => false));
        $this->success("数据还原成功", "index", 1);
    }

    /**
     * 备份完成
     */
    public function backupSuccess()
    {
        $this->success("备份成功", "index", 1);
    }

    /**
     * 优化表
     */
    public function optimize()
    {
        $table = null;
        if (isset($_GET['table'])) {
            $table = array($_GET['table']);
        } elseif (isset($_POST['table'])) {
            $table = $_POST['table'];
        }
        M()->optimize($table);
        $this->_ajax(1);
    }

    /**
     * 修复表
     */
    public function repair()
    {
        $table = null;
        if (isset($_GET['table'])) {
            $table = $_GET['table'];
        } elseif (isset($_POST['table'])) {
            $table = $_POST['table'];
        }
        M()->repair($table);
        $this->_ajax(1);
    }

    /**
     * 删除备份目录
     */
    public function del()
    {
        $dir = $_POST['table'];
        foreach ($dir as $d) {
            if (!Dir::del('./data/backup/' . $d)) {
                $this->_ajax(0);
            }
        }
        $this->_ajax(1);
    }
}

?>