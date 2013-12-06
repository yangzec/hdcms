<?php
/**
 * 评论管理模型
 * Class CategoryModel
 * @author hdxj <houdunwangxj@gamil.com>
 */
class CommentModel extends ViewModel
{
    //栏目表
    public $table = "comment";
    //文章id
    public $aid;
    //栏目ic
    protected $cid;
    public $validate = array(
        array("comment", "nonull", "评论内容不能为空", 2, 3),
        array("path", "nonull", "path不能为空", 2, 3),
        array("aid", "nonull", "aid不能为空", 2, 3),
        array("cid", "nonull", "cid不能为空", 2, 3),
    );
    public $auto = array(
        array("uid", "auto_uid", 2, 3, "method"),
        array("ip", "auto_ip", 2, 3, "method"),
        array("addtime", "auto_addtime", 2, 3, "method"),
        array("c_status", "auto_status", 2, 3, "method"),
        array("comment", "auto_comment", 2, 3, "method"),
        array("aid", "auto_aid", 2, 3, "method"),
        array("cid", "auto_cid", 2, 3, "method"),
        array("pid", "intval", 2, 3, "function"),
        array("path", "auto_path", 2, 3, "method"),
    );
    public $view = array(
        "user" => array(
            "type" => INNER_JOIN,
            "on" => "user.uid=comment.uid"
        )
    );

    //评论默认状态
    public function auto_status($v)
    {
        return C("COMMENT_STATUS");
    }

    //内容
    public function auto_comment($v)
    {
        return data_format($v, array("strip_tags", "htmlspecialchars"));
    }

    //内容
    public function auto_path($v)
    {
        return data_format($v, array("strip_tags", "htmlspecialchars"));
    }

    public function auto_uid($v)
    {
        return session("uid");
    }

    public function auto_cid($v)
    {
        return $this->cid;
    }

    public function auto_aid($v)
    {
        return $this->aid;
    }

    public function auto_addtime($v)
    {
        return time();
    }

    public function auto_ip($v)
    {
        return ip_get_client();
    }

    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->cid = Q("request.cid", NULL, "intval");
        $this->aid = Q("request.aid", NULL, "intval");
    }
}