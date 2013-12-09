<?php
/**
 * Admin应用标签库
 * Class AdminTag
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ContentTag
{
    public $tag = array(
        'treeview' => array('block' => 0),
        'channel' => array('block' => 1, 'level' => 4),
        'arclist' => array('block' => 1, 'level' => 4),
        'comment' => array('block' => 1, 'level' => 4),
        'pagelist' => array('block' => 1, 'level' => 4),
        'pageshow' => array('block' => 0)
    );

    public function _comment($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $php = <<<str
            <?php \$db = K("comment");
        \$result = \$db->limit($row)->field("user.uid,username,realname,comment_id,comment,aid,cid")->where("c_status=1")->order("comment_id DESC")->all();
        foreach (\$result as \$field):
        \$field['url'] = '__WEB__?a=Content&c=Index&m=content&cid='.\$field['cid'].'&aid='.\$field['aid'].'#'.\$field['comment_id'];?>
str;
        $php .= $content;
        $php .= <<<str
        <?php
        endforeach;
        ?>
str;
        return $php;
    }

    //栏目标签
    public function _channel($attr, $content)
    {
        //类型  top 顶级 son 下级 self同级 current 指定的栏目
        $type = isset($attr['type']) ? $attr['type'] : "self";
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $cid = isset($attr['cid']) ? $attr['cid'] : NULL;
        $php = <<<str
        <?php
        \$where = '';\$type='$type';\$cid="$cid";\$row=$row;

        \$db = M("category");
        if (\$type == "top") {
            \$where .= " pid=0 ";
        }else if (!empty(\$cid)) {
            if(\$type=='current'){
                 \$where = " cid in(".\$cid.")";
            }else{
                \$cid=intval(\$cid);
                \$cat = \$db->find(\$cid);
                if(\$cat){
                    switch (\$type) {
                        case "son":
                                \$where = " pid=".\$cat['cid'];
                                break;
                        case "self":
                                \$where = " pid=".\$cat['pid'];
                                break;
                        case "one":
                                \$where = " cid=".\$cat['cid'];
                                break;
                    }
                }
            }
        }
        \$result = \$db->where(\$where)->where("cat_show=1")->order()->where(\$where)->order("catorder DESC")->limit(\$row)->all();
        foreach (\$result as \$field):
            \$field['url'] = get_category_url(\$field);?>
str;
        $php .= $content;
        $php .= <<<str
        <?php
        endforeach;
        ?>
str;
        return $php;

    }

    //数据块
    public function _arclist($attr, $content)
    {
        $cid = isset($attr['cid']) ? $attr['cid'] : "";
        $listtype = isset($attr['listtype']) ? $attr['listtype'] : "";
        $aid = isset($attr['aid']) ? $attr['aid'] : "";
        $mid = isset($attr['mid']) ? $attr['mid'] : 1;
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        $infolen = isset($attr['infolen']) ? intval($attr['infolen']) : 80;
        $flag = isset($attr['flag']) ? intval($attr['flag']) : "";
        $php = "";
        $php .= <<<str
        <?php \$mid="$mid";\$cid ="$cid";\$listtype ="$listtype";\$flag='$flag';\$aid='$aid';
            \$_GET['mid']="$mid";
            if(empty(\$cid)){
                \$cid= isset(\$_GET['cid'])?intval(\$_GET['cid']):null;
            }
            \$db = new ContentViewModel();
            if(\$db->table){
                //主表
                \$table=\$db->table;
                if(!empty(\$flag)){
                    \$db->in(array("fid" => \$flag));
                }
                if (\$cid) {
                    //查找栏目与子栏目
                    if(\$listtype=='all'){
                        \$tmp =M("category")->field("cid")->where("path like '%".\$cid."_%' or cid=\$cid")->all();
                        \$cid=array();
                        foreach(\$tmp as \$t){
                            \$cid[]=\$t['cid'];
                        }
                    }
                    \$db->in(array("category.cid" => \$cid));
                }
                if (\$aid) {
                    \$db->where=\$table.".aid=".\$aid;
                }
                \$db->where="status=1";
                \$db->group=\$table.".aid";
                \$db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
                \$db->limit($row);
                \$result = \$db->order("aid DESC")->all();
                foreach(\$result as \$field):
                    \$field['caturl']=U('category',array('cid'=>\$field['cid']));
                    \$field['url']="__ROOT__/".\$field['url'];
                    \$field['thumb']='__ROOT__'.'/'.\$field['thumb'];
                    \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
                    ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;';
        $php .= '}?>';
        return $php;
    }

    //分页列表
    public function _pagelist($attr, $content)
    {
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        $cid = Q("get.cid");
        $infolen = isset($attr['infolen']) ? intval($attr['infolen']) : 80;
        $flag = isset($attr['flag']) ? intval($attr['flag']) : "";
        $php = '';
        if (!$cid) return "";
        $php .= <<<str
        <?php \$cid='$cid';\$flag='$flag';
        \$db = new ContentViewModel(null,\$cid);
        if(\$flag){
            \$count = \$db->table("content_flag")->where("cid=\$cid")->count();
        }else{
            \$count = \$db->join(NULL)->where("cid=\$cid")->count();
        }
        \$hd_page= new Page(\$count,$row);
        \$field ="aid,category.cid,thumb,click,source,author,addtime,updatetime,username,url,catname,title";
        \$result= \$db->join("category")->field(\$field)->where(\$where_flag)->where("status=1")->where("category.cid=$cid")
        ->group("aid")->limit(\$hd_page->limit())->all();
//        p(\$db->getallsql());exit;
        foreach(\$result as \$field):
                \$field['caturl']=U('category',array('cid'=>\$field['cid']));
                \$field['url']="__ROOT__/".\$field['url'];
                \$field['thumb']='__ROOT__'.'/'.\$field['thumb'];
                \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
                define("CATEGORY_TOTAL_PAGE",\$hd_page->totalPage);
                ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;?>';
        return $php;
    }

    public function _pageshow($attr, $content)
    {
        return "<?php if(is_object(\$hd_page)){
                    echo \$hd_page->show();
                    }?>";
    }
}