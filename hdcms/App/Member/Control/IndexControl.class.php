<?php
class IndexControl extends Control
{

    public function index()
    {
        if(!session("uid")){
            go("login");
        }
        $this->display();
    }

    public function out()
    {
        session(NULL);
        go("login");
    }

    public function login()
    {
        if(session("uid")){}
        $username = $this->_post("username", "strip_tags,htmlspecialchars");
        if ($username) {
            $pre = C("DB_PREFIX");
            $user = $pre."user";
            $role = $pre.'role';
            $user_role = $pre.'user_role';
            $sql = "SELECT {$role}.rid,{$role}.rname,{$user}.uid,username,password,user_status FROM $role JOIN $user_role JOIN $user
             ON {$role}.rid = {$user_role}.rid AND {$user_role}.uid = {$user}.uid WHERE {$user}.uid = {$user_role}.uid";
            $user = M()->query($sql);
            if(!$user){
                $this->error("用户不存在",'',1);
                go("login");
            }
            if($user[0]['password']!==md5($_POST['password'])){
                $this->error("密码错误",'',1);
                go("login");
            }
            session("uid",$user[0]['uid']);
            session("username",$user[0]['username']);
            session("rname",$user[0]['rname']);
            session("rid",$user[0]['rid']);
            session("user_status",$user[0]['user_status']);
            go("index");
        } else {
            $this->display();
        }
    }

    public function checkUser()
    {
        $username = $this->_post("username");
        if (M("user")->field("uid")->find("username='$username'")) {
            echo 0;
            exit;
        } else {
            echo 1;
            exit;
        }
    }

    public function checkCode()
    {
        $username = $this->_post("username");
        if ($_SESSION['code'] !== strtoupper($_POST['code'])) {
            echo 0;
            exit;
        } else {
            echo 1;
            exit;
        }
    }

    public function reg()
    {
        $username = $this->_post("username", "strip_tags,htmlspecialchars");
        if ($username) {
            $json = array(
                "stat" => 1,
                "field" => array()
            );
            if ($_SESSION['code'] !== strtoupper($_POST['code'])) {
                $json['stat'] = 0;
                $json['field']['code'] = 0;
            }
            $userDb = M("user");
            if ($userDb->find("username='$username'")) {
                $json['stat'] = 0;
                $json['field']['username'] = 0;
            }
            if ($json['stat'] == 1) {
                $uid = $userDb->add();
                $userDb->table("user_role")->add(array("uid" => $uid, "rid" => 4));
                session("uid", $uid);
                session("rid", 4);
                session("rname", "普通用户");
                session("username", $username);
            }
            $this->assign("stat", json_encode($json));
            $this->display("regChecked");
        } else {
            if (session("uid")) {
                go("index");
            }
            $this->display();
        }
    }

    public function code()
    {
        C(array(
            "CODE_BG_COLOR" => "#ffffff",
            "CODE_FONT_COLOR" => "",
            "CODE_LEN" => 4,
            "CODE_FONT_SIZE" => 22,
            "CODE_WIDTH" => 150,
            "CODE_HEIGHT" => 35,
        ));
        $code = new Code();
        $code->show();
    }
}

?>