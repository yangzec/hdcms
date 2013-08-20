<?php
class Tag
{
    public $tag = array(
        'pagelist' => array('block' => 1, 'level' => 4),
        "pageshow"=>array("block"=>0)
    );

    public function _pagelist($attr, $content, $obj)
    {
        $row = isset($attr['row'])?$attr['row']:10;//列表行数
        $php='';
        $php.='<?php $model = M("model")->find($_GET["mid"]);';
        $php.='$tablename = $model["tablename"];';
        $php.='$db =V($tablename);';
        $php.='$db->view = array();';
        $php.='$db->view["category"]=array(
            "on"=>"$tablename.cid=category.cid"
        );';
        $php.='if($model["type"]==1){
                    $db->view[$tablename."_data"]=array(
                           "type" => "inner",
                           "on" => "$tablename.aid=".$tablename."_data.aid",
                    );
                }';
        $php.='$count = $db->where($tablename.".cid=".$_GET["cid"])->count();';
        $php.='$page = new Page($count,'.$row.');';
        $php.='$result = $db->where($tablename.".cid=".$_GET["cid"])->limit($page->limit())->all();';
        $php.='foreach($result as $hd_field):';
        $php.='$hd_field["url"]=getArticleUrl($hd_field);?>';
        $php.=$content;
        $php.="<?php endforeach;?>";
        return $php;
    }

    /**
     * 显示页码
     */
    public function _pageshow($attr,$content){
        return '<?php echo $page->show();?>';
    }
}