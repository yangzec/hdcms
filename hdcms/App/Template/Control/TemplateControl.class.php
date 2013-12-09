<?php
class TemplateControl extends AuthControl
{
    public function __init()
    {
        parent::__init();
    }

    //选择模板
    public function select_tpl()
    {
        $template_style = ROOT_PATH . 'template/' . C("WEB_STYLE");
        $input_id = Q("get.input_id");
        $dir = Q("get.path", $template_style, "", "base64_decode");
        $file = Dir::tree($dir, "html");
        foreach ($file as $n => $v) {
            if ($v['type'] == 'dir') {
                $file[$n]['path'] = base64_encode($v['path']);
            } else {
                $file[$n]['path'] = str_replace($template_style, '{style}', $v['path']);
            }
        }
        $this->assign("input_id", $input_id);
        $this->assign("file", $file);
        $this->display();
    }
}