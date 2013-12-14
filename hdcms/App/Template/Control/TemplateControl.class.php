<?php
//栏目Category与文章管理时模板的选择操作控制器
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
        $dir = Q("get.path", $template_style, "base64_decode");
        $file = Dir::tree($dir, "html");
        foreach ($file as $n => $v) {
            if ($v['type'] == 'dir') {
                $file[$n]['path'] = base64_encode($v['path']);
            } else {
                $file[$n]['path'] = str_replace($template_style, '{style}', $v['path']);
            }
        }
        $history = "";
        if (Q("get.path")) {
            if ($dir == $template_style) {
                $history = "";
            } else {
                $history = __METH__ . '&path=' . base64_encode(dirname($dir));
            }
        }
        $this->assign("history", $history);
        $this->assign("file", $file);
        $this->display();
    }
}