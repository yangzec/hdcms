<?php
class ContentModel extends RelationModel
{
    //栏目id
    protected $cid;
    //模型mid
    protected $mid;
    //模型缓存
    protected $model;
    //栏目缓存
    protected $category;
    //自动完成
    public $auto = array(
        array("addtime", "time", 2, 1, "function"),
        array("updatetime", "_updatetime", 2, 3, "method"),
        array("username", "_username", 2, 3, "method"),
        array("source", "_source", 2, 3, "method"),
    );

    //修改时间处理
    public function _updatetime($v)
    {
        return empty($v) ? time() : strtotime($v);
    }

    //自动完成来源source
    public function _source($v)
    {
        return !empty($v) ? $v : C("webname");
    }

    //用户名字段自动完成
    public function _username($v)
    {
        return empty($v) ? session("username") : $v;
    }

    //获得内容
    public function __construct()
    {
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $this->model = F("model", false, MODEL_CACHE_PATH);
        $this->cid = Q("request.cid", null, "intval");
        $mid = Q("mid", NULL, "intval");
        $this->mid = $mid ? $mid : $this->category[$this->cid]['mid'];
        //模型表
        $this->table = $this->model[$this->mid]['tablename'];
        if (is_null($this->table)) {
            error("没有可操作的表,缺少cid或mid参数");
        }
        //关联栏目表
        $this->join = array(
            "category" => array(
                "type" => BELONGS_TO,
                "foreign_key" => "cid",
                "parent_key" => "cid",
                "field" => array("cid", "catname", "mid")
            ),
            "content_flag" => array(
                "type" => HAS_MANY,
                "foreign_key" => "aid",
                "parent_key" => "aid"
            )
        );
        //副表关联
        if ($this->model[$this->mid]['type'] == 1) {
            $this->join[$this->table . '_data'] = array(
                "type" => HAS_ONE,
                "foreign_key" => "aid",
                "parent_key" => "aid"
            );
        }
        parent::__construct();
    }


    /**
     * 获得内容列表 如果有cid则只得到当前栏目文章，如果有mid则获得所有当前模型的文章（会分页处理）
     * @param int $status 1 正常文章  2 回收站中文章
     * @param $row 显示列表行数
     * @return array
     */
    public function get_list($status = 1, $row = 10)
    {
        $where = "";
        if ($this->cid) {
            $where = "cid=" . $this->cid;
        }
        //统计
        $count = $this->where($where)->where("status=$status")->count();
        $page = new Page($count, $row, 10);
        //获得内容
        $field = "aid,title,addtime,updatetime,username,status,cid";
        $content = $this->field($field)->where($where)->order("arc_sort DESC,aid DESC")
            ->where("status=$status")->limit($page->limit())->all();
        if (!empty($content)) {
            foreach ($content as $n => $c) {
                //获得文章属性
                $flag = $this->join(NULL)->table("content_flag")->field("fid")->where("aid=" . $c['aid'] . " AND cid=" . $c['cid'])->all();
                if ($flag) {
                    $fid = array();
                    foreach ($flag as $f) {
                        $fid[] = $f['fid'];
                    }
                    $flag = $this->join(NULL)->table("flag")->field("flagname")->in($fid)->all();
                    $s = "";
                    foreach ($flag as $f) {
                        $s .= "[" . $f['flagname'] . "] ";
                    }
                    $content[$n]['flagname'] = $s;
                }
            }
        }
        return array("page" => $page->show(), "content" => $content);
    }

    //下载远程图片
    protected function down_remote_pic()
    {

        $data =& $this->data;
        //服务器是否允许远程下载
        $php_ini = @ini_get("allow_url_fopen");
        if ($php_ini && isset($data['down_remote_pic'])) {
            if (isset($data['content_data']) && isset($data['content_data']['content'])) {
                $content = & $data['content_data']['content'];
                //查找所有图片
                preg_match_all("@<img.*?src=['\"](http://.*?[jpg|jpeg|png|gif])['\"].*?>@i", $content, $imgs);
                if (!isset($imgs[1]) || empty($imgs[1])) {
                    return false;
                }
                import("Upload.Control.UploadControl");
                $upload = new UploadControl();
                foreach ($imgs[1] as $img) {
                    //本站图片不进行处理
                    if (strstr($img, __ROOT__)) continue;
                    if ($d_img = $upload->down_remote_pic($img)) {
                        $content = preg_replace("@$img@", $d_img, $content);
                    }
                }
            }
        }
    }

    //移除没有选中的flag
    private function format_flag()
    {
        if (isset($this->data['content_flag'])) {
            $flag = $this->data['content_flag'];
            $this->data['content_flag'] = array();
            foreach ($flag as $f) {
                if (isset($f['fid'])) {
                    $this->data['content_flag'][] = $f;
                }
            }
        }
    }

    //添加与删除文章时设置字段值
    private function get_field_value($field_info, $v)
    {
        switch ($field_info['show_type']) {

            case "images":
                $d = array();
                foreach ($v['url'] as $n => $path) {
                    if (!empty($path)) {
                        $d[$n]['path'] = $path;
                        $d[$n]['alt'] = isset($v['alt'][$n]) ? $v['alt'][$n] : "";
                    }
                }
                return serialize($d);
            case "select":
                $d = '';
                if (is_array($v) && !empty($v)) {
                    foreach ($v as $c) {
                        $d .= $c . ',';
                    }
                } else if (is_numeric($v)) {
                    $d = intval($v);
                }
                return substr($d, 0, -1);
            case "date":
                return empty($v) ? 0 : strtotime($v);
            default:
                return $v;
        }
    }

    //修改$_POST的KEY
    private function alter_post_name()
    {
        foreach ($this->data as $field_name => $v) {
            //获得字段信息
            if ($field_info = $this->get_field_info($field_name)) {
                $_v = $this->get_field_value($field_info, $v);
                if ($field_info['table_type'] == 2) {
                    $this->data[$field_info['table_name']][$field_name] = $_v;
                    unset($this->data[$field_name]);
                } else {
                    $this->data[$field_name] = $_v;
                }
            }
        }
    }

    //根据字段名，获得字段结构信息
    private function get_field_info($field_name)
    {
        $field = F($this->mid, false, FIELD_CACHE_PATH);
        if ($field) {
            foreach ($field as $f) {
                if ($f['field_name'] == $field_name) {
                    //附表字段更改post值
                    return $f;
                }
            }
        }
        return null;
    }

    //如果没有缩略图时删除图片属性
    private function remove_img_flag()
    {
        if (isset($this->data['thumb']) && !empty($this->data['thumb'])) {
            $this->data['content_flag'][4] = array("fid" => 4, "cid" => $this->cid);
        } else {
            if (isset($this->data['content_flag'][4])) {
                unset($this->data['content_flag'][4]);

            }
        }
    }

    //提出第n张图为缩略图
    public function set_thumb_pic()
    {
        //有正文时处理
        if (isset($this->data['auto_thumb']) && $this->data['auto_thumb'] == 1 && empty($this->data['thumb'])) {
            $content = $this->data['content_data']['content'];
            //取得所有图片
            preg_match_all("@<img.*?src=['\"](http://.*?[jpg|jpeg|png|gif])['\"].*?>@i", $content, $imgs);
            //没有图片不进行缩略图自动处理
            if (!isset($imgs[1]) || empty($imgs[1])) {
                return false;
            }
            //取第几张图为缩略图
            $num = isset($this->data['auto_thumb_num']) && intval($this->data['auto_thumb_num']) > 1 ? intval($this->data['auto_thumb_num']) : 1;
            $num--;
            //是否存在这张图
            if (isset($imgs[1][$num]) && !empty($imgs[1][$num])) {
                import("Upload.Control.UploadControl");
                $upload = new UploadControl();
                $d_img = $upload->down_remote_pic($imgs[1][$num]);
                if (preg_match("@" . __ROOT__ . "@", $d_img)) {
                    $this->data['thumb'] = str_ireplace(__ROOT__ . '/', "", $d_img);
                }

            }
        }
    }

    //自动截取内容摘要
    public function set_description_field()
    {
        if ($this->model[$this->mid]['type'] == 2) {
            return;
        }
        $table = $this->table . '_data';
        $description = $this->data[$table]['description'];
        $content = $this->data[$table]['content'];
        if (empty($description) && $this->data['auto_desc'] == 1) {
            //截取长度
            $len = intval($this->data['auto_desc_length']) ? intval($this->data['auto_desc_length']) : 100;
            $content = strip_tags($content);
            $this->data[$table]['description'] = mb_substr($content, 0, $len, "utf8");
        }

    }

    //关键字处理
    public function set_keywords_field()
    {
        if ($this->model[$this->mid]['type'] == 2) {
            return;
        }
        $table = $this->table . '_data';
        $keywords = $this->data[$table]['keywords'];
        $description = preg_replace("@[\s\w]@is", "", $this->data[$table]['description']);
        if (empty($keywords)) {
            $words = String::splitWord($description);
            //没有分词不处理
            if (empty($words)) return;
            $i = 0;
            $k = "";
            foreach ($words as $w => $id) {
                $k .= $w . ",";
                $i++;
                if ($i > 8) break;
            }
            $this->data[$table]['keywords'] = substr($k, 0, -1);
        }

    }

    //插入与编辑前执行的动作
    public function before_action()
    {
        //设置缩略图
        $this->set_thumb_pic();
        //下载远程图片
        $this->down_remote_pic();
        //移除没有选中的flag
        $this->format_flag();
        //处理参数，将复选框值合并
        $this->alter_post_name();
        //如果没有缩略图时删除图片属性
        $this->remove_img_flag();
        //摘要为空时截取内容做为摘要
        $this->set_description_field();
        //关键字处理
        $this->set_keywords_field();
    }

    //修改后执行的动作
    public function after_action()
    {
        //修改文件上传表upload
        $this->update_file_upload_table();
        //更新Url
        $d = $this->alter_content_url();
        if (!is_null($d)) {
            //生成静态
            $_GET['cid'] = $this->cid;
            $_GET['aid'] = $d['aid'];
            ob_start();
            O("Content.Control.IndexControl", "content");
            $html = ob_get_clean();
            $dir = dirname($d['url']);
            is_dir($dir) or dir_create($dir, 0755);
            file_put_contents($d['url'], $html);
        }
    }

    //更新内容页url
    public function alter_content_url()
    {
        $aid = $this->result[$this->table];
        $field = $this->join(NULL)->where("aid=$aid")->find();
        $category = $this->category[$this->cid];
        $arc_html_url = $category['arc_html_url'];
        //栏目静态规则配置错误
        if (empty($arc_html_url)) {
            return null;
        }
        $_s = array(
            '{catdir}', '{y}', '{m}', '{d}', '{aid}'
        );
        //文章发表时间
        $time = getdate($field['addtime']);
        $_r = array(
            $category['catdir'],
            $time['year'],
            $time['mon'],
            $time['mday'],
            $aid
        );
        foreach ($_s as $n => $s) {
            $arc_html_url = str_replace($s, $_r[$n], $arc_html_url);
        }
        $url = rtrim(C("HTMLDIR"), '/\\') . '/' . $arc_html_url;
        $this->trigger()->join(NULL)->save(array("aid" => $aid, "url" => $url));
        //生成静态
        return array("url" => $url, "aid" => $aid);
    }

    //插入与编辑成功后修改文件上传表  使用__after_add等触发器调用
    private function update_file_upload_table()
    {
        $data = array(
            "mid" => $this->mid,
            "cid" => $this->mid,
            "aid" => $this->result[$this->table]
        );
        if (isset($_SESSION['upload_file']) && !empty($_SESSION['upload_file'])) {
            foreach ($_SESSION['upload_file'] as $id => $up) {
                $data['id'] = $id;
                M("upload")->save($data);
            }
        }
        //删除SESSION中上传文件数据
        $_SESSION['upload_file'] = array();
    }

    public function __before_add()
    {
        $this->before_action();
    }

    public function __before_update()
    {
        $this->before_action();
    }

    public function __after_add()
    {
        if (is_null($this->error)) {
            $this->after_action();
        }
    }

    public function __after_edit()
    {
        if (is_null($this->error)) {
            $this->after_action();
        }
    }


}