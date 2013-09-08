<?php
/**
 * Class CommonControl
 * 发表评论
 */
class CommentControl extends Control
{
    public function index()
    {
        echo 333;exit;
        $aid = $this->_get("aid");
        $db = M("comment");
        $count = $db->where("aid=$aid")->count();
        $page = new Page($count, 8);
        $this->assign("page", $page->show());
        $data = $db->order("comment_id desc")->where("aid=$aid")->limit($page->limit())->all();
        $this->assign("comment", $data);
        $this->display("./template/plus/comment.html");
    }

    public function add()
    {
        $db = M("comment");
        $this->_post("title");
        $_POST['content']=$_POST['title'];
        $_POST['aid'] = $this->_get("aid", "intval");
        $_POST['cid'] = $this->_get("cid", "intval");
        $_POST['mid'] = $this->_get("mid", "intval");
        $comment_id = $this->_get("comment_id");
        $_POST['username'] = $_SESSION['username'];
        $_POST['ip'] = ip_get_client();
        $_POST['reply_time'] = time();
        if ($comment_id) {
            $_d = $db->find($comment_id);
            $_POST['content'] = "<div class='content'><span class='info'>{$_d['username']} 发表于:{$_POST['reply_time']}</span>{$_d['content']}</div>" . $_POST['title'];
        }
        $db->add();
        $this->success("发表成功", U('index', array('aid' => $_POST['aid'],
                'cid' => $_POST['cid'],
                'mid' => $_POST['mid'])),
            1, './template/plus/success');
    }
}






















