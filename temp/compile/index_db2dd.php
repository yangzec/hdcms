<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
<link type="text/css" href="http://localhost/hdcms/hdcms/App/Comment/Tpl/Comment/css/css.css" rel="stylesheet"/>
<script src="http://localhost/hdcms/hdcms/App/Comment/Tpl/Comment/js/js.js" type="text/javascript"></script>

<div class="show_comment">
    <div class="respond" id="respond">
        <?php if(session("uid")):?>
        <div class="comt-title">
            <div class="comt-avatar">
                <img class="avatar avatar-28 photo" width="28" height="28"
                     src="<?php if($_SESSION['favicon']){?><?php echo $_SESSION['favicon'];?><?php  }else{ ?>http://localhost/hdcms/hdcms/App/Comment/Tpl/Comment/img/face/face.png<?php }?>">
            </div>
            <div class="comt-author pull-left">
                <?php if($_SESSION['uid']){?><?php echo $_SESSION['realname'];?>
                    <?php  }else{ ?><a href="http://localhost/hdcms/index.php?a=Member&c=Login&m=login">登录</a>
                <?php }?>
                <span>发表我的评论</span>
            </div>
        </div>
        <form action="http://localhost/hdcms/index.php?a=Comment&c=Comment&m=add&cid=<?php echo $_GET['cid'];?>&aid=<?php echo $_GET['aid'];?>" method="post" onsubmit="return false">
            <input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>"/>
            <input type="hidden" name="cid" value="<?php echo $_GET['ci'];?>"/>
            <input type="hidden" name="path" value="0"/>
            <input type="hidden" name="pid" value="0"/>

            <div class="comment-box">
                <textarea class="input-block-level comt-area" name="comment" placeholder="写点什么..."></textarea>
            </div>
            <div class="comment_submit">
                         <span class="com_sub_bt">
                            <input type="submit" value="提交评论 [Ctrl+Enter]"/>
                         </span>
            </div>
        </form>
        <?php else:?>
            <h2><a href="<?php echo U('Member/Login/login');?>">登录</a>后可发表评论！</h2>
        <?php endif;?>
    </div>
    <div id="postcomments">
        <h3 id="comments">
            网友最新评论
            <b> (<?php echo $count;?>)</b>
        </h3>

        <div class="comment_list">
            <ul>
                <?php echo $comment;?>
            </ul>
        </div>
        <div class="page1">
            <?php echo $page;?>
        </div>
    </div>

</div>
