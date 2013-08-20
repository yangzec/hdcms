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
        $this->assign("field", $category);
        $this->display($tpl);
    }
}

?>