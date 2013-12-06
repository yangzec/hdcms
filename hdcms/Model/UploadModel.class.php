<?php
class UploadModel extends Model
{
    //将上传文件写入数据表upload
    public function insert_to_table($file)
    {
        $data['cid'] = q("get.cid", 0, "intval");
        $data['mid'] = q("get.mid", 0, "intval");
        $data['aid'] = 0;
        $data['name'] = $file['name'];
        $data['filename'] = $file['filename'];
        $data['path'] = str_replace("./", "", $file['path']);
        $data['ext'] = $file['ext'];
        $data['ext'] = $file['ext'];
        $data['isimage'] = preg_match("@jpg|jpeg|bmp|gif|png@i", $file['ext']);
        $data['size'] = $file['size'];
        $data['uptime'] = time();
        $data['uid'] = $_SESSION['uid'];
        if ($id = $this->add($data)) {
            $this->save_to_session($id, $data['path']);
            return $id;
        }
        return false;
    }

    /**
     * 将上传成功的图缓存到session
     * @param $id upload表的主键
     * @param $path 文件路径，不能有主机名
     */
    public function save_to_session($id, $path)
    {
        if (!isset($_SESSION['upload_file'])) {
            $_SESSION['upload_file'] = array();
        }
        $_SESSION['upload_file'][$id] = $path;
    }

    //删除上传文件
    public function del_file($file)
    {
        if (is_array($file)) {
            foreach ($file as $f) {
                //当前图片id
                foreach ($_SESSION['upload_file'] as $id => $path) {
                    if ($path == $f) {
                        if (@unlink($f)) {
                            if ($this->where(array("id" => $id))->del()) {
                                unset($_SESSION['upload_file'][$id]);
                            }
                        }
                    }
                }
            }
        }
    }
}