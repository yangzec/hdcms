<?php
/**
 * 文件上传
 * Class IndexControl
 * @author hdxj<houdunwangxj@gmail.com>
 */

class UploadControl extends Control
{
    //模型
    protected $db;

    public function __init()
    {
        $this->db = K("Upload");
    }

    //显示文件列表
    public function index()
    {
        //上传目录
        $dir = "./upload/" . q("get.dir", "content", "htmlspecialchars,strip_tags") . "/" . date("Y") . '/' . date("m") . '/' . date("d") . '/';
        //上传数量
        $limit = q("get.limit", 1, "intval");
        $upload = tag("upload",
            array(
                "name" => "hdcms",
                "dir" => $dir,
                "limit" => $limit,
                "width" => 88,
                "height" => 78)
        );
        $get = "";
        foreach ($_GET as $name => $v) {
            $get .= "var $name='$v';\n";
        }
        $this->assign("get", $get);
        $this->assign("upload", $upload);
        $this->display();
    }

    //上传文件处理
    public function hd_uploadify()
    {
        $upload = new Upload(q('post.upload_dir'), array(), array(), q("post.water", null, "intval"));
        $file = $upload->upload();
        if (!empty($file) and is_array($file)) {
            $data['stat'] = 1;
            $data['url'] = __ROOT__ . '/' . $file[0]['path'];
            $data['path'] = $file[0]['path'];
            $data['name'] = $file[0]['name'];
            $data['thumb'] = array();
            $data['isimage'] = 1;
            //写入upload表
            $this->db->insert_to_table(current($file));
        } else {
            $data['stat'] = 0;
            $data['msg'] = $upload->error;
        }
        echo json_encode($data);
        exit;
    }

    //删除图片
    public function hd_uploadify_del()
    {
        $file = array_filter(explode("@@", $_POST['file']));
        $this->db->del_file($file);
        $this->_ajax(1);
    }

    //站内图片
    public function site()
    {
        //只查找自己的图片
        $where = "uid=" . $_SESSION['uid'];
        $count = $this->db->where($where)->count();
        $page = new Page($count, 18, 8);
        $file = $this->db->where($where)->limit($page->limit())->all();
        $this->assign("file", $file);
        $this->assign("page", $page->show());
        $this->display("pic_list");
    }

    //未处理图片
    public function untreated()
    {
        //只查找自己的图片
        $where = "uid=" . $_SESSION['uid'];
        $count = $this->db->where($where)->where("aid=0")->count();
        $page = new Page($count, 18);
        $file = $this->db->where($where)->where("aid=0")->limit($page->limit())->all();
        $this->assign("file", $file);
        $this->assign("page", $page->show());
        $this->display("pic_list");
    }

    //下载远程图片
    public function down_remote_pic($img)
    {
        //没有文件
        if (empty($img)) return $img;
        //已经是本服务器图片
        if (preg_match("@" . __ROOT__ . "@", $img)) return $img;
        error_reporting(E_ERROR | E_WARNING);
        //远程抓取图片配置
        $config = array(
            "savePath" => "upload/" . CONTROL . "/" . date("Y") . "/" . date("m") . "/" . date("d") . '/', //保存路径
            "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp"), //文件允许格式
            "maxSize" => C("down_remote_pic"),
        );
        $uri = htmlspecialchars($img);
        $uri = str_replace("&amp;", "&", $uri);
        if ($data = $this->getRemoteImage($uri, $config)) {
            $data = array_merge($data, array(
                "isimage" => 1,
                "uptime" => time(),
                "uid" => $_SESSION['uid']
            ));
            if ($id = $this->db->add($data)) {
                //上传成功的写入session
                $this->db->save_to_session($id, $data['path']);
                return __ROOT__ . '/' . $data['path'];
            } else {
                return $img;
            }
        } else {
            return $img;
        }
    }


    /**
     * 远程抓取
     * @param $imgUrl 图片url
     * @param $config 配置
     * @return bool
     */
    protected function getRemoteImage($imgUrl, $config)
    {
        C("DEBUG_SHOW", FALSE);
        {
            //http开头验证
            if (strpos($imgUrl, "http") !== 0) {
                array_push($tmpNames, "error");
                return false;
            }
            //获取请求头
            $heads = get_headers($imgUrl);
            //死链检测
            if (!(stristr($heads[0], "200") && stristr($heads[0], "OK"))) {
                array_push($tmpNames, "error");
                return false;
            }

            //格式验证(扩展名验证和Content-Type验证)
            $fileType = strtolower(strrchr($imgUrl, '.'));
            if (!in_array($fileType, $config['allowFiles']) || stristr($heads['Content-Type'], "image")) {
                array_push($tmpNames, "error");
                return false;
            }
            //打开输出缓冲区并获取远程图片
            ob_start();
            $context = stream_context_create(
                array(
                    'http' => array(
                        'follow_location' => false // don't follow redirects
                    )
                )
            );
            //请确保php.ini中的fopen wrappers已经激活
            readfile($imgUrl, false, $context);
            $img = ob_get_contents();
            ob_end_clean();
            //大小验证
            $uriSize = strlen($img); //得到图片大小
            $allowSize = 1024 * C("DOWN_REMOVE_PIC_SIZE"); //文件大小限制，单位KB
            if ($uriSize > $allowSize) {
                array_push($tmpNames, "error");
                return false;
            }
            //创建保存位置
            $savePath = $config['savePath'];
            if (!file_exists($savePath)) {
                Dir::create($savePath);
            }
            //写入文件
            $tmpName = $savePath . rand(1, 10000) . time() . strrchr($imgUrl, '.');
            try {
                $fp2 = @fopen($tmpName, "a");
                fwrite($fp2, $img);
                fclose($fp2);
                array_push($tmpNames, $tmpName);
                return array(
                    "size" => $uriSize,
                    "path" => $tmpName,
                    "name" => basename($tmpName),
                    "ext" => substr(strrchr($imgUrl, '.'), 1)
                );
            } catch (Exception $e) {
                array_push($tmpNames, "error");
            }
            return false;
        }
    }
}























