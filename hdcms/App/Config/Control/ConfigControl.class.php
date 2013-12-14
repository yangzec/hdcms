<?php
/**
 * 后台网站配置管理
 * Class ConfigControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ConfigControl extends AuthControl
{
    protected $db;

    public function __init()
    {
        $this->db = K("Config");
    }

    //修改
    function edit()
    {
        if (IS_POST) {
            //改变允许上传大小为字节
            foreach ($_POST AS $id => $value) {
                $this->db->save(array("id" => $id, "value" => $value));
            }
            if (!is_writable("./data/config")) {
                $this->_ajax(array("stat" => 0, "msg" => "./data/config目录没有写权限！"));
            } else {
                $config = $this->db->all();
                $data = array();
                foreach ($config as $c) {
                    $data[$c['name']] = $c['value'];
                }
                //写入配置文件
                $data = "<?php if (!defined('HDPHP_PATH')) exit; \nreturn " .
                    var_export($data, true) . ";\n?>";
                file_put_contents("./data/config/config.inc.php", $data);
                $this->_ajax(array("stat" => 1, "msg" => "修改配置文件成功"));
            }
        } else {
            $config = array();
            //站点配置
            $config['web'] = $this->db->all("type=1");
            //高级设置
            $config['grand'] = $this->db->all("type=2");
            //上传配置
            $config['upload'] = $this->db->all("type=3");
            //会员设置
            $config['member'] = $this->db->all("type=4");
            //邮箱配置
//            $config['email'] = $this->db->all("type=5");
            //安全设置
            $config['safe'] = $this->db->all("type=6");
            //水印设置
            $config['water'] = $this->db->all("type=7");
            //内容相关
            $config['content'] = $this->db->all("type=8");
            foreach ($config as $n => $conf) {
                foreach ($conf as $m => $c) {
                    //会员组
                    if ($c['id'] == 121) {
                        $group = $this->db->table("member_group")->all();
                        $config[$n][$m]['html'] = <<<str
                                <tr>
                                    <th class="w150">{$c['title']}</th>
                                    <td class="w250">
                                       <select name="121">
str;
                        foreach ($group as $g) {
                            $checked = $c['value'] == $g['gid'] ? "selected='selected'" : "";
                            $config[$n][$m]['html'] .= "<option value='{$g['gid']}' {$checked}>{$g['gname']}</option>";
                        }
                        $config[$n][$m]['html'] .= <<<str
                                    </select>
                                    </td>
                                    <td>
                                        {$c['name']}
                                    </td>
                                </tr>
str;
                        continue;
                    }
                    //水印位置
                    if ($c['id'] == 133) {
                        ob_start();
                        require TPL_PATH . 'Config/water.php';
                        $con = ob_get_clean();
                        $config[$n][$m]['html'] = $con;
                        continue;
                    }
                    switch ($c['show_type']) {
                        //文本
                        case '文本':
                            $config[$n][$m]['html'] = <<<str
                                <tr>
                                    <th class="w150">{$c['title']}</th>
                                    <td class="w250">
                                        <input type="text" name="{$c['id']}" value="{$c['value']}" class="w400"/>
                                    </td>
                                    <td>
                                        {$c['name']}
                                    </td>
                                </tr>
str;
                            break;
                        //数字
                        case '数字':
                            $config[$n][$m]['html'] = <<<str
                                <tr>
                                    <th class="w150">{$c['title']}</th>
                                    <td class="w250">
                                        <input type="text" name="{$c['id']}" value="{$c['value']}" class="w400"/>
                                    </td>
                                    <td>
                                        {$c['name']}
                                    </td>
                                </tr>
str;
                            break;
                        //布尔
                        case '布尔(1/0)':
                            $_no = $_yes = "";
                            if ($c['value'] == 1) {
                                $_yes = "checked='checked'";
                            } else {
                                $_no = "checked='checked'";
                            }
                            $config[$n][$m]['html'] = <<<str
                                <tr>
                                    <th class="w150">{$c['title']}</th>
                                    <td class="w250">
                                        <label><input type="radio" name="{$c['id']}" value="1" $_yes/> 是</label>
                                        <label><input type="radio" name="{$c['id']}" value="0" $_no/> 否</label>
                                    </td>
                                    <td>
                                        {$c['name']}
                                    </td>
                                </tr>
str;
                            break;
                        //多行文本
                        case '多行文本':
                            $config[$n][$m]['html'] = <<<str
                                <tr>
                                    <th class="w150">{$c['title']}</th>
                                    <td class="w250">
                                        <textarea class="w400 h100" name="{$c['id']}">{$c['value']}</textarea>
                                    </td>
                                    <td>
                                        {$c['name']}
                                    </td>
                                </tr>
str;
                            break;
                    }
                }
            }
            $this->assign("config", $config);
            $this->display();
        }
    }
}






































