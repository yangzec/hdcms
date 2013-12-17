<?php
/**
 * 菜单管理
 * Class MenuModel
 * @author hdxj <houdunwangxj@gmail.com>
 */

class NodeModel extends ViewModel
{
    public $table = "node";
    //节点缓存
    public $node;
    //角色rid
    public $rid;
    //关联权限表
    public $view = array(
        'access' => array(
            'type' => INNER_JOIN,
            "on" => "node.nid=access.nid",
        )
    );

    public function __construct()
    {
        parent::__construct();
        $this->rid = session("rid");
        $this->node = F("node", false, NODE_CACHE_PATH);
    }

    //自动验证
    public $validate = array(
        array("title", "nonull", "菜单名称不能为空", 2, 3),
        array("app", "nonull", "项目不能为空", 1, 3),
        array("control", "nonull", "模块不能为空", 1, 3),
        array("method", "nonull", "方法不能为空", 1, 3),
    );
    //自动完成
    public $auto = array(
        array("param", "menu_param", 2, 3, "method"),
        array("level", "auto_level", 2, 3, "method"),
        array("app", "auto_action", 2, 3, "method"),
        array("control", "auto_action", 2, 3, "method"),
        array("method", "auto_action", 2, 3, "method"),
    );

    //根据nid获得level
    private function get_level($nid)
    {
        if ($nid == 0) {
            return 0;
        } else {
            $db = M("node");
            $level = $db->field("level")->where(array("nid" => $nid))->find();
            return $level['level'];
        }
    }

    //app control method自动完成
    public function auto_action($v)
    {
        $level = $this->get_level(intval($_POST['pid']));

        return $level != 2 ? "" : $v;
    }

    //level字段自动完成
    public function auto_level()
    {
        $pid = intval($_POST['pid']);
        $level = $this->get_level($pid);
        return $level + 1;
    }

    //URL参数处理
    public function menu_param($param)
    {
        $pid = $_POST['pid'];
        if ($pid == 0) return 1;
        $n = M("node")->field("level")->find($pid);
        return $n['level'] + 1;
    }

    //更新缓存
    function update_cache()
    {
        $data = $this->join(NULL)->where("status=1")->order(array("list_order" => "DESC"))->all();
        $data = Data::channelList($data, 0, "─", 'nid');
        $node = array();
        foreach ($data as $d) {
            $d['name'] = $d['title'];
            $node[$d['nid']] = $d;
        }
        $node = Data::tree($node, "name", "nid", "pid");
        //树状格式化
        F("node", $node, NODE_CACHE_PATH);
    }

    function __after_add()
    {
        $this->update_cache();
    }

    function __after_update()
    {
        $this->update_cache();
    }

    function __after_del()
    {
        $this->update_cache();
    }

}























