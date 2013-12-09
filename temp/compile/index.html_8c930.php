<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?>        <?php $mid="1";$cid ="6";$listtype ="all";$flag='';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
            if($db->table){
                //主表
                $table=$db->table;
                if(!empty($flag)){
                    $db->in(array("fid" => $flag));
                }
                if ($cid) {
                    //查找栏目与子栏目
                    if($listtype=='all'){
                        $tmp =M("category")->field("cid")->where("path like '%".$cid."_%' or cid=$cid")->all();
                        $cid=array();
                        foreach($tmp as $t){
                            $cid[]=$t['cid'];
                        }
                    }
                    $db->in(array("category.cid" => $cid));
                }
                if ($aid) {
                    $db->where=$table.".aid=".$aid;
                }
                $db->where="status=1";
                $db->group=$table.".aid";
                $db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
                $db->limit(10);
                $result = $db->order("aid DESC")->all();p($db->getallsql());
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']="http://localhost/hdcms/".$field['url'];
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                    ?>
    <li>
        <h3><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a></h3>
    </li>
<?php endforeach;}?>