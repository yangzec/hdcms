<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo C("webname");?></title>
    <link rel="stylesheet" href="http://localhost/hdcms/template/default/css/article_content.css"/>
</head>
<body>
<!-- 最顶部灰色条开始 -->
<div class="head_top">
    <div class="head_top_box">
        <!-- 左边盒子 -->
        <div class="head_top_l">
				<span class="top_login">
				<?php echo C("webname");?>

				</span>
        </div>

        <!-- 右边盒子结束 -->
    </div>
</div>
<!-- 最顶部灰色条结束 -->
<!-- 头部开始 -->
<div class="head">
    <a href="" class="logo"><img src="http://localhost/hdcms/template/default/images/logo.gif" alt=""/></a>
    <a href="" class="logo2"><img src="http://localhost/hdcms/template/default/images/1328856915439.gif" alt=""/></a>
</div>
<!-- 头部结束 -->
<!-- 导航栏开始 -->
<div class="nav_list">

    <a href="http://localhost/hdcms" class="two"><span>首  页</span></a>
            <?php
        $where = '';$type='self';$cid="";

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
        $result = $db->where($where)->where("cat_show=1")->order()->where($where)->order("catorder DESC")->limit(8)->all();
        //列表页当前栏目
        $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
        foreach ($result as $field):
            $channel=$field;
            //当前栏目样式
            $field['class']=$_self_cid==$field['cid']?"blue":"";
            $field['url'] = get_category_url($field['cid']);?>
        <a href="<?php echo $field['url'];?>" class="<?php echo $field['class'];?>"><span><?php echo $field['catname'];?></span></a>
            <?php
        endforeach;
        ?>

    <!-- 右边分享盒子开始 -->
    <div class="share">
        <!-- JiaThis Button BEGIN -->

        <!-- JiaThis Button END -->
    </div>
    <!-- 右边分享盒子结束 -->
</div>
<!-- 导航栏结束 -->
<!-- 搜索区域大盒子开始 -->
<div class="search_box">
    <!-- 搜索大盒子左边开始 -->
    <div class="s_left">
        <!-- 搜索框盒子 -->
        <div class="keybox">
            <p class="serch_pic"></p>
            <input type="text" value="1212" maxlength="16"/>
        </div>
        <!-- 搜索框盒子 -->
        <!-- 按钮开始 -->
        <div class="btn">
            <input type="submit" value="搜索"/>
        </div>
        <!-- 按钮结束 -->

        <!-- 搜索框右侧搜索链接结束 -->
        <!-- 热门关键字开始 -->
        <div class="hotkey">

            热门关键字：<a href="">PHP</a>
            <a href="">PHP程序员</a>
            <a href="">PHP工程师</a>
            <a href="">PHP招聘</a>
            <a href="">网页设计</a>
            <a href="">PHP网站开发</a>
            <a href="">程序员招聘</a>
            <a href="">ASP程序员</a>
            <a href="">UI设计</a>
            <a href="">网页制作</a>
            <a href="">网站美工</a>
        </div>
        <!-- 热门关键字结束 -->
    </div>
    <!-- 搜索大盒子左边结束 -->
    <!-- 搜索大盒子右边开始 -->
    <div class="s_right">
        <div class="pic">

        </div>
    </div>
    <!-- 搜索大盒子右边结束 -->
</div>
<!-- 搜索区域大盒子结束 -->
<!-- 轮换版区域下方盒子 -->
<div class="news_list">
    <div class="article_list">
        <div class="place">
            <strong>当前位置: </strong>
                    <?php
        if(!empty($_GET['cid'])){
            $cat = F("category",false,CATEGORY_CACHE_PATH);
            $cat= Data::parentChannel($cat,$_GET['cid']);
            $str = "<a href='http://localhost/hdcms'>首页</a> > ";
            foreach($cat as $c){
                $str.="<a href='".get_category_url($c['cid'])."'>".$c['title'].'</a> > ';
            }
            echo $str;
        }
        ?>
        </div>
        <div class="content">
            <h3><?php echo $hdcms['title'];?></h3>
            <div class="info">
                <small>时间:</small>
                <?php echo $hdcms['time'];?>
                <small>来源:</small>
                <?php echo $hdcms['source'];?>
                <small>作者:</small>
                <?php echo $hdcms['username'];?>
                <small>点击:</small>
                <script language="javascript" type="text/javascript" src="http://localhost/hdcms/index.php?a=Content&c=Content&m=get_click&cid=<?php echo $hdcms['cid'];?>&aid=<?php echo $hdcms['aid'];?>"></script>次
            </div>
            <div class="intro"><?php echo $hdcms['description'];?></div>
            <div class="con">
                <?php echo $hdcms['content'];?>
            </div>
            <div class="pagenext">
                        <?php
        $aid = $_GET['aid'];
        $db = new ContentViewModel();
        $str = "";
        //上一篇
        $field = $db->join()->trigger()->field("aid,cid,title,addtime")->where("aid<$aid")->order("aid desc")->find();
        if ($field) {
            $url = get_content_url($field);
            $str .= "<li>上一篇: <a href='$url'>" . $field['title'] . "</a></li>";
        } else {
            $str .= "<li>上一篇: <span>没有了</span></li>";
        }
        //下一篇
        $field = $db->join()->trigger()->field("aid,cid,title,addtime")->where("aid>$aid")->order("aid asc")->find();
        if ($field) {
            $url = get_content_url($field);
            $str .= "<li>下一篇: <a href='$url'>" . $field['title'] . "</a></li>";
        } else {
            $str .= "<li>下一篇: <span>没有了</span></li>";
        }
        echo $str;
        ?>
            </div>
        </div>
    </div>
    <div class="article_right">
        <div class="left">
            <div class="listbox">
                <div class="title">
                    <a class="left_box">热门文章</a>
                </div>
                <div class="txt">
                    <ul>
                                <?php $mid="1";$cid =0;$listtype ="";$flag='1';$aid='';
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
                    $db->where = C("DB_PREFIX")."category.cid in($cid)";
                }
                if ($aid) {
                    $db->where=$table.".aid=".$aid;
                }
                $db->where="status=1";
                $db->group=$table.".aid";
                $db->limit(10);
                $db->field="*,{$db->table}.aid,{$db->table}.cid";
                $result = $db->join('category,content_flag')->field("addtime")->all();
                if(!empty($result) and is_array($result)){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['addtime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,15,'utf8');
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                    ?>
                            <li><a href="<?php echo $field['url'];?>"> <?php echo $field['title'];?> [<?php echo $field['time'];?>]</a></li>
                        <?php endforeach;}}?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="left">
            <div class="listbox">
                <div class="title">
                    <a class="left_box">推荐文章</a>
                </div>
                <div class="txt">
                    <ul>
                                <?php $mid="1";$cid =0;$listtype ="";$flag='3';$aid='';
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
                    $db->where = C("DB_PREFIX")."category.cid in($cid)";
                }
                if ($aid) {
                    $db->where=$table.".aid=".$aid;
                }
                $db->where="status=1";
                $db->group=$table.".aid";
                $db->limit(10);
                $db->field="*,{$db->table}.aid,{$db->table}.cid";
                $result = $db->join('category,content_flag')->field("addtime")->all();
                if(!empty($result) and is_array($result)){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['addtime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,15,'utf8');
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                    ?>
                            <li><a href="<?php echo $field['url'];?>"> <?php echo $field['title'];?> [<?php echo $field['time'];?>]</a></li>
                        <?php endforeach;}}?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 页脚开始 -->
<div class="footer">
    <!-- 温馨提示开始 -->
    <div class="rem">
        Copyright @ 2011-2015 www.hdphp.com All Right Reserved 本网站部分内容只转载原作的部分内容，若有异议，请与本站负责人联系，我们将予以改正！
    </div>
</div>
<!-- 页脚结束 -->
</body>
</html>