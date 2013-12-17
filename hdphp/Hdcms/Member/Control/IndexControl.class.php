<?php

class IndexControl extends MemberAuthControl
{
    //获得用户可以发表的模型

    //后台管理
    public function index()
    {
        go("Account/edit");
    }
}