<?php
/**
 * HDCMS系统反馈管理
 * 只供后盾网官方使用
 * Class BugControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class BugControl extends Control
{
    //模型
    public $db;
    //角色rid
    public $rid;

    public function __init()
    {
        $this->db = M("Bug");
    }

    //反馈建议
    public function suggest()
    {
        $_POST['addtime'] = time();
        if ($this->db->add()) {
            $this->success(":) 您的建议我们已经收到，谢谢！", NULL, 5);
        } else {
            $this->error(":( 服务器异常，请稍候再试", NULL, 5);
        }
    }
}

?>