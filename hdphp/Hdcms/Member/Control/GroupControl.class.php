<?php
class GroupControl extends AuthControl
{
    protected $db;
    //会员组id
    protected $gid;

    public function __init()
    {
        parent::__init();
        $this->db = K("MemberGroup");
        $this->gid = Q("request.gid", 0, "intval");
    }

    //会员组列表
    public function index()
    {
        $group = $this->db->all();
        $db_user = M("user");
        foreach ($group as $n => $g) {
            $group[$n]['allowpost'] = $g['allowpost'] == 1 ? "允许" : "不允许";
            $group[$n]['system'] = $g['is_system'] == 1 ? "是" : "否";
            $group[$n]['allowpostverify'] = $g['allowpostverify'] == 1 ? "需要" : "不需要";
            $group[$n]['allowsendmessage'] = $g['allowsendmessage'] == 1 ? "允许" : "不允许";
            $group[$n]['user_count'] = $db_user->where("gid={$g['gid']}")->count();
        }
        $this->assign("group", $group);
        $this->display();
    }

    //添加会员组
    public function add()
    {
        if (IS_POST) {
            if ($this->db->create()) {
                if ($aid = $this->db->add()) {
                    $this->_ajax(1);
                }
            }
        } else {
            $this->display();
        }
    }

    //修改会员组
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->_ajax(1);
            }
        } else {
            $this->assign("field", $this->db->find($this->gid));
            $this->display();
        }
    }
}