<?php
/**
 * 显示内容
 * Class ContentControl
 * @category admin
 * @author hdxj
 */
class ArticleControl extends RbacControl
{

    /**
     * 显示文章列表
     */
    public function index()
    {
        $this->showIndex();
    }

    /**
     * 添加文章
     */
    public function add()
    {
        //添加文章神图
        if (isset($_POST['title'])) {
            //添加内容
            $this->addContent();
        } else {
            //添加正文
            $this->addView();
        }
    }

    /**
     * 删除文章
     */
    public function del()
    {
        $this->delArticle();
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

?>