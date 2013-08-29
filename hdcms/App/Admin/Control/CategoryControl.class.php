<?php
class CategoryControl extends RbacControl
{
    /**
     * 显示栏目列表
     */
    public function index()
    {
        $this->assign("category", F("category", false, './data/category'));
        $this->display();
    }

    /**
     * 显示内容列表
     * 点击栏目名后，根据当前栏目所属模型的控制器文件，显示当前栏目内容列表
     */
    public function showContentList()
    {
        $cid = $this->_get("cid", "intval");
        $cid or exit;
        $cat = M("category")->find($cid);
        $model = M("model")->find($cat['mid']);
        go(U($model['control'] . '/index', array("cid" => $cid, "mid" => $cat['mid'])));
    }

    /**
     * 验证静态文件目录是否被占用
     */
    public function checkHtmlDir(){
        $htmlDir = $this->_post("html_dir");
        echo M("category")->find("html_dir='{$htmlDir}'")?0:1;
        exit;
    }
    /**
     * 添加栏目到表
     */
    public function add()
    {
        //添加栏目
        if (isset($_POST['catname'])) {
            $db = M("category");
            $cid = $db->add();
            O("CacheControl", "category");
            //设置权限
            $access = isset($_POST['category_member_access']) ? $_POST['category_member_access'] : null;
            if ($access) {
                $db = M("category_member_access"); //目录权限表
                $db->del("cid=$cid"); //删除栏目权限
                $mid = $this->_post("mid"); //模型mid
                foreach ($access as $k => $a) {
                    $a['mid'] = $mid;
                    $a['cid'] = $cid;
                    $a['rid'] = $k; //角色id
                    $db->add($a);
                }
            }
            $this->success("栏目添加成功", "index", 1);
        } else {
            $this->assign("member", M("role")->where("type=2")->all());
            $this->assign("model", F("model", false, './data/model'));
            $this->display();
        }
    }

    /**
     * 编辑栏目
     */
    public function edit()
    {
        $db = M("category");
        $cid = $this->_post("cid");
        //添加栏目
        if ($cid) {
            $db->save();
            O("CacheControl", "category");
            //设置权限
            $access = isset($_POST['category_member_access']) ? $_POST['category_member_access'] : null;
            if ($access) {
                $db = M("category_member_access"); //目录权限表
                $db->del("cid=$cid"); //删除栏目权限
                $mid = $this->_post("mid"); //模型mid
                foreach ($access as $k => $a) {
                    $a['mid'] = $mid; //模型mid
                    $a['isshow'] = isset($a['isshow']) ? $a['isshow'] : 0;
                    $a['issend'] = isset($a['issend']) ? $a['issend'] : 0;
                    $a['cid'] = $cid;
                    $a['rid'] = $k; //角色id
                    $db->add($a);
                }
            }
            $this->success("编辑成功", "index", 1);
        } else {
            $cid = $this->_get("cid");
            $field = $db->where("cid=" . $cid)->find();
            $this->assign("field", $field);
            $this->assign("access", M("category_member_access")->where("cid=$cid")->all());
            $this->assign("member", M("role")->where("type=2")->all());
            $this->assign("model", F("model", false, './data/model'));
            $this->display();
        }
    }

    /**
     * 更新栏目缓存
     */
    public function updateCache()
    {
        O("CacheControl", "category");
        $this->success("缓存更新成功", "index", 1);

    }

    /**
     * 检测栏目移动
     * 返回值为true，表示目标栏目是当前栏目的子栏目，不可以移动
     * @param $s_cid 源cid(子)
     * @param $d_cid 移动目标cid(父）
     * @return bool
     */
//    private function isChild($s_cid, $d_cid)
//    {
//        $db = M("category");
//        //将要移动的栏目是目标栏目的父级，不允许移动
//        return Data::is_child($db->all(), $_POST['cid'], $_POST['pid']);
//    }

    /**
     * 删除栏目
     */
    public function del()
    {
        $cid = $this->_get("cid", "intval");
        $cid or exit(0);
        $db = M("category");
        if ($db->where("pid=$cid")->find()) {
            $this->_ajax(array("stat" => 0, "message" => "请先删除子栏目"));
        }
        $cat = $db->find($cid);
        if ($cat) {
            $model = $db->table("model")->where("mid={$cat['mid']}")->find();
            $tableName = strtolower($model['tablename']); //主表名
            //删除栏目
            $db->where("cid=$cid")->del();
            //删除文章(
            $db->table($tableName)->where("cid=$cid")->del();
            //删除附表
            if ($model['type'] == 1) {
                //删除文章正文
                $db->table($tableName . "_data")->where("cid=$cid")->del();
            }
            //删除属性
            $db->table("flag_relation")->where("cid=$cid")->del();
        }
        O("CacheControl", "category");
        $this->_ajax(array("stat" => 1, "message" => "删除栏目成功","url"=>U("index")));
    }

    /**
     * 验证静态目录html_dir是否已经在使用
     */
//    public function checkHtmlDir()
//    {
//        $dir = $this->_post("html_dir");
//        if (!M("category")->where("html_dir='$dir'")->find()) {
//            echo 1;
//            exit;
//        }
//
//    }

}

?>