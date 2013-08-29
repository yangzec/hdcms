<?php
/**
 * 数据库备份类
 * Class BackupControl
 * @category Admin
 * @author hdxj houdunwangxj@gmail.com
 */
class BackupControl extends RbacControl
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
        //备份数据
        if (isset($_GET['action']) && $_GET['action'] == 'backup') {
            $time = $this->_post("time", "intval", 2);
            $row = $this->_post("row", "intval", 200);
            $table = $this->_post("table");
            if ($table) {
                Backup::backup(array(
                        "url" => "backupSuccess",
                        "step_time" => $time,
                        "row" => $row,
                        "table" => $table,
                        "dir" => "./data/backup/" . time())
                );
            } else {
                Backup::backup(array(
                    "url" => "backupSuccess"
                ));
            }
        } else {
            $this->assign("table", M()->getTableInfo());
            $this->display("table_list");
        }
    }

    /**
     * 还原数据
     */
    public function recovery()
    {
        $dir = $this->_get("dir");
        Backup::recovery(array(
                "dir" => "./data/backup/" . $dir,
                "step_time" => 2,
                "url" => "recoverySuccess")
        );
    }

    /**
     * 数据还原成功显示的信息
     */
    public function recoverySuccess()
    {
        O("CacheControl", "all", array("type" => false));
        $this->success("数据还原成功", "index",1);
    }

    /**
     * 备份完成
     */
    public function backupSuccess()
    {
        $this->success("备份成功", "index",1);
    }

    /**
     * 优化表
     */
    public function optimize()
    {
        $table = null;
        if (isset($_GET['table'])) {
            $table = $_GET['table'];
        } elseif (isset($_POST['table'])) {
            $table = $_POST['table'];
        }
        M()->optimize($table);
        $this->success("表优化完成","backup",1);
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
        $this->success("表修复完成","backup",1);
    }

    /**
     * 删除备份目录
     */
    public function delBackupDir()
    {
        if (!isset($_POST['dir'])) {
            $this->error("请选择删除的目录");
        }
        $dir = $_POST['dir'];
        foreach ($dir as $d) {
            if (!Dir::del('./data/backup/' . $d)) {
                $this->error("删除目录失败，请修改./data/backup目录权限");
            }
        }
        $this->success("删除目录成功", "index",1);
    }
}

?>