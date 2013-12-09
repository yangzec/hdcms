<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo C("webname");?></title>
    <link rel="stylesheet" href="http://localhost/hdcms/template/default//css/style.css"/>
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
        if (!empty($cid)) {
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
        if (!empty($cid)) {
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
        <!-- 用户登录 -->
        <a href="http://localhost/hdcms/index.php?a=Member&c=Login&m=login" class="top_login">用户登录</a>

    </div>
    <!-- 中间1200px宽度区域结束 -->
</div>
<!-- 顶部灰色100%区域结束 -->
<!-- 顶部最新消息区域 -->
<div id="latest_news_box">
    <div id="latest_news">
        <p><span class="title">最新消息：</span>
                    <?php $mid="1";$cid ="4";$flag='';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
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
                ?><?php echo $field['title'];?><?php endforeach;}?>
        </p>
    </div>
</div>
<!-- 顶部最新消息区域结束 -->

<!-- 主体区域 -->
<div id="main">
    <!-- 左侧区域 -->
    <div class="left">
        <ul class="arc_list">
                    <?php $mid="1";$cid ="";$flag='4';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
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
                    <div class="pic"><img src="<?php echo $field['thumb'];?>" width="140" height="98" alt=""/></div>
                    <h3><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a></h3>
                    <span class="date"><?php echo date('m-d',$field['updatetime']);?></span>
                    <a href="" class="comment">3人评论</a>
                    <span class="browse_number"><?php echo $field['click'];?>次浏览</span>

                    <p class="description">携程技术研发中心框架研发部，浩子现在效力的部门，部门主要负责携程前后端框架的开发维护及支持。 此职位将于我在一个小组，就是前端框架组...</p>
                </li>
            <?php endforeach;}?>
        </ul>


    </div>
    <!-- 左侧区域结束 -->

    <!-- 中间区域 -->
    <div class="center">
        <p class="title">站长推荐</p>
        <ul class="title_list">
                    <?php $mid="1";$cid ="";$flag='3';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
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
                    <?php $mid="1";$cid ="";$flag='2';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
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
                    <?php $mid="1";$cid ="2,3,4,5";$flag='';$aid='';
            $_GET['mid']="1";
            if(empty($cid)){
                $cid= isset($_GET['cid'])?intval($_GET['cid']):null;
            }
            $db = new ContentViewModel();
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
