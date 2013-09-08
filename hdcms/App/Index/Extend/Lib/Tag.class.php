<?php
class Tag
{
    public $tag = array(
        'pagelist' => array('block' => 1, 'level' => 4),
        "pageshow" => array("block" => 0)
    );

    /**
     * 分页显示数据
     * @param $attr
     * @param $content
     * @param $obj
     * @return string
     */
    public function _pagelist($attr, $content, $obj)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10; //列表行数
        $php = '';
        $php .= '<?php $model = M("model")->find($_GET["mid"]);';
        $php .= '$tablename = $model["tablename"];';
        $php .= '$db =K(COMMON_MODEL_PATH."ArticleView",$tablename);';
        $php .= '$page = new Page($db->where("category.cid=".intval($_GET["cid"]))->where("isshow=1")->count(),' . $row . ');';
        $php .= '$result = $db->where("category.cid=".intval($_GET["cid"]))->where("isshow=1")->limit($page->limit())->order("arc_sort desc,updatetime desc")->all();';
        $php .= 'foreach($result as $id=>$hd_field):';
        $php .= '$hd_field["arclist_id"]=$id;';
        $php .= '$hd_field["url"]=getArticleUrl($hd_field);?>';
        $php .= $content;
        $php .= "<?php endforeach;?>";
        return $php;
    }

    /**
     * 显示页码
     */
    public function _pageshow($attr, $content)
    {
        $style = isset($attr['style']) ? $attr['style'] : 2;
        return '<?php echo $page->show(' . $style . ');?>';
    }

    public function _arclist($attr, $content)
    {
        $cid = isset($attr['cid']) ? $attr['cid'] : '';
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $order = isset($attr['order']) ? $attr['order'] : '';
        $field = isset($attr['field']) ? $attr['field'] : ''; //附表字段
        $titlelen = isset($attr['titlelen']) ? $attr['titlelen'] : 16; //标题长度
        //排序
        switch ($order) {
            case "hot":
                $orderSql = "click desc";
                break;
            default:
                $orderSql = "arc_sort desc,updatetime desc";
                break;
        }
        $php = '<?php ';
        if (!$cid) {
            $php .= '$cid=isset($_GET["cid"])?array($_GET["cid"]):"";';
        } else {
            $php .= '$cid=preg_split("@\s*,\s*@", ' . $cid . ');';
        }
        $php .= '$category = M("category")->find(current($cid));';
        $php .= '$model = M("model")->find($category["mid"]);';
        $php .= '$db=K(COMMON_MODEL_PATH."ArticleView",$model["tablename"]);';
        $php .= 'if ("' . $cid . '") {$db->where("category.cid in(\'' . $cid . '\')");}';
        $php .= '$db->field("' . $field . '");';
        $php .= '$db->order("' . $orderSql . '");';
        $php .= '$db->limit(' . $row . ');';
        $php .= '$result = $db->all();';
        $php .= 'foreach ($result as $id=>$hd_field):';
        $php .= '$hd_field["arclist_id"]=$id+1;';
        $php .= '$hd_field["url"]=getArticleUrl($hd_field);'; //链接
        $php .= '$target = $hd_field["new_window"]?" target=\'_blank\'":"";'; //新窗口打开
        $php .= '$hd_field["title"]=$hd_field["color"]?"<font color=\'".$hd_field["color"]."\'>".mb_substr($hd_field["title"],0,' . $titlelen . ',"utf-8")."</font>":mb_substr($hd_field["title"],0,' . $titlelen . ',"utf-8");';
        $php .= '$hd_field["link"]="<a href=\'".$hd_field["url"]."\' $target>".$hd_field["title"]."</a>";?>';
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }

    /**
     * 项目显示
     * @param $attr
     * @param $content
     * @return string
     */
    public function _prolist($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $php = "";
        $php .= '<?php $db=M("project");';
        $php .= '$result = $db->limit(' . $row . ')->where("pro_pic1!=\'\'")->all();';
        $php .= 'foreach ($result as $id=>$hd_field):';
        $php .= '$hd_field["arclist_id"]=$id+1;';
        $php .= '$hd_field["pro_pic1"]="__ROOT__/".$hd_field["pro_pic1"];';
        $php .= '$hd_field["url"]=getArticleUrl($hd_field);'; //链接
        $php .= '$target = $hd_field["new_window"]?" target=\'_blank\'":"";'; //新窗口打开
        $php .= '$hd_field["title"]=$hd_field["color"]?"<font color=\'".$hd_field["color"]."\'>".$hd_field["title"]."</font>":$hd_field["title"];';
        $php .= '$hd_field["link"]="<a href=\'".$hd_field["url"]."\' $target>".$hd_field["title"]."</a>";?>';
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }

    //就业达人
    public function _jiuye($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $where = $attr["where"]; //工资
        $php = '';
        $php .= '<?php $db = K(COMMON_MODEL_PATH."ArticleView","ofschool");';
        $php .= '$result= $db->where("' . $where . '")->order("xinzi desc")->limit(' . $row . ')->all();';
        $php .= 'foreach($result as $hd_field):?>';
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }

    //开学学生介绍视频
    public function _kaixue($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $php = "";
        $php .= '<?php $db=M("kaixue");';
        $php .= '$result = $db->limit(' . $row . ')->where("pic!=\'\'")->all();';
        $php .= 'foreach ($result as $id=>$hd_field):';
        $php .= '$hd_field["arclist_id"]=$id+1;';
        $php .= '$hd_field["pic"]="__ROOT__/".$hd_field["pic"];';
        $php .= '$hd_field["url"]=getArticleUrl($hd_field);'; //链接
        $php .= '$target = $hd_field["new_window"]?" target=\'_blank\'":"";'; //新窗口打开
        $php .= '$hd_field["title"]=$hd_field["color"]?"<font color=\'".$hd_field["color"]."\'>".$hd_field["title"]."</font>":$hd_field["title"];';
        $php .= '$hd_field["link"]="<a href=\'".$hd_field["url"]."\' $target>".$hd_field["title"]."</a>";?>';
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }
}