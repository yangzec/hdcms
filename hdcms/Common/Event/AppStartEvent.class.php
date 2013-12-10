<?php
class AppStartEvent extends Event
{
    public function run(&$options)
    {
        $this->install();
    }

    //验证安装
    public function install()
    {
        if (!file_exists('install/lock.php')) {
            header("Location: install/");
            exit;
        }
    }
}