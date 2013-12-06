<?php
/**
 * 后台管理页面
 * Class IndexControl
 * @category Admin
 * @author hdxj
 */
class IndexControl extends AuthControl
{
    protected $db; //内容模型对象
    public function __init()
    {
        parent::__init();
        $this->db = K("Menu");
    }

    //后台首页
    function index()
    {
        //获得顶级菜单
        $top_menu = $this->db->get_top_menu();
        //获得常用菜单
        $favorite_menu = $this->db->get_favorite_menu();
        $this->assign("top_menu", $top_menu);
        $this->assign("favorite_menu", $favorite_menu);
        $this->display();
    }

    /**
     * 后台默认显示界面欢迎界面
     */
    public function welcome()
    {
        $this->display();
    }


}

?>