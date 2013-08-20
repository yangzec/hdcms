<?php
/**
 * 后台管理页面
 * Class IndexControl
 * @category Admin
 * @author hdxj
 */
class IndexControl extends RbacControl
{
    function index()
    {
        $this->assign("model", M("model")->all());
        $this->display();
    }

    /**
     * 后台默认显示界面欢迎界面
     */
    public function welcome()
    {
        $this->assign("article", M("article")->limit(6)->order("aid desc")->all());
        $this->display();
    }


}

?>