<?php
/**
 * 后台首页
 * Class IndexControl
 * @category Admin
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends AuthControl
{
    //内容模型对象
    protected $db;

    public function __init()
    {
        C("DEBUG_SHOW",0);
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

    //反馈
    public function feedback()
    {
        $this->display();
    }


}

?>