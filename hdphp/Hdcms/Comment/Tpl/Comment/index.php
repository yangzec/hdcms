<hdui/>
<link type="text/css" href="__ROOT__/hdcms/App/Comment/Tpl/Comment/css/css.css" rel="stylesheet"/>
<script src="__ROOT__/hdcms/App/Comment/Tpl/Comment/js/js.js" type="text/javascript"></script>

<div class="show_comment">
    <div class="respond" id="respond">
        <?php if(session("uid")):?>
        <div class="comt-title">
            <div class="comt-avatar">
                <img class="avatar avatar-28 photo" width="28" height="28"
                     src="<if value='$hd.session.favicon'>{$hd.session.favicon}<else>__CONTROL_TPL__/img/face/face.png</if>">
            </div>
            <div class="comt-author pull-left">
                <if value="$hd.session.uid">{$hd.session.realname}
                    <else><a href="__WEB__?a=Member&c=Login&m=login">登录</a>
                </if>
                <span>发表我的评论</span>
            </div>
        </div>
        <form action="__WEB__?a=Comment&c=Comment&m=add&cid={$hd.get.cid}&aid={$hd.get.aid}" method="post" onsubmit="return false">
            <input type="hidden" name="aid" value="{$hd.get.aid}"/>
            <input type="hidden" name="cid" value="{$hd.get.ci}"/>
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
            <h2><a href="{|U:'Member/Login/login'}">登录</a>后可发表评论！</h2>
        <?php endif;?>
    </div>
    <div id="postcomments">
        <h3 id="comments">
            网友最新评论
            <b> ({$count})</b>
        </h3>

        <div class="comment_list">
            <ul>
                {$comment}
            </ul>
        </div>
        <div class="page1">
            {$page}
        </div>
    </div>

</div>
