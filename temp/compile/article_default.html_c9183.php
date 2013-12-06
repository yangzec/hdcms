<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大前端-内容页</title>
<link rel="stylesheet" href="http://localhost/hdcms/template/default/css/style.css" />
<link rel="stylesheet" href="http://localhost/hdcms/template/default//css/page.css" />
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
                        <?php $cid ="4";$flag='';$aid='';
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
                ?><?php echo $field['title'];?><?php endforeach;}?>
            </p>
        </div>
	</div>
	<!-- 顶部最新消息区域结束 -->

	<!-- 主体区域 -->
	<div id="page_main">

		<!-- 右侧 -->
		<div class="right">
			<p class="title">最新发布</p>
			<div class="right_list">
				<ul>
                            <?php $cid ="2,3,4,5";$flag='4';$aid='';
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
                            <div class="pic">
                                <a href="<?php echo $field['url'];?>"><img src="<?php echo $field['thumb'];?>" width="140" height="98" alt=""/></a>
                            </div>
                            <a href="<?php echo $field['url'];?>"><?php echo mb_substr($field['title'],0,12,'utf-8');?></a>
                        </li>
                    <?php endforeach;}?>
				</ul>
			</div>
		</div>
		<!-- 右侧结束 -->

		<!-- 左侧 -->
		<div class="left">
			<h1><a href=""><?php echo $hdcms['title'];?></a></h1>
			<!-- 文章信息 -->
			<div class="article_info_box">
                <p class="article_info">
                    <span class="padding_right"><?php echo date('Y-m-d',$hdcms['addtime']);?></span>
                    分类：<a href="<?php echo $hdcms['caturl'];?>" class="padding_right"><?php echo $hdcms['catname'];?></a>
                    <a href="" class="padding_right comment">13人评论</a>
                    <script src="http://localhost/hdcms/index.php?a=Html&c=Html&m=get_click&cid=<?php echo $_GET['cid'];?>&aid=<?php echo $_GET['aid'];?>"></script>次浏览
                </p>
			</div>
			<!-- 文章信息结束 -->

			<!-- 文章内容区域 -->
			<div class="article_content">
                <p><?php echo $hdcms['content'];?></p>
			</div>



			<!-- 作者区域 -->
			<div class="author_info">
				<img src="http://localhost/hdcms/template/default//images/others/zuozhe.png" alt="" />
				<p class="author_name">本文作者：<?php echo $hdcms['username'];?></p>
				<p class="description"><?php echo C("webname");?></p>
			</div>
			<!-- 作者区域结束 -->
			<!-- 发表我的评论 -->
            <!-- 评论 -->
            <script src="http://localhost/hdcms/index.php?a=Comment&c=Comment&m=index&cid=<?php echo $_GET['cid'];?>&aid=<?php echo $_GET['aid'];?>" type="text/javascript"></script>
            <!-- 评论 -->
			<!-- 发表我的评论结束 -->

		</div>
		<!-- 左侧结束 -->

		
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