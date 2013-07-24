<?php
/**
 * 独立模型
 * Class ArticleSingleControl
 * @category admin
 * @author hdxj houdunwangxj@gmail.com
 */
class ArticleSingleControl extends RbacControl
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
        //添加文章
        if (isset($_POST['title'])) {
            //添加内容
            $this->addContent();
            $this->success("添加文章成功", U("index","mid=".$_POST['mid']));
        } else {
            //添加正文
            $this->addView();
        }
    }
}