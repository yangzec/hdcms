<?php
class CategoryControl extends RbacControl
{
    /**
     * 显示栏目列表
     */
    public function index()
    {
        $this->assign("category", F("category", false, './data/category'));
        $this->display();
    }

    /**
     * 显示内容列表
     * 点击栏目名后，根据当前栏目所属模型的控制器文件，显示当前栏目内容列表
     */
    public function showContentList()
    {
        $cid = $this->_get("cid", "intval");
        $cid or exit;
        $cat = M("category")->find($cid);
        $model = M("model")->find($cat['mid']);
        go(U($model['control'] . '/index', array("cid" => $cid, "mid" => $cat['mid'])));
    }

    /**
     * 添加栏目到表
     */
    public function add()
    {
        //添加栏目
        if (isset($_POST['catname'])) {
            $db = M("category");
            $db->add();
            O("CacheControl", "category");
            $this->success("栏目添加成功", "index");
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
        if (isset($_POST['catname'])) {
            $db->save();
            O("CacheControl", "category");
            $this->success("编辑成功","index");
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
        O("CacheControl", "category");
        $this->success("更新栏目缓存成功", "index");

    }

    /**
     * 选择模板
     */
    public function selectTpl()
    {
        $db = M("system");
        $tpl_style = $db->where("name='style'")->find();
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
        $cid = $this->get("cid", "intval");
        $cid or exit(0);
        $db = M("category");
        //删除栏目
        $db->where("cid=$cid")->del();
        //删除文章(
        $db->table("news")->where("cid=$cid")->del();
        //删除文章正文
        $db->table("news_data")->where("cid=$cid")->del();
        echo 1;
        exit;
    }

    /**
     * 验证静态目录html_dir是否已经在使用
     */
//    public function checkHtmlDir()
//    {
//        $dir = $this->_post("html_dir");
//        if (!M("category")->where("html_dir='$dir'")->find()) {
//            echo 1;
//            exit;
//        }
//
//    }

}

?>