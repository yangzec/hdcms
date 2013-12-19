<?php
/**
 * 自定义JS
 * Class CustomJsControl
 */
class CustomJsControl extends Control
{
    public $db;

    public function __init()
    {
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $this->db = K("CustomJs");
    }

    //读取所有列表
    public function index()
    {
        $tag = $this->db->all();
        $this->assign("tag", $tag);
        $this->display();
    }

    //添加标签
    public function add()
    {
        if (IS_POST) {
            //cid处理
            $_POST['options']['cid'] = empty($_POST['options']['cid']) ? "" : $_POST['options']['cid'];
            if (!empty($_POST['options']['cid'])) {
                $tmp = array();
                foreach ($_POST['options']['cid'] as $cid) {
                    $tmp[] = $cid;
                }
                $_POST['options']['cid'] = implode(",", $tmp);
            }
            //flag属性
            $_POST['options']['flag'] = empty($_POST['options']['flag']) ? "" : $_POST['options']['flag'];
            if (!empty($_POST['options']['flag'])) {
                $tmp = array();
                foreach ($_POST['options']['flag'] as $fid) {
                    $tmp[] = $fid;
                }
                $_POST['options']['flag'] = implode(",", $tmp);
            }
            $options = $_POST['options'];
            //日期格式
            $date_format = empty($_POST['options']['date_format']) ? "Y-m-d" : $_POST['options']['date_format'];
            $_POST['options'] = serialize($_POST['options']);
            $_POST['addtime'] = time();
            $_POST['username'] = $_SESSION['username'];
            if ($aid = $this->db->replace()) {
                $content = '<li>
                <a href="<?php echo get_content_url($field);?>" target="' . $options['target'] . '">
                    [<?php echo date("' . $date_format . '",$field["addtime"]);?>]<?php echo $field["title"]?>
                </a>
                </li>';
                $con = compress(tag("arclist", $options, $content));
                file_put_contents(JS_CACHE_PATH . $aid . '.php', $con);
                $this->_ajax(array("stat" => 1, "msg" => "操作成功"));
            }
        } else {
            $flag = $this->db->table("flag")->all();
            $this->assign("flag", $flag);
            $this->assign("category", $this->category);
            $this->display();
        }
    }

    //修改
    public function edit()
    {
        if (IS_POST) {
            $this->add();
        } else {
            $field = $this->db->find(Q("get.id"));
            $flag = $this->db->table("flag")->all();
            $this->assign("flag", $flag);
            $this->assign("category", $this->category);
            $this->assign("field", $field);
            $this->display();
        }
    }

    //验证js文件是否存在
    public function check_js_file()
    {
        if (!is_file(JS_CACHE_PATH . $_POST['file_name'])) {
            $this->_ajax(1);
        }
    }

    //删除js标签
    public function del()
    {
        $id = Q("get.id", NULL, "intval");
        $this->db->del($id);
        $file = JS_CACHE_PATH . $id . '.php';
        is_file($file) and @unlink($file);
        $this->_ajax(array("stat" => 1, "msg" => "删除JS标签成功"));
    }

    //获得js调用
    public function get_js()
    {
        $id = Q("get.id", NULL, "intval");
        if ($id) {
            $url = __ROOT__ . "/index.php?m=js&id=" . $id;
            $script = "<script src='{$url}' language='javascript'></script>";
            $this->assign("script", $script);
            $this->display();
        }
    }
}























