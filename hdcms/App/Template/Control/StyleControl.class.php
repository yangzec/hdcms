<?php
//模板管理模块
class StyleControl extends AuthControl
{
    public function __init()
    {
        parent::__init();
    }

    //模板列表
    public function index()
    {
        $style = array();
        foreach (glob("./template/*") as $tpl) {
            $readme = $tpl . '/readme.txt';
            $arr = array("HDCMS免费模板", "后盾网", "houdunwang.com");
            $arr['img'] = __CONTROL_TPL__ . '/img/default.jpg';
            $arr['dir_name'] = $tpl;
            if (is_file($tpl . '/template.jpg')) {
                $arr['img'] = $tpl . '/template.jpg';
            }
            if (is_file($readme) && is_readable($readme)) {
                $readme = trim(preg_replace('@#.*@im', "", file_get_contents($readme)));
                $arr = preg_split('@\n@', $readme);
            }
            //正在使用的模板
            if (C("WEB_STYLE") == basename($tpl)) {
                $style_cur = $arr;
            } else {
                $style[] = $arr;
            }
        }
        $this->assign("style_cur", $style_cur);
        $this->assign("style", $style);
        $this->display();
    }

    //选择栏目
    public function select_tpl()
    {
        $dir_name = Q("dir_name");
        if ($dir_name) {
            $db = M("config");
            $db->where("name='WEB_STYLE'")->save(array(
                "value" => $dir_name
            ));
            //写入配置文件
            $config = $db->all();
            $data = array();
            foreach ($config as $c) {
                $data[$c['name']] = $c['value'];
            }
            $data = "<?php if (!defined('HDPHP_PATH')) exit; \nreturn " .
                var_export($data, true) . ";\n?>";
            file_put_contents("./data/config/config.inc.php", $data);
            $this->_ajax(1);
        }
    }

    //读取模板栏目
    public function show_dir()
    {

        $dir_name = Q("get.dir_name", "./template/" . C("WEB_STYLE"), "urldecode");
        $dirs = Dir::tree($dir_name, 'html');
        $this->assign("dirs", $dirs);
        $this->display();
    }

    //编辑模板
    public function edit_tpl()
    {
        if (IS_POST) {
            //新文件名
            $new = dirname($_POST['file']) . '/' . $_POST['filename'];
            rename($_POST['filename'], $new);
            if (file_put_contents($new, $_POST['content'])) {
                $this->_ajax(1);
            }

        } else {
            $tpl_name = Q("get.tpl_name", "", "urldecode");
            $content = file_get_contents($tpl_name);
            $field = array("file" => $tpl_name, "filename" => basename($tpl_name), "content" => $content);
            //返回地址
            $field['history_url'] = U("show_dir");
            $this->assign("field", $field);
            $this->display();
        }
    }
}