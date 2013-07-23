<?php
class CommonControl extends Control
{

    /**
     * 上传缩略图
     */
    public function thumb_upload()
    {
        $upload = new Upload();
        $file = $upload->upload();
        $stat = $file ? 1 : 0;
        if ($stat) {
            $file = $file[0];
            $db = M("upload");
            $file['uptime'] = time();
            $file['uid'] = session("uid");
            $upload_id =$db->add($file);
            $this->assign("upload_id",$upload_id);
            $this->assign("img_path", $file['path']);
        }
        $this->assign("stat", $stat);
        $this->display("./hdcms/Common/Tpl/thumb_upload.html");
    }
}

?>