<?php
class TemplateControl extends SystemControl
{
    /**
     * 模板风格列表
     */
    public function index()
    {
        /******debug*****/
//        $arr=array(
//            "title"=>"后盾网主题",
//            "desc"=>"这是一个练习用的模板文件",
//            "author"=>"后盾向军",
//            "time"=>"2013-2-22",
//            "email"=>"houdunwangxj@gmail.com",
//            "pic"=>"thumb.jpg"
//        );
//        file_put_contents("./template/default/doc.xml",xml::create($arr));
        /******debug*****/
        $tpl = Dir::tree("template");
        //默认模板图片，当模板没有缩略图时用
        $default_pic = './data/img/tpl.jpg';
        foreach ($tpl as $k => $v) {
            $xml = $v['path'] . '/config.xml';
            //读取模板配置
            if (is_file($xml) and is_readable($xml)) {
                $doc = Xml::toArray(file_get_contents($xml));
                $tpl[$k]['title'] = isset($doc['title']) ? $doc['title'][0] : "";
                $tpl[$k]['desc'] = isset($doc['desc']) ? $doc['desc'][0] : "";
                $tpl[$k]['author'] = isset($doc['author']) ? $doc['author'][0] : "";
                $tpl[$k]['time'] = isset($doc['time']) ? $doc['time'][0] : "";
                $tpl[$k]['qq'] = isset($doc['qq']) ? $doc['qq'][0] : "";
                $tpl[$k]['pic'] = isset($doc['pic']) && is_file($v['path'] . '/' . $doc['pic'][0]) ? __ROOT__ . '/template/' . $v['name'] . '/' . $doc['pic'][0] : '';
            }
            $tpl[$k]['pic'] = empty($tpl[$k]['pic']) ? __ROOT__ . "/data/img/tpl_thumb.png" : $tpl[$k]['pic'];
        }
        $this->assign("tpl", $tpl);
        //分配当前配置表中的风格
        $conf = M("system")->find("name='style'");
        $this->assign("conf", $conf);
        $this->display();
    }

    public function updateStyle()
    {
        $style = $_POST['style'];
        $db = M("system");
        $db->where("name='style'")->save(array("value" => $style));
        //修改缓存文件
        $conf = $db->all();
        $cacheData = array();
        foreach ($conf as $c) {
            $cacheData[$c['name']] = $c['value'];
        }
        $config_file = "./data/config/base.inc.php";
        $this->save($config_file, $cacheData);
        $this->_ajax(1);
    }
}