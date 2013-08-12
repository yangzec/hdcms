<?php
class CommonControl extends Control
{
    /**
     * 获得栏目
     */
    protected function getCategory($mid = null)
    {
        $data = array();
        if ($mid) {
            $data = M("category")->where("mid=$mid")->all();
        } else {
            $data = M("category")->all();
        }
        return Data::channel($data, $fieldPri = 'cid', $fieldPid = 'pid', $pid = 0, $sid = null, $type = 2, '─');
    }

    /**
     * 编辑文章视图
     */
    protected function editView()
    {
        $mid = $this->_get("mid", 'intval');
        if (!$mid) $this->error("模型mid为空，非法提交");
        $aid = $this->_get("aid", 'intval');
        if (!$aid) $this->error("文章aid为空，非法提交");
        $db = M("model");
        $model = $db->find($mid);
        //获得主表数据
        $field = $db->table($model['tablename'])->find($aid);
        //获得文章属性
        $field['flag'] = array();
        $flag = $db->table("flag_relation")->all("aid=$aid");
        if ($flag) {
            foreach ($flag as $f) {
                $field['flag'][] = $f['fid'];
            }
        }
        //获得附表数据
        if ($model['type'] == 1) {
            $sField = $db->table($model['tablename'] . '_data')->find('aid=' . $aid);
            $field = array_merge($field, $sField);
        }
        //用户自定义字段处理
        $user_field = F($mid, false, './data/field');
        //设置用户自定义字段
        if ($user_field) {
            foreach ($user_field as $k => $f) {
                $user_field[$k]['html'] = O("FieldModel", "replaceValue", array("field" => $f, "value" => $field[$f['field_name']]));
            }
            $this->assign("user_field", $user_field);
        }
        //分配属性FLAG表单
        $this->assign("flag", M("flag")->all());
        $this->assign("field", $field);
        $this->assign("model", $model);
        //分配栏目
        $this->assign("category", $this->getCategory($mid));
        //分配属性
        $this->assign("flag", $db->table("flag")->all());
        $this->display();
    }

    /**
     * 编辑文章
     */
    protected function editContent()
    {
        //验证文章aid
        $aid = $this->_POST("aid", "intval");
        if (!$aid) $this->error("文章aid为空，非法提交");
        //根据模型获得主表名
        $mid = $this->_POST("mid", "intval");
        if (!$mid) $this->error("模型mid为空，非法提交");
        $cid = $this->_post("cid", 'intval'); //栏目cid
        if (!$cid) $this->error("栏目不能为空");
        $model = $this->getModel($mid);
        $db = M($model['tablename']);
        $_POST['updatetime'] = strtotime($_POST['updatetime']);
        //修改主表
        $db->save();
        //模型为基本模型时，添加附表
        if ($model['type'] == 1) {
            $stable = $model['tablename'] . '_data'; //附表
            if (!empty($_POST[$stable])) {
                $data = $_POST[$stable];
                $data['mid'] = $_POST['mid'];
                $data['cid'] = $_POST['cid'];
                $data['aid'] = $aid;
                $db->table($stable)->where("aid=$aid")->save($data);
            }
        }
        //修改缩略图
        $thumb = $this->_post("thumb");
        if (!empty($thumb)) {
            $this->updateThumbStat($mid, $cid, $aid, $thumb);
            //如果上传缩略图时，添加图文属性
            if (!isset($_POST['flag'])) {
                $_POST['flag'] = array();
            }
            $_POST['flag'][] = 4;
        }
        //添加属性
        if (!empty($_POST['flag'])) {
            $this->updateFlag($mid, $cid, $aid, $_POST['flag']);
        }
        $this->success("文章编辑成功", U("index", "mid=$mid"));
    }

    /**
     * 删除文章
     */
    protected function delArticle()
    {
        $mid = $this->_get("mid", 'intval');
        if (!$mid) $this->error("模型mid为空，非法提交");
        $aid = $this->_get("aid", 'intval');
        if (!$aid) $this->error("文章aid为空，非法提交");
        $db = M("model");
        $model = $db->find($mid);
        //删除属性
        $db->table("flag_relation")->del("aid=$aid");
        //删除图片附件
        $uploadFile = $db->table("upload")->all("aid=$aid");
        if ($uploadFile) {
            foreach ($uploadFile as $f) {
                @unlink($f['path']);
            }
        }
        $db->table("upload")->del("aid=$aid");
        //删除主表
        $db->table($model['tablename'])->del("aid=$aid");
        //删除附表
        if ($model['type'] == 1) {
            $db->table($model['tablename'] . '_data')->del("aid=$aid");
        }
        $this->success("删除文章成功", U("index", array('mid' => $_GET['mid'])));
    }

    /**
     * 显示列表首页
     */
    protected function showIndex()
    {
        $mid = $this->_get("mid", 'intval');
        if (!$mid) $this->error("模型mid为空，非法提交");
        //如果参数中有栏目cid则做条件使用
        $cid = $this->_get("cid", "intval");
        $model = M("model")->find($mid);
        if ($model) {
            //主表模型
            $db = M($model['tablename']);
            //统计所有记录数
            if ($cid) {
                $db->where("cid=$cid");
            }
            $count = $db->count();
            //设置分布
            $page = new Page($count);
            //查询当前页文章
            $where = $cid ? " WHERE a.cid=$cid" : "";
            $fix = C("DB_PREFIX");
            $sql = "SELECT title,a.cid,username,catname,a.mid,click,aid,updatetime FROM " . $fix . $model['tablename'] . " AS a JOIN " . $fix . "category AS c ON a.cid=c.cid
             " . $where . " ORDER BY a.aid DESC LIMIT " . current($page->limit());
            $this->assign("page", $page->show());
            $this->assign("content", $db->query($sql));
            $this->display();
        }
    }

    /**
     * 显示添加内容视图
     */
    protected function addView()
    {
        $mid = $this->_get("mid", "intval");
        if (empty($mid)) $this->error("模型mid为空，非法提交");
        $user_field = F($mid, false, './data/field');
        //设置用户自定义字段
        if ($user_field) {
            foreach ($user_field as $k => $f) {
                $user_field[$k]['html'] = O("FieldModel", "replaceValue", array("field" => $f));
            }
            $this->assign("user_field", $user_field);
        }
        //分配属性FLAG表单
        $this->assign("flag", M("flag")->all());
        //分配栏目表单
        $category = M("category")->where("mid=$mid")->all();
        if (empty($category)) {
            $this->error("请先添加栏目", U("Category/index"));
        }
        $this->assign("model", M("model")->find($mid));
        $this->assign("category", $this->getCategory($mid));
        $this->display();
    }

    /**
     * 添加内容
     */
    protected function addContent()
    {
        $mid = $this->_POST("mid", "intval");
        //根据模型获得主表名
        if (!$mid) $this->error("模型mid为空，非法提交");
        $cid = $this->_post("cid", 'intval'); //栏目cid
        if (!$cid) $this->error("栏目不能为空");
        $model = $this->getModel($mid);
        $db = M($model['tablename']);
        $_POST['addtime'] = time();
        $_POST['updatetime'] = strtotime($_POST['updatetime']);
        $_POST['username'] = $_SESSION["username"];
        //添加主表
        $aid = $db->add();
        //模型为基本模型时，添加附表
        if ($model['type'] == 1) {
            $stable = $model['tablename'] . '_data'; //附表
            if (!empty($_POST[$stable])) {
                $data = $_POST[$stable];
                $data['mid'] = $_POST['mid'];
                $data['cid'] = $_POST['cid'];
                $data['aid'] = $aid;
                $db->table($stable)->add($data);
            }
        }

        //修改缩略图
        $thumb = $this->_post("thumb");
        if (!empty($thumb)) {
            $this->updateThumbStat($mid, $cid, $aid, $thumb);
            //如果上传缩略图时，添加图文属性
            if (!isset($_POST['flag'])) {
                $_POST['flag'] = array();
            }
            $_POST['flag'][] = 4;
        }
        //添加属性
        if (!empty($_POST['flag'])) {
            $this->updateFlag($mid, $cid, $aid, $_POST['flag']);
        }
        $this->success("添加文章成功", U("index", "mid=$mid"));
    }

    /**
     * 获得模型信息
     * @param int $mid 模型mid
     * @return mixed array|bool
     */
    protected function getModel($mid)
    {
        return M("model")->where("mid=$mid")->find();
    }

    /**
     * 修改upload表中的缩略图状态
     * @param int $mid 模型id
     * @param int $cid 栏目id
     * @param int $aid 文章id
     * @param string $thumb 缩略图
     */
    protected function updateThumbStat($mid, $cid, $aid, $thumb)
    {
        $data = array(
            "aid" => $aid,
            "mid" => $mid,
            "cid" => $cid
        );
        M("upload")->where("path='$thumb'")->save($data);
    }

    /**
     * 上传缩略图
     */
    public function thumbUpload()
    {
        $upload = new Upload();
        $file = $upload->upload();
        $stat = $file ? 1 : 0;
        if ($stat) {
            $file = $file[0];
            $db = M("upload");
            $file['uptime'] = time();
            $file['uid'] = session("uid");
            $upload_id = $db->add($file);
            $this->assign("upload_id", $upload_id);
            $this->assign("img_path", $file['path']);
        }
        $this->assign("stat", $stat);
        $this->display("./hdcms/Common/Tpl/thumb_upload.html");
    }

    /**
     * 添加文章或修改文章的属性
     * @param int $mid 模型id
     * @param int $cid 栏目id
     * @param int $aid 文章ID
     * @param array $flag 属性
     * @return bool
     */
    protected function updateFlag($mid, $cid, $aid, $flag)
    {
        $flag = array_unique($flag);

        $db = M("flag_relation");
        $db->where = "aid=$aid and mid=$mid";
        $db->del();
        $data = array(
            "mid" => $mid,
            "cid" => $cid,
            "aid" => $aid
        );
        foreach ($flag as $f) {
            $data['fid'] = $f;
            $db->add($data);
        }
        return true;
    }

    /**
     * 编辑器上传图片
     */
    public function editorUploadImg()
    {
        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES); //对标题实体化
        //目录，上传类型，大小，不加水印，不产生缩略图
        $upload = new Upload('./upload/' . date("ymd"), array('jpg', 'jpeg', 'png'), array(), true, false); //实例化上传类
        $file = $upload->upload(); //上传图像
        if (!$file) { //发生上传错误
            $json = "{'title':'" . $upload->error . "','state':'" . $upload->error . "'}";
        } else {
            $info = $file[0];
            $info['url'] = __ROOT__ . '/' . $info['path'];
            $info["state"] = "SUCCESS";
            $json = "{'url':'" . $info['url'] . "','title':'" . $title . "','original':'" . $info["filename"] . "','state':'" . $info["state"] . "'}";
        }
        $this->_ajax($json, 'TEXT');
    }

    /**
     * 图片上传
     */
    public function uploadImage()
    {
        $image = $this->_files("image");
        $dirs = array();
        //上传图片
        if ($image) {
            $uploadDir = "./upload/" . date("ymd") . '/';
            $upload = new Upload($uploadDir, array('jpg', 'jpeg', 'png'));
            $file = $upload->upload();
            //上传成功
            if (!empty($file)) {
                $file[0] = str_replace('./', '', $file[0]);
                $file[0]['filemtime'] = time();
                $dirs = $file;
                $this->assign("uploadimage", true);
            }
        } else {
            $dir = $this->_get("dir");
            $path = $dir ? base64_decode($dir) : "./upload/";
            $dirs = Dir::tree($path);
        }
        $this->assign("dirs", $dirs);
        $this->display("./hdcms/Common/tpl/uploadImage.html");
    }
}


?>