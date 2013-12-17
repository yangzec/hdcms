<?php
/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{
    //表前缀
    protected $db_prefix;

    public function __init()
    {
        session("history", Q("server.HTTP_REFERER"));
    }

    //ajax返回
    protected function ajax_return($stat, $msg)
    {
        $this->_ajax(array("stat" => $stat, "msg" => $msg));
    }

    //编辑器图片上传处理方法
    public function ueditor_upload()
    {
        $upload = new Upload("upload/content/" . date("Y") . '/' . date("m") . '/' . date("d"));
        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
        $file = $upload->upload();
        if (!$file) {
            echo "{'title':'" . $upload->error . "','state':'" . $upload->error . "'}";
        } else {
            $info = $file[0];
            $model = K("Upload");
            $model->insert_to_table($info);
            $info['url'] = __ROOT__ . '/' . $info['path'];
            $info["state"] = "SUCCESS";
            echo "{'url':'" . $info['url'] . "','title':'" . $title . "','original':'" . $info["filename"] . "','state':'" . $info["state"] . "'}";
        }
        exit;
    }
}