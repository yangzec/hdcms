<?php
//测试控制器类
class IndexControl extends Control
{
    function index()
    {
        header("Content-type:text/html;charset=utf-8");

    }

    public function article()
    {
        $aid = $this->_get('aid');
        $mid = $this->_get('mid');
        if ($mid) {
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
                $sql .= $pre . "category AS c ON a.aid=s.aid AND a.cid = c.cid WHERE a.aid=" . $aid;
                $result = M()->query($sql);
                if (!empty($result)) {
                    $field = $result[0];
                }
            }
            if (empty($field)) {
                $this->error("非法请求");
            } else {
                $this->assign("field", $field);
                $arc_html = './template/'.str_replace("{style}", C("tpl_style"), $field['arc_tpl']);
                $this->display($arc_html);
            }
        }
    }
}

?>