function replay(obj, type) {
    if (type) {
        $(obj).parents(".comment_con").next().show();
    } else {
        $(obj).parents(".respond").hide();
    }
}
//发表评论
$(function () {
    $("div.respond form").live("submit", function () {
        var _form = $(this);
        //父级LI
        var _li = $(this).parents("li").eq(0);
        $.ajax({
            url: $(this).attr("action"),
            data: $(this).serialize(),
            type: "post",
            dataType: "json",
            success: function (data) {
                switch (data.stat) {
                    //审核状态
                    case 1:
                        var html = '<li>\
                            <div class="face_ico">\
                                <img width="36" height="36" src="' + data.data['favicon'] + '">\
                                </div>\
                                <div class="comment_con">\
                                您的评论正在排队审核中，请稍后！\
                                    <div class="user_info">\
                                        <span class="author">' + data.data['realname'] + ' '+data.data.time+'</span>\
                                    </div>\
                                </div>\
                            </li>';
                        break;
                    //顶级评论
                    case 2:
                        var html='<li>\
                            <a name="' + data.data['comment_id'] + '"></a>\
                        <div class="face_ico">\
                            <img width="36" height="36" src="'+data.data['favicon']+'">\
                            </div>\
                            <div class="comment_con">\
                            '+data.data['comment']+'\
                                <div class="user_info">\
                                    <span class="author">'+data.data['realname']+'</span>\
                                '+data.data['time'];
                        if(data.data.reply_uid!=data.data.uid){
                            html+='<a onclick="replay(this,true);" href="javascript:;">回复</a>';
                        }
                        html+='</div>\
                            </div>\
                            <div class="respond reply">\
                                <div class="comt-title">\
                                    <div class="comt-avatar">\
                                        <img class="avatar avatar-28 photo" width="28" height="28" src="'+data.data['favicon']+'">\
                                        </div>\
                                        <div class="comt-author pull-left">\
                                        '+data.data['realname']+'\
                                            <span>发表我的评论</span>\
                                        </div>\
                                        <a class="cancel-comment-reply-link" href="javascript:;" onclick="replay(this,false)">取消评论</a>\
                                    </div>\
                                    <form onsubmit="return false" method="post" action="'+data.data['action']+'">\
                                        <input type="hidden" value="'+data.data['path']+'" name="path">\
                                            <input type="hidden" value="'+data.data['pid']+'" name="pid">\
                                                <div class="comment-box">\
                                                    <textarea class="input-block-level comt-area" placeholder="写点什么..." name="comment"></textarea>\
                                                </div>\
                                                <div class="comment_submit">\
                                                    <span class="com_sub_bt">\
                                                        <input type="submit" value="提交评论">\
                                                        </span>\
                                                    </div>\
                                                </form>\
                                            </div>\
                                        </li>';
                            break;
                    case 3:
                        var html='<li>\
                            <a name="' + data.data['comment_id'] + '"></a>\
                        <div class="face_ico">\
                            <img width="36" height="36" src="'+data.data['favicon']+'">\
                            </div>\
                            <div class="comment_con">\
                           '+data.data['comment']+'\
                                <div class="user_info">\
                                    <span class="author">'+data.data['realname']+'</span>\
                                 '+data.data['time'];
                        if(data.data.reply_uid!=data.data.uid){
                                   html+= '<a onclick="replay(this,true);" href="javascript:;">回复</a>';
                        }
                         html+='</div>\
                            </div>\
                            <div class="respond reply">\
                                <div class="comt-title">\
                                    <div class="comt-avatar">\
                                        <img class="avatar avatar-28 photo" width="28" height="28" src="'+data.data['favicon']+'">\
                                        </div>\
                                        <div class="comt-author pull-left">\
                                        '+data.data['realname']+'\
                                            <span>发表我的评论</span>\
                                        </div>\
                                        <a class="cancel-comment-reply-link" href="javascript:;" onclick="replay(this,false)">取消评论</a>\
                                    </div>\
                                    <form onsubmit="return false" method="post" action="'+data.data['action']+'">\
                                       <input type="hidden" value="'+data.data['path']+'" name="path">\
                                            <input type="hidden" value="'+data.data['pid']+'" name="pid">\
                                                <div class="comment-box">\
                                                    <textarea class="input-block-level comt-area" placeholder="写点什么..." name="comment"></textarea>\
                                                </div>\
                                                <div class="comment_submit">\
                                                    <span class="com_sub_bt">\
                                                    </div>\
                                                </form>\
                                            </div>\
                                        </li>';
                        break;

                }
                //顶级评论发表
                if (_form.parents("#respond").length == 1) {
                    $("div.comment_list ul").eq(0).prepend(html);
                } else {//回复
                    _li.children(".respond").hide();
                    if (_li.children(".child").length == 0) {
                        _li.append("<div class='child'><ul></ul></div>");
                    }
                    _li.find(".child ul").eq(0).prepend(html);
                }
            }
        })
    })
})