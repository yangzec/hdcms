<?php
/**
 * 生成静态
 * Class HtmlControl
 * @author hdxj
 */
class HtmlControl extends Control
{
    public function abc($a){
        echo $a;
    }
    /**
     * 生成首页
     */
    public function index()
    {
        require "./hdcms/App/Index/Control/IndexControl.class.php";
        ob_start();
        O("IndexControl", "index");
        $content = ob_get_clean();
        if (file_put_contents("./index.html", $content) !== false) {
            echo "<div style='font-size:14px;'>主页生成成功
            <a href='./index.html' target='_blank'>浏览</a>
            </div>";
        } else {
            echo "<div style='font-size:14px;'>主页生成失败，请检查目录权限</div>";
        }
    }

    /**
     * 生成栏目页静态
     */
    public function category()
    {
        $db = M("category");
        $catid = $this->_get("catid", "intval");
        $category = array();
        if ($catid) {
            $category = $db->all($catid);
        } else {
            $category = $db->all();
        }
        p(C());
        //前台栏目控制器
        require "./hdcms/App/Index/Control/CategoryControl.class.php";
        $html_dir=C("htmldir");//静态根目录
        p($category);
    }
}

?>