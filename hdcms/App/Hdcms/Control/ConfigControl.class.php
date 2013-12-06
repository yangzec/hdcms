<?php
class ConfigControl extends AuthControl
{
    protected $db;

    public function __init()
    {
        $this->db = K("Config");
    }

    //修改
    function edit()
    {
        if (IS_POST) {
            //改变允许上传大小为字节
            if (isset($_POST['c19'])) {
                $_POST['c19'] = intval($_POST['c19']) * 1024;
            }
            foreach ($_POST AS $name => $value) {
                $id = substr($name, 1);
                $this->db->save(array("id" => $id, "value" => $value));
            }
            if (!is_writable("./data/config")) {
                $this->_ajax(array("stat" => 0, "msg" => "./data/config目录没有写权限！"));
            } else {
                $config = $this->db->all();
                $data = array();
                foreach ($config as $c) {
                    $data[$c['name']] = $c['value'];
                }
                //写入配置文件
                $data = "<?php if (!defined('HDPHP_PATH')) exit; \nreturn " .
                    var_export($data, true) . ";\n?>";
                file_put_contents("./data/config/config.inc.php", $data);
                $this->_ajax(array("stat" => 1, "msg" => "修改配置文件成功"));
            }
        } else {
            $template = array();
            foreach(glob("./template/*") as $t){
                $template[]=basename($t);
            }
            $db = K("Config");
            $config = $db->all();
            $field = array();
            foreach ($config as $c) {
                $field[$c['id']] = $c;
            }
            $this->assign("template",$template);
            //查找会员组
            $this->assign("group", $db->table("member_group")->all());
            $this->assign("field", $field);
            $this->display();
        }
    }
}