<?php
/**
 * 网站前台处理模块
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */

class IndexControl extends CommonControl
{
    //网站模板风格
    private $tpl_path;
    //栏目id
    private $cid;
    //文章id
    public $aid;
    //文章主表
    private $table;
    //模型缓存
    private $model;
    //栏目缓存
    private $category;

    public function __construct()
    {
        parent::__init();
        $this->check_web_stat();
        $this->model = F("model", false, MODEL_CACHE_PATH);
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        //模板风格路径
        $this->tpl_path = "./template/" . C("WEB_STYLE") . '/';
        //模板风格url
        $this->tpl_url = __ROOT__ . "/template/" . C("WEB_STYLE") . '/';
        //分配模板目录
        defined("__TEMPLATE__") or define("__TEMPLATE__", $this->tpl_url);
        $this->cid = Q("get.cid", null, "intval");
        $this->aid = Q("get.aid", null, "intval");
        if ($this->cid) {
            $this->table = $this->model[$this->category[$this->cid]['mid']]['tablename'];
        }
    }

    //网站是否关闭
    private function check_web_stat()
    {
        if (C("web_open") == 0 && !isset($_SESSION['rid'])) {
            $this->display("./data/Template/web_close");
            exit;
        }
    }

    //网站首页
    public function index()
    {
        $this->display($this->tpl_path . 'index.html');
    }

    //内容页
    public function content()
    {

        if ($this->aid) {
            $db = new ContentViewModel();
            $field = $db->where($db->tableFull . ".aid=" . $this->aid)->find();
            if ($field) {
                $field['caturl'] = U("category", array("cid" => $field['cid']));
                $this->assign("hdcms", $field);
                $tpl = get_content_tpl($this->aid);
                if (is_file($tpl))
                    $this->display($tpl);
            }
        }
    }

    //显示栏目列表
    public function category()
    {
        if ($this->cid) {
            $field = M("category")->find($this->cid);
            $this->assign("hdcms", $field);
            $tpl = get_category_tpl($this->cid);
            if (is_file($tpl))
                $this->display($tpl);
        }
    }

    //修改文章点击次数
    public function updateClick()
    {
        $model = M("model")->find($this->_get("mid", "intval"));
        $table = $model['tablename'];
        $aid = $this->_get("aid", "intval");
        $data = array(
            "aid" => $aid,
            "click" => "click+1"
        );
        $db = M($table);
        $db->inc("click", "aid=$aid", 1);
        $field = $db->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }

    //修改点击数
    public function get_click()
    {
        $aid = Q("aid", NULL, "intval");
        $this->db = K("Content");
        $this->db->join(NULL)->inc("click", "aid=$aid", 1);
        $field = $this->db->JOIN(NULL)->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }
}

?>