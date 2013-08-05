<?php
class SystemControl extends RbacControl
{
    function index()
    {
        $db = M("system");
        $this->assign("site", $db->all("groupid=1"));
        $this->assign("base", $db->all("groupid=2"));
        $this->assign("upload", $db->all("groupid=3"));
        $this->assign("member", $db->all("groupid=5"));
        $this->display();
    }

    /**
     * 修改配置
     */
    public function update_form()
    {
        $data = $_POST;
        $db = M("system");
        foreach ($data as $name => $value) {
            $db->where("name='$name'")->save(array("value" => $value));
        }
        $config_file = "./data/config/base.inc.php";
        $conf = $db->all();
        $cacheData = array();
        foreach ($conf as $c) {
            $cacheData[$c['name']] = $c['value'];
        }
        $this->save($config_file, $cacheData);
        $this->success("修改配置成功", "water_show");
    }

    /**
     * 写入配置文件
     * @param $config_file 配置文件
     * @param $data 数据
     */
    protected function save($config_file, $data)
    {
        //检测目录写入权限
        if (!is_writable(dirname($config_file))) {
            $this->error("请修改目录" . dirname($config_file) . "为可写权限");
        }
        file_put_contents($config_file, "<?php if (!defined(\"HDPHP_PATH\"))exit;return " . var_export($data, true) . ";\n?>");
    }

    /**
     * 水印设置
     */
    public function water_show()
    {
        $this->display();
    }

    /**
     * 修改水印
     */
    public function update_water()
    {
        $up = new Upload("./data/water");
        $up->waterMarkOn = false;
        $file = $up->upload();
        $water_file = null;
        if ($file) {
            $_file = $file[0]['path'];
            $water_file = "./data/water/water." . $file[0]['ext'];
            is_file($water_file) and unlink($water_file);
            rename($_file, $water_file);
            $_POST['water_img'] = $water_file;
        }
        $data = array_merge(include "./data/config/water.inc.php", $_POST);
        $this->save("./data/config/water.inc.php", $data);
        $this->success("修改配置成功", "water_show");
    }

    /**
     * 验证码设置
     * @access public
     */
    public function code_show()
    {
        $this->display();
    }

    /**
     * 修改验证码
     */
    public function update_code()
    {
        $config_file = "./data/config/code.inc.php";
        $data = array_merge(require $config_file, $_POST);
        $this->save($config_file, $data);
        $this->success("修改配置成功", "code_show");
    }
}