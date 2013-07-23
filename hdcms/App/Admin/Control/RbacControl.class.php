<?php
require GROUP_PATH . 'Common/Control/CommonControl.class.php';
class RbacControl extends CommonControl
{
    public function __init()
    {
        header("Cache-control: private");
    }
}