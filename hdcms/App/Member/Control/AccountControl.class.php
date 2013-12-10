<?php
//用户资料修改
class AccountControl extends MemberAuthControl
{
    protected $db;

    public function __init()
    {
        parent::__init();
        $this->db = K("User");
    }

    //资料修改
    public function edit()
    {
        if (IS_POST) {
            //修改头像
            $this->edit_favicon();
            if ($this->db->create()) {
                $uid = session("uid");
                if (!empty($_POST['password'])) {
                    $old_password = Q("post.old_password", NUll, "md5");
                    $password = Q("post.password", NUll, "trim,md5");
                    $user = $this->db->find($uid);
                    if ($user['password'] != $old_password) {
                        $this->error("旧密码输入错误");
                    }
                    $this->db->save(array("uid" => $uid, "password" => $password));
                }
                $_POST['uid'] = $uid;
                Q("password", "", "unset");
                if ($this->db->save($_POST)) {
                    $this->success("修改资料成功");
                }
            } else {
                $this->error($this->db->error);
            }
        } else {
            $field = $this->db->find(session("uid"));
            $this->assign("field", $field);
            $this->display();
        }
    }

    //修改头像
    private function edit_favicon()
    {
        if (!isset($_FILES['thumb'])) {
            $path = "./upload/favicon/" . date("Y") . '/' . date("m") . '/' . date("d");
            C("UPLOAD_PATH", $path);
            $upload = new Upload();
            $f = $upload->upload();
            if ($f) {
                $file = $f[0]['path'];
                $img = new Image();
                $img->thumb($file, $file, C("FAVICON_WIDTH"), C("FAVICON_HEIGHT"), 6);
                M("user")->save(array(
                    "uid" => session("uid"),
                    "favicon" => $file
                ));
                session("favicon", __ROOT__ . '/' . $file);
            }
        }
    }
}