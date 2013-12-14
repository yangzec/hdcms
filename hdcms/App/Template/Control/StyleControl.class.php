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
            $arr = array("HDCMS免费模板", "后盾网", "houdunwang.com");
            //模板目录名
            $arr['dir_name'] = basename($tpl);
            //模板缩略图
            if (is_file($tpl . '/template.jpg')) {
                $arr['img'] = $tpl . '/template.jpg';
            } else {
                $arr['img'] = __CONTROL_TPL__ . '/img/default.jpg';
            }
            $readme = $tpl . '/readme.txt';
            if (is_file($readme) && is_readable($readme)) {
                $readme = trim(preg_replace('@#.*@im', "", file_get_contents($readme)));
                $arr = preg_split('@\n@', $readme);
            }
            //正在使用的模板
            if (C("WEB_STYLE") == $arr['dir_name']) {
                $style_cur = $arr;
            } else {
                $style[] = $arr;
            }
        }
        $this->assign("style_cur", $style_cur);
        $this->assign("style", $style);
        $this->display();
    }

    //选择模板（使用模板）
    public function select_tpl()
    {
        $dir_name = Q("dir_name");
        $db = K("Config");
        if ($dir_name) {
            $db->join()->where("name='WEB_STYLE'")->save(array(
                "value" => $dir_name
            ));
            //更新配置文件
            $db->update_config_file();
            $this->_ajax(1);
        }
    }

    //读取模板目录
    public function show_dir()
    {
        $dir_name = "./template/" . Q("get.dir_name", C("WEB_STYLE"));
        $dirs = Dir::tree($dir_name, 'html');
        $this->assign("dirs", $dirs);
        $this->display();
    }

    //编辑模板
    public function edit_tpl()
    {
        if (IS_POST) {
            //检测模板文件写权限
            if (!is_writable($_POST['file_path'])) {
                $this->_ajax(2);
            }
            //新文件名
            $new = dirname($_POST['file_path']) . '/' . $_POST['file_name'] . '.html';
            //修改文件名
            rename($_POST['file_path'], $new);
            //修改模板内容
            if (file_put_contents($new, $_POST['content'])) {
                $this->_ajax(1);
            }
        } else {
            $file_path = Q("get.file_path", "", "urldecode");
            $content = file_get_contents($file_path);
            //模板文件详细信息
            $info = pathinfo($file_path);
            $field = array(
                "file_path" => $file_path,
                "file_name" => $info['filename'],
                "content" => $content
            );
            $this->assign("field", $field);
            $this->display();
        }
    }
}