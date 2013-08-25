<?php
class UserControl extends Control
{
    /**
     * 修改用户资料
     */
    public function edit()
    {
        $realname = $this->_post("realname");
        if ($realname) {
            M("user")->save();
            session("realname", $realname);
            $this->success("修改资料成功
            <script>
            setTimeout(function(){
               top.location.reload(true);
            },1000)
            </script>");
        } else {
            $this->assign("field", M("user")->find(session("uid")));
            $this->display();
        }
    }

    /**
     * 修改密码
     */
    public function editPassword()
    {
        $db = M("user");
        $user = $db->find(session("uid"));
        $this->_post("password", "md5");
        //验证旧密码
        if (md5($_POST['oldpassword']) !== $user['password']) {
            $this->error("旧密码输入错误");
        }
        $db->save();
        $this->success("密码修改成功", "edit");
    }
}















