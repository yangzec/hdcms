<?php
class CommonControl extends Control
{
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
            $sql = "SELECT title,a.cid,username,catname,mid,click,aid,updatetime FROM " . $fix . $model['tablename'] . " AS a JOIN " . $fix . "category AS c ON a.cid=c.cid
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
            $this->error("请先添加当前模型栏目");
        }
        $this->assign("model", M("model")->find($mid));
        $this->assign("category", $category);
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
        $_POST['updatetime'] = time();
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
            $this->addFlag($mid, $cid, $aid, $_POST['flag']);
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
     * 添加文章属性
     * @param int $mid 模型id
     * @param int $cid 栏目id
     * @param int $aid 文章ID
     * @param array $flag 属性
     * @return bool
     */
    protected function addFlag($mid, $cid, $aid, $flag)
    {
        $db = M("flag_relation");
        $db->where = "aid=$aid and mid=$mid and cid=$cid";
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
}

?>