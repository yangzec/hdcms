<?php
class CategoryControl extends RbacControl
{
    /**
     * 显示栏目列表
     */
    function index()
    {
        $this->assign("category", F("category", false, './data/category'));
        $this->display();
    }

    /**
     * 添加栏目到表
     */
    public function add()
    {
        //添加栏目
        if (isset($_POST['submit'])) {
            $db = M("category");
            if ($db->add()) {
                O("CacheControl", "category");
                $this->success("栏目添加成功", "index");
            } else {
                $this->error("栏目添加失败", "index");
            }
        } else {
            $this->assign("model", F("model", false, './data/model'));
            $this->display();
        }
    }

    /**
     * 编辑栏目
     */
    public function edit()
    {
        $db = M("category");
        //添加栏目
        if (isset($_POST['submit'])) {
            if ($db->save()) {
                O("CacheControl", "category");
                $this->success("栏目添加成功", "index");
            } else {
                $this->error("栏目添加失败", "index");
            }
        } else {
            $field = $db->where("cid=" . $this->_get("cid"))->find();
            $this->assign("field", $field);
            $this->assign("model", F("model", false, './data/model'));
            $this->display();
        }
    }

    /**
     * 更新栏目缓存
     */
    public function updateCache()
    {
        if (O("CacheControl", "category")) {
            $this->success("更新栏目缓存成功", "index");
        }
    }

    /**
     * 选择模板
     */
    public function selectTpl()
    {
        $db = M("system");
        $tpl_style = $db->where("name='tpl_style'")->find();
        $dir = isset($_GET['dir']) ? base64_decode($_GET['dir']) : "./template/" . $tpl_style['value'];
        $files = Dir::tree($dir, "html");
        $this->assign("tpl_style", $tpl_style['value']);
        $this->assign("files", $files);
        $this->display();
    }

    /**
     * 检测栏目移动
     * 返回值为true，表示目标栏目是当前栏目的子栏目，不可以移动
     * @param $s_cid 源cid(子)
     * @param $d_cid 移动目标cid(父）
     * @return bool
     */
    private function isChild($s_cid, $d_cid)
    {
        $db = M("category");
        //将要移动的栏目是目标栏目的父级，不允许移动
        return Data::is_child($db->all(), $_POST['cid'], $_POST['pid']);
    }

    /**
     * 删除栏目
     */
    public function del()
    {
        $cid = $_GET['cid'];
        $db = M("category");
        //删除栏目
        if ($db->where("cid=$cid")->del()) {
            //删除文章
            if ($db->table("news")->where("cid=$cid")->del()) {
                //删除文章正文
                if ($db->table("news_data")->where("cid=$cid")->del()) {

                }
            }
            exit(1);
        } else {
            exit(0);
        }
    }

}

?>