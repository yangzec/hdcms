<?php
/**
 * 显示内容
 * Class ContentControl
 * @category admin
 * @author hdxj
 */
class StudyControl extends RbacControl
{

    /**
     * 显示文章列表
     */
    public function index()
    {
        $this->showIndex();
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if (isset($_POST['title'])) {
            //添加内容
            $this->addContent();
        } else {
            //添加正文视图
            $role = M("role")->where("rname like '%班%'")->all();
            $this->assign("role", $role);
            $this->addView();
        }
    }

    /**
     * 级联学生列表获取 ajax
     */
    public function getStudyList()
    {
        $rid = $this->_post("rid", "intval");
        $db = V("user");
        $db->view = array(
            "user_role" => array(
                "on" => "user.uid=user_role.uid"
            ),
            "role" => array(
                "on" => "user_role.rid=role.rid"
            )
        );
        $user = $db->field("user.uid", "username")->where("role.rid=$rid")->all();
        $this->_ajax($user);
    }

    /**
     * 删除文章
     */
    public function del()
    {
        $mid = $this->_get("mid");
        $aids = $this->_post("aids");
        if ($aids && $mid) {
            foreach ($aids as $aid) {
                $this->delArticle($aid, $mid);
            }
            $url = U("index", array('mid' => $mid));
            $this->_ajax(array("stat" => 1, "url" => $url));
        }
    }

    /**
     * 修改文章
     */
    public function edit()
    {
        //添加文章神图
        if (isset($_POST['title'])) {
            //添加内容
            $this->editContent();
        } else {
            //添加正文
            $this->editView();
        }
    }
}

?>