<?php
/**
 * 后台管理页面
 * Class IndexControl
 * @category Admin
 * @author hdxj
 */
class IndexControl extends Control
{
    function index()
    {
        header("Content-type:text/html;charset=utf-8");
        $this->assign("model",M("model")->all());
        $this->display();
    }
    /**
     * 后台默认显示界面欢迎界面
     */
    public function welcome(){
        $this->display();
    }


}

?>