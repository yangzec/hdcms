<?php
/**
 * 内容属性管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class FlagControl extends AuthControl
{
    //模型
    protected $db;

    public function __init()
    {
        parent::__init();
        $this->db = K("Flag");
    }

    //属性列表
    public function index()
    {
        $flag = $this->db->all();
        $this->assign("flag", $flag);
        $this->display();
    }

    //删除属性
    public function del_flag()
    {
        $fid = q("request.fid", null, "intval");
        if ($fid && $this->db->del_flag($fid)) {
            $this->ajax_return(1, "删除成功");

        }
    }

    //修改属性
    public function edit()
    {
        if (IS_POST && !empty($_POST['flag'])) {
            foreach ($_POST['flag'] as $fid => $flagname) {
                $this->db->save(array("fid" => $fid, "flagname" => $flagname));
            }
        }
        $this->ajax_return(1, "修改成功");
    }

    //添加属性
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add()) {
                $this->ajax_return(1, "添加成功");
            }
        } else {
            $this->display();
        }
    }
}