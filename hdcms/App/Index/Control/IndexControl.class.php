<?php
//测试控制器类
class IndexControl extends Control
{
    /**
     * 网站首页
     */
    public function index()
    {
        $this->display(TPL_PATH . 'index.html');
    }

    public function article()
    {
        $aid = $this->_get('aid', 'intval');
        $mid = $this->_get('mid', 'intval');
        $cid = $this->_get('cid', 'intval');
        if (!$aid || !$mid || !$cid) {
            $this->error("非法请求", "index");
        }
        $model = M("model")->find($mid);
        $pre = C("DB_PREFIX");
        $field = array();
        //基本模型
        if ($model['type'] == 1) {
            $sql = "SELECT * FROM " . $pre . $model['tablename'] . " as a JOIN ";
            $sql .= $pre . $model['tablename'] . '_data AS s JOIN ' . $pre . "category AS c
                ON a.aid=s.aid AND a.cid = c.cid WHERE a.aid=" . $aid;
            $result = M()->query($sql);
            if (!empty($result)) {
                $field = $result[0];
            }
        } else {
            $sql = "SELECT * FROM " . $pre . $model['tablename'] . " as a JOIN ";
            $sql .= $pre . "category AS c ON a.cid = c.cid WHERE a.aid=" . $aid;
            $result = M()->query($sql);
            if (!empty($result)) {
                $field = $result[0];
            }
        }
        if (empty($field)) {
            $this->error("非法请求");
        }
        $tpl = $field['template'] ? $field['template'] : $field['arc_tpl'];
        $field['url'] = getArticleUrl($field);
        //分配操作系统等变量  当模型为学生项目时
        if($mid=6){
            $this->assign("pro_system",array("","window","Ubuntu","Fedora"));
            $this->assign("pro_memory",array("","Mysql","Mysql+Memcache","Mysql+Redis"));
            $this->assign("pro_language",array("","PHP+JavaScript+DivCss+Jquery+Html","JavaScript+DivCss+Jquery+Html"));
        }
        $this->assign("field", $field);
        $arc_html = './template/' . str_replace("{style}", C("style"), $tpl);
        $this->display($arc_html);
    }

    /**
     * 显示栏目列表
     */
    public function category()
    {
        $mid = $this->_get('mid', 'intval');
        $cid = $this->_get('cid', 'intval');
        if (!$mid || !$cid) {
            error("非法请求", "index");
        }
        $category = M("category")->find($cid);
        if ($category['cattype'] == 2) {
            $tpl = './template/' . str_replace("{style}", C("style"), $category['index_tpl']);
        } else {
            $tpl = './template/' . str_replace("{style}", C("style"), $category['list_tpl']);
        }
        if($mid=6){
            $this->assign("pro_system",array("","window","Ubuntu","Fedora"));
            $this->assign("pro_memory",array("","Mysql","Mysql+Memcache","Mysql+Redis"));
            $this->assign("pro_language",array("","PHP+JavaScript+DivCss+Jquery+Html","JavaScript+DivCss+Jquery+Html"));
        }
        $this->assign("field", $category);
        $this->display($tpl);
    }

    /**
     * 修改文章点击次数
     */
    public function updateClick(){
        $model = M("model")->find($this->_get("mid","intval"));
        $table = $model['tablename'];
        $aid = $this->_get("aid","intval");
        $data=array(
            "aid"=>$aid,
            "click"=>"click+1"
        );
        $db = M($table);
        $db->inc("click","aid=$aid",1);
        $field = $db->find($aid);
        echo "document.write({$field['click']})";exit;
    }
}

?>