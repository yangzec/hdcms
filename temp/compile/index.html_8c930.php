<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?>        <?php
        $where = '';$type='current';$cid="6,7,8";$row=10;

        $db = M("category");
        if ($type == "top") {
            $where .= " pid=0 ";
        }else if (!empty($cid)) {
            if($type=='current'){
                 $where = " cid in(".$cid.")";
            }else{
                $cid=intval($cid);
                $cat = $db->find($cid);
                if($cat){
                    switch ($type) {
                        case "son":
                                $where = " pid=".$cat['cid'];
                                break;
                        case "self":
                                $where = " pid=".$cat['pid'];
                                break;
                        case "one":
                                $where = " cid=".$cat['cid'];
                                break;
                    }
                }
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->where($where)->order("catorder DESC")->limit($row)->all();
        foreach ($result as $field):
            $field['url'] = get_category_url($field);?>
    <?php echo $field['catname'];?>
        <?php
        endforeach;
        ?>