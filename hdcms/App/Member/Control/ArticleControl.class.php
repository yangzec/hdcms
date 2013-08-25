<?php
require GROUP_PATH . 'Common/Control/CommonControl.class.php';
class ArticleControl extends CommonControl
{
    public function index()
    {
        $mid = $this->_get("mid"); //模型mid
        if (!$this->checkCategoryAccess($mid)) {
            $this->error("没有发布权限", "", 1);
        }
        $this->showIndex(session("username"));
    }

    /**
     * 验证栏目操作权限
     * @param $mid 模型cid
     * @return boolean
     */
    private function checkCategoryAccess($mid)
    {
        if ($_SESSION['type'] == 1) return true;
        return M("category_member_access")->find("issend=1 and mid=$mid and rid=" . $_SESSION['rid']);
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if (isset($_POST['title'])) {
            //添加内容
            $this->addContent();
        } else {
            $mid = $this->_get("mid"); //模型mid
            if (!$this->checkCategoryAccess($mid)) {
                $this->error("没有发布权限", "", 1);
            }
            $data = M("category_member_access")->where("rid=" . $_SESSION['rid'])->all("mid=$mid"); //允许发表的栏目
            $allowCategory = array();
            if ($data) {
                foreach ($data as $d) {
                    $allowCategory[] = $d['cid'];
                }
            }
            $this->assign("allowCategory", $allowCategory);
            //添加正文视图
            $this->addView();
        }
    }

    /**
     * 删除文章
     */
    public function del()
    {
        $mid = $this->_get("mid");
        $aids = $this->_post("aids");
        if ($aids && $mid) {
            foreach ($aids as $aid) {
                $this->delArticle($aid, $mid);
            }
            $this->success("删除文章成功", U("index", array('mid' => $mid)), 1);
        }
    }

    /**
     * 修改文章
     */
    public function edit()
    {
        //添加文章神图
        if (isset($_POST['title'])) {
            //添加内容
            $this->editContent();
        } else {
            //添加正文
            $this->editView();
        }
    }
}
