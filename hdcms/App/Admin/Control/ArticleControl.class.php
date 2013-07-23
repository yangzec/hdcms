<?php
/**
 * 显示内容
 * Class ContentControl
 * @category admin
 * @author hdxj
 */
class ArticleControl extends RbacControl
{

    /**
     * 显示文章列表
     */
    public function index()
    {
        $mid = $this->_get("mid");
        $model = M("model")->find($mid);
        if ($model) {
            $db = M($model['tablename']);
            $count = $db->count();
            $page = new Page($count);
            $this->assign("page", $page);
            $fix = C("DB_PREFIX");
            $sql = "SELECT title,a.cid,username,catname,mid,click,aid,updatetime FROM " . $fix . $model['tablename'] . " AS a JOIN " . $fix . "category AS c ON a.cid=c.cid
             ORDER BY a.aid DESC";
            $this->assign("content", $db->query($sql));
            $this->display();
        }
    }

    /**
     * 添加文章
     */
    public function add()
    {
        P($_POST);
        //添加文章神图
        if (isset($_POST['send'])) {
            $mid = $this->_POST("mid", "intval");
            P($_POST);
            if (!$mid) exit;
            $model = M("model")->where("mid=$mid")->find();
            $db = M($model['tablename']);
            //添加主表
            $aid = $db->add();
            //基本模型，添加附表
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
                $data = array(
                    "aid" => $aid,
                    "mid" => $mid,
                    "cid" => $_POST['cid']
                );
                echo $thumb;
                $db->table("upload")->where("path='$thumb'")->save($data);
            }
//            $this->success("添加文章成功");
        } else {
            $mid = $this->_get("mid");
            $field = F($mid, false, './data/field');
            if ($field) {
                foreach ($field as $k => $f) {
                    $field[$k]['html'] = O("FieldModel", "getHtml", $f);
                }
                $this->assign("field", $field);
            }
            //属性FLAG
            $this->assign("flag", M("flag")->all());
            //栏目
            $category = F("category", false, './data/category');
            if (empty($category)) {
                $this->error("请先添加栏目");
            }
            $model = M("model")->find($mid);
            $this->assign("stable", $model['tablename'] . '_data'); //附表
            $this->assign("category", $category);
            $this->display();
        }

    }
}

?>