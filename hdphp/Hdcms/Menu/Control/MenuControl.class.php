<?php

/**
 * 后台菜单管理模块
 * Class MenuControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class MenuControl extends AuthControl
{
    //模型
    protected $db;

    public function __init()
    {
        parent::__init();
        //获得模型实例
        $this->db = K("Menu");
    }

    //获得子菜单
    public function get_child_menu()
    {
        $nid = Q("get.nid", NULL, "intval");
        $menu = $this->db->get_child_menu($nid);
        $html = "";
        $html .= "<div class='nid_$nid'>";
        foreach ($menu as $t) {
            $html .= "<dl><dt>" . $t['title'] . "</dt>";
            if ($t['data']) {
                foreach ($t['data'] as $d) {
                    $url = __ROOT__ . "/index.php?a=" . $d['app'] . "&c=" . $d['control'] . "&m=" . $d['method'];
                    $html .= "<dd><a nid='" . $d["nid"] . "' href='javascript:;'
                    onclick='get_content(this," . $d["nid"] . ")' url='" . $url . "'>"
                        . $d['title'] . "</a></dd>";
                }
            }
            $html .= "</dl>";
        }
        $html .= "</div>";
        $this->_ajax($html, 'text');
    }

    //设置常用菜单
    public function set_favorite()
    {
        if (IS_POST) {
            $db = M("node");
            if (empty($_POST['nid'])) {
                $db->where("favorite=1")->save(array("favorite" => 0));
            } else {

                $db->where("1=1")->update(array("favorite" => 0));
                foreach ($_POST['nid'] as $nid) {
                    $db->save(array("nid" => $nid, "favorite" => 1));
                }
            }
            $this->_ajax(1);
        } else {
            //查找所有2级菜单
            $menu2 = $this->db->join(NULL)->where("level=2")->order("list_order DESC")->all();
            foreach ($menu2 as $n => $m) {
                $menu3 = $this->db->join(NULL)->where(array("pid" => $m['nid']))->order("list_order DESC")->all();
                foreach ($menu3 as $k => $v) {
                    //是否为常用菜单
                    $checked = $v['favorite'] == 1 ? "checked='checked'" : "";
                    $menu3[$k]['html'] = "<label><input type='checkbox' name='nid[]' value='{$v['nid']}' {$checked}/> {$v['title']}</label>";
                }
                $menu2[$n]['data'] = $menu3;
                $menu2[$n]['html'] = "<label><input type='checkbox' /> {$m['title']}</label>";
            }
            $this->assign("menu", $menu2);
            $this->display();
        }
    }
}