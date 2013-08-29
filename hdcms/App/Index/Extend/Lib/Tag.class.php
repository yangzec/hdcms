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
        $php .= '$db =V($tablename);';
        $php .= '$db->view = array();';
        $php .= '$db->view["category"]=array(
            "on"=>"$tablename.cid=category.cid"
        );';
        $php .= 'if($model["type"]==1){
                    $db->view[$tablename."_data"]=array(
                           "type" => "inner",
                           "on" => "$tablename.aid=".$tablename."_data.aid",
                    );
                }';
        $php .= '$count = $db->where($tablename.".cid=".$_GET["cid"])->count();';
        $php .= '$page = new Page($count,' . $row . ');';
        $php .= '$result = $db->where($tablename.".cid=".$_GET["cid"])->limit($page->limit())->all();';
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
        return '<?php echo $page->show();?>';
    }

    public function _arclist($attr, $content)
    {
        $cid = isset($attr['cid']) ? $attr['cid'] : '';
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $order = isset($attr['order']) ? $attr['order'] : '';
        $field = isset($attr['field']) ? $attr['field'] : ''; //附表字段
        //排序
        switch ($order) {
            case "hot":
                $orderSql = "click desc";
                break;
            default:
                $orderSql = "updatetime desc";
                break;
        }
        $php = '<?php ';
        if (!$cid) {
            $php .= '$cid=isset($_GET["cid"])?array($_GET["cid"]):"";';
        } else {
            $php .= '$cid=preg_split("@\s*,\s*@", ' . $cid . ');';
        }
        $php .= 'if (!$cid) { //栏目cid为空
            $db = V("article");
            //如果设置了自定义字段，查找附表自定义字段
            ';
        if ($field) {
            $php .= '$db->view = array(
                    "article_data" => array(
                        "field" => $field,
                        "on" => "article.aid=article_data.aid"
                    )
                );';
        }
        $php .= '$result = $db->order("' . $orderSql . '")->limit(' . $row . ')->all();
        } else {
            $category = M("category")->find(current($cid));
            $model = M("model")->find($category["mid"]); //当前栏目所属模型信息
            $table_name = $model["tablename"]; //主表名
            $db = V($table_name);';
        if ($field) {
            $php .= 'if ($model["type"] == 1) {
                        $db->view = array();
                        $db->view[$table_name . "_data"] = array(
                            "field" => $field,
                            "on" => "$table_name.aid=".$table_name."_data.aid"
                        );
                    }';
        }
        $php .= '$result = $db->in(array($table_name.".cid" => $cid))->order("' . $orderSql . '")->limit(' . $row . ')->all();';
        $php .= '}';
        $php .= 'foreach ($result as $id=>$hd_field):';
        $php .= '$hd_field["arclist_id"]=$id+1;';
        $php .= '$hd_field["url"]=getArticleUrl($hd_field);'; //链接
        $php .= '$target = $hd_field["new_window"]?" target=\'_blank\'":"";'; //新窗口打开
        $php .= '$hd_field["title"]=$hd_field["color"]?"<font color=\'".$hd_field["color"]."\'>".$hd_field["title"]."</font>":$hd_field["title"];';
        $php .= '$hd_field["link"]="<a href=\'".$hd_field["url"]."\' $target>".$hd_field["title"]."</a>";?>';
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }
}