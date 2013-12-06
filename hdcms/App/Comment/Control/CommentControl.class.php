<?php
/**
 * Class CommonControl
 * 发表评论
 */
class CommentControl extends CommonControl
{
    protected $db;

    //构造函数
    public function __init()
    {
        $this->db = K("Comment");
    }

    //显示列表
    public function index()
    {
        $aid = Q("aid", NULL, "intval");
        $field = "comment.uid,username,favicon,realname,comment_id,comment.cid,comment.aid,comment,pid,path,comment.addtime";
        if ($aid) {
            $count = $this->db->join(NULL)->where("c_status=1")->where("pid=0")->where("aid=$aid")->count();
            $page = new Page($count, 100);
            $data = $this->db->field($field)->where("c_status=1")->where("pid=0")->where("aid=$aid")->order("comment_id DESC")->limit($page->limit())->all();
            //获得回复
            $comment = "";
            foreach ($data as $n => $c) {
                $favicon = empty($d['favicon']) ? __CONTROL_TPL__ . '/img/face/face.png' : __ROOT__ . '/' . $d['favicon'];
                $data[$n]['favicon'] = $favicon;
                //查找所有子回复
                $child = $this->db->field($field)->where("c_status=1")->where("aid=$aid")->where("path like '{$c['path']}_{$c['comment_id']}%'")->order("comment_id ASC")->all();
                $child[] = $c;
                $comment .= $this->get_child_reply(Data::channelLevel($child, 0, "", "comment_id"));
            }
            $this->assign("count", $this->db->join(NULL)->where("c_status=1")->where("aid=$aid")->count());
            $this->assign("comment", $comment);
            $this->assign("page", $page->show());
            $con = $this->fetch();
            echo "document.write('" . preg_replace('@\n@mi', "", addslashes($con)) . "')";
        }
    }

    //获得回复数据
    private function get_child_reply($data, $level = 1)
    {
        if ($level == 1) {
            $str = "";
        } else {
            $str = "<div class='child'>
            <ul>";
        }
        foreach ($data as $d) {
            $action = __CONTROL__ . "&m=add&cid=" . $d['cid'] . "&aid=" . $d['aid'];
            $favicon = empty($d['favicon']) ? __CONTROL_TPL__ . '/img/face/face.png' : __ROOT__ . '/' . $d['favicon'];
            $path = $d['path'] . "_" . $d['comment_id'];
            $pid = $d['comment_id'];
            $time = date_before($d['addtime']);
            $_reply=$_SESSION['uid']!=$d['uid']?' <a href="javascript:;" onclick="replay(this,true);">回复</a>':"";
            $str .= <<<str
                                <li>
                                    <a name="{$d['comment_id']}"></a>
                                    <div class="face_ico">
                                        <img width="36" height="36" src="{$favicon}">
                                    </div>
                                    <div class="comment_con">
                                        {$d['comment']}
                                        <div class="user_info">
                                            <span class="author">{$d['realname']}</span>
                                           $time
                                           $_reply
                                        </div>
                                    </div>
                                    <!--回复-->
                                    <div class="respond reply">
                                        <div class="comt-title">
                                            <div class="comt-avatar">
                                                <img class="avatar avatar-28 photo" width="28" height="28" src="{$favicon}">
                                            </div>
                                            <div class="comt-author pull-left">
                                                {$d['realname']}
                                                <span>发表我的评论</span>
                                            </div>
                                            <a class="cancel-comment-reply-link" onclick="replay(this,false)" href="javascript:;">取消评论</a>
                                        </div>
                                        <form action="$action" method="post" onsubmit="return false">
                                        <input type="hidden" name="path" value="$path"/>
                                        <input type="hidden" name="pid" value="$pid"/>
                                        <div class="comment-box">
                                                <textarea  name="comment" class="input-block-level comt-area" placeholder="写点什么..."></textarea>
                                            </div>
                                            <div class="comment_submit">
                                                    <span class="com_sub_bt">
                                                          <input type="submit" value="提交评论"/>
                                                    </span>
                                            </div>
                                        </form>
                                    </div>

str;
            $str .= isset($d['data']) && !empty($d['data']) ? $this->get_child_reply($d['data'],$level+1) : "";
            $str .= "</li>";
        }
        if ($level != 1) {
            $str .= "</ul></div>";
        }
        return $str;

    }

    public function add()
    {
        if ($this->db->create()) {
            if ($id = $this->db->add()) {
                $data = M("comment")->find($id);
                $data['path'] = $data['path'] . '_' . $data['comment_id'];
                $data['time'] = date_before($data['addtime']);
                $data['favicon'] = $_SESSION['favicon'];
                $data['realname'] = $_SESSION['realname'];
                $data['reply_uid'] = $_SESSION['uid'];
                $data['action'] = __CONTROL__ . "&m=add&cid=" . $data['cid'] . "&aid=" . $data['aid'];;
                if (C("COMMENT_STATUS") == 0) { //评论需要审核
                    $this->_ajax(array("stat" => 1, "data" => $data));
                } else if ($_POST['pid'] == 0) { //主评论
                    $this->_ajax(array("stat" => 2, "data" => $data));
                } else { //回复
                    $this->_ajax(array("stat" => 3, "data" => $data));
                }

            }
        } else {
            echo $this->db->error;
        }
    }
}






















