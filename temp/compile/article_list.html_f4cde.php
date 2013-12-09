<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>大前端-文章列表页</title>
    <link rel="stylesheet" href="http://localhost/hdcms/template/default//css/style.css"/>
    <link rel="stylesheet" href="http://localhost/hdcms/template/default//css/list.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/template/default//js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/template/default//js/js.js"></script>
</head>

<body>
<!-- 顶部100%灰色区域 -->
<div id="top_dark_box">
    <!-- 中间1200px宽度区域 -->
    <div id="top_dark">
        <img src="http://localhost/hdcms/template/default//images/others/logo.png" id="logo"/>
        <!-- 导航菜单 -->
        <ul id="menu">
            <li>
                <a href="http://localhost/hdcms" class="cur">首页</a>
            </li>
            <li>
                        <?php
        $where = '';$type='self';$cid=1;$row=10;

        $db = M("category");
        if ($type == "top") {
            $where .= " pid=0 ";
        }
        if (!is_null($cid)) {
            $cat = $db->find(1);
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
        $result = $db->where($where)->where("cat_show=1")->order()->where($where)->order("catorder DESC")->limit($row)->all();
        foreach ($result as $field):
            $field['url'] = get_category_url($field);?>
                    <a href="<?php echo $field['url'];?>"><?php echo $field['catname'];?></a>
                        <?php
        endforeach;
        ?>
                <ul class="second">
                            <?php
        $where = '';$type='son';$cid=1;$row=10;

        $db = M("category");
        if ($type == "top") {
            $where .= " pid=0 ";
        }
        if (!is_null($cid)) {
            $cat = $db->find(1);
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
        $result = $db->where($where)->where("cat_show=1")->order()->where($where)->order("catorder DESC")->limit($row)->all();
        foreach ($result as $field):
            $field['url'] = get_category_url($field);?>
                        <li><a href="<?php echo $field['url'];?>"><?php echo $field['catname'];?></a></li>
                            <?php
        endforeach;
        ?>
                </ul>
            </li>
        </ul>
        <!-- 导航菜单结束 -->
        <a href="http://localhost/hdcms/index.php?a=Member&c=Login&m=login" class="top_login">用户登录</a>
        <!-- 用户登录结束 -->


    </div>
    <!-- 中间1200px宽度区域结束 -->
</div>
<!-- 顶部灰色100%区域结束 -->

<!-- 顶部最新消息区域 -->
<div id="latest_news_box">
    <div id="latest_news">
        <p><span class="title">最新消息：</span>        <?php $cid ="4";$flag='';$aid='';
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel(1,$cid);
            if($db->table){
            if(!empty($flag)){
                $db->in(array("fid" => $flag));
            }else{
                $db->join("content_data,category");
            }
            if ($cid) {
                $db->in(array("category.cid" => $cid));
            }
            if ($aid) {
                $db->in(array("content.aid" => $aid));
            }
            $db->where="status=1";
            $db->group="content.aid";
            $db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
            $db->limit(1);
            $result = $db->order("aid DESC")->all();
            foreach($result as $field):
                $field['caturl']=U('category',array('cid'=>$field['cid']));
                $field['url']="http://localhost/hdcms/".$field['url'];
                $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?><?php echo $field['title'];?><?php endforeach;}?></p>
    </div>
</div>
<!-- 顶部最新消息区域结束 -->

<!-- 主体区域 -->
<div id="main">
    <!-- main最上面的说明文字 -->
    <div class="top">以下是分类 设计路上 下的文章</div>
    <!-- main最上面的说明文字结束 -->

    <!-- 左侧区域 -->
    <div class="left">


        <!-- 列表页介绍结束 -->

        <ul class="arc_list">
                    <?php $cid='5';$flag='';
        $db = new ContentViewModel(null,$cid);
        if($flag){
            $count = $db->table("content_flag")->where("cid=$cid")->count();
        }else{
            $count = $db->join(NULL)->where("cid=$cid")->count();
        }
        $hd_page= new Page($count,10);
        $field ="aid,category.cid,thumb,click,source,author,addtime,updatetime,username,url,catname,title";
        $result= $db->join("category")->field($field)->where($where_flag)->where("status=1")->where("category.cid=5")
        ->group("aid")->limit($hd_page->limit())->all();
//        p($db->getallsql());exit;
        foreach($result as $field):
                $field['caturl']=U('category',array('cid'=>$field['cid']));
                $field['url']="http://localhost/hdcms/".$field['url'];
                $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                $field['description']=mb_substr($field['description'],0,80,'utf-8');
                define("CATEGORY_TOTAL_PAGE",$hd_page->totalPage);
                ?>
                <li>
                    <div class="pic"><img width="140" height="98" src="<?php echo $field['thumb'];?>" alt=""/></div>
                    <h3><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a></h3>
                    <span class="date"><?php echo date('m-d',$field['addtime']);?></span>
                    <a href="<?php echo $field['caturl'];?>" class="comment"><?php echo $field['catname'];?></a>
                    <span class="browse_number"><?php echo $field['click'];?>次浏览</span>

                    <p class="description"><?php echo $field['description'];?></p>
                </li>
            <?php endforeach;?>
        </ul>
        <link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
        <!-- 分页 -->
            <div class="page1">
                <?php if(is_object($hd_page)){
                    echo $hd_page->show();
                    }?>
            </div>
        <!-- 分页结束 -->
    </div>
    <!-- 左侧区域结束 -->

    <!-- 中间区域 -->
    <div class="center">
        <p class="title">站长推荐</p>
        <ul class="title_list">
                    <?php $cid ="";$flag='3';$aid='';
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel(1,$cid);
            if($db->table){
            if(!empty($flag)){
                $db->in(array("fid" => $flag));
            }else{
                $db->join("content_data,category");
            }
            if ($cid) {
                $db->in(array("category.cid" => $cid));
            }
            if ($aid) {
                $db->in(array("content.aid" => $aid));
            }
            $db->where="status=1";
            $db->group="content.aid";
            $db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
            $db->limit(8);
            $result = $db->order("aid DESC")->all();
            foreach($result as $field):
                $field['caturl']=U('category',array('cid'=>$field['cid']));
                $field['url']="http://localhost/hdcms/".$field['url'];
                $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                <li>
                    <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a>
                </li>
            <?php endforeach;}?>
        </ul>
        <p class="title">置顶推荐</p>
        <ul class="title_list">
                    <?php $cid ="";$flag='2';$aid='';
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel(1,$cid);
            if($db->table){
            if(!empty($flag)){
                $db->in(array("fid" => $flag));
            }else{
                $db->join("content_data,category");
            }
            if ($cid) {
                $db->in(array("category.cid" => $cid));
            }
            if ($aid) {
                $db->in(array("content.aid" => $aid));
            }
            $db->where="status=1";
            $db->group="content.aid";
            $db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
            $db->limit(8);
            $result = $db->order("aid DESC")->all();
            foreach($result as $field):
                $field['caturl']=U('category',array('cid'=>$field['cid']));
                $field['url']="http://localhost/hdcms/".$field['url'];
                $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                <li>
                    <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a>
                </li>
            <?php endforeach;}?>
        </ul>
    </div>
    <!-- 中间区域结束 -->

    <!-- 右侧区域 -->
    <div class="right">


        <p class="title">最新评论</p>
        <ul class="new_comments">
                        <?php $db = K("comment");
        $result = $db->limit(10)->field("user.uid,username,realname,comment_id,comment,aid,cid")->where("c_status=1")->order("comment_id DESC")->all();
        foreach ($result as $field):
        $field['url'] = 'http://localhost/hdcms/index.php?a=Content&c=Index&m=content&cid='.$field['cid'].'&aid='.$field['aid'].'#'.$field['comment_id'];?>
                <li>
                    <a href="<?php echo $field['url'];?>">
                        <img src="http://localhost/hdcms/template/default//images/others/touxiang.png" alt=""/>
                        <span class="name"><?php echo $field['realname'];?></span>
                        <p class="content"><?php echo $field['comment'];?></p>
                        <span class="arrows">></span>
                    </a>
                </li>
                    <?php
        endforeach;
        ?>
        </ul>

        <p class="title">技巧资源</p>
        <ul class="title_list">
                    <?php $cid ="2,3,4,5";$flag='';$aid='';
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel(1,$cid);
            if($db->table){
            if(!empty($flag)){
                $db->in(array("fid" => $flag));
            }else{
                $db->join("content_data,category");
            }
            if ($cid) {
                $db->in(array("category.cid" => $cid));
            }
            if ($aid) {
                $db->in(array("content.aid" => $aid));
            }
            $db->where="status=1";
            $db->group="content.aid";
            $db->field("url,username,category.cid,catname,content.aid,title,new_window,thumb,source,addtime,click,content_data.description,content.redirecturl,author,color");
            $db->limit(4);
            $result = $db->order("aid DESC")->all();
            foreach($result as $field):
                $field['caturl']=U('category',array('cid'=>$field['cid']));
                $field['url']="http://localhost/hdcms/".$field['url'];
                $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                <li>
                    <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a>
                </li>
            <?php endforeach;}?>
        </ul>


    </div>
    <!-- 右侧区域结束 -->

</div>
<!-- 主体区域结束 -->

<!-- 底部浅灰色导航区域结束 -->

<!-- 底部版权区域 -->
<div id="bottom_copyright_box">
    <div class="bottom_copyright">
        版权所有，保留一切权利！ © 2013 <a href="http://localhost/hdcms"><?php echo C("webname");?></a>　
    </div>
</div>
<!-- 底部版权区域结束 -->
</body>
</html>
