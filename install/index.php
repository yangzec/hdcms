<?php
header("Content-type:text/html;charset=utf-8");
if (is_file("./lock.php")) {
    echo '
        <html>
            <head>
            <title>HDCMS提示</title>
            </head>
            <body>
                <div style="background:#FFD896;padding:20px;">你已经安装过HDCMS,请先删除Install目录下的lock.php文件后安装。</div>
            </body>
       </html>
    ';
    exit;
}
define("HDPHP_PATH", "../../hdphp/hdphp/hdphp.php");
$version = require "./version.php";
define("VERSION", $version['NAME'] . " " . $version['VERSION']);
define("INSTALL_DIR", dirname(dirname(str_replace('\\', '/', __FILE__))));
$step = array(
    1 => "欢迎使用HDCMS",
    2 => "这不是正式版",
    3 => "许可协议",
    4 => "安装环境检测",
    5 => "安装参数设置",
    7 => "导入数据库",
    8 => "完成安装！"
);
$s = isset($_GET['step']) ? $_GET['step'] : 1;
switch ($s) {
    case 1:
        require "./template/1.php";
        exit;
    case 2:
        require "./template/2.php";
        break;
    case 3:
        require "./template/3.php";
        break;
    case 4: //环境检测
        $host = $_SERVER["HTTP_HOST"];
        $server = $_SERVER["SERVER_SOFTWARE"];
        $php_version = PHP_VERSION;
        $install_dir = INSTALL_DIR;
        $allow_url_fopen = (ini_get('allow_url_fopen') ? '<span class="dir_success">On</span>' : '<span class="dir_success">Off</span>');
        $safe = (ini_get('safe_mode') ? '<span class="dir_error">On</span>' : '<span class="dir_success">Off</span>');
        $gd_info = gd_info();
        $gd = !empty($gd_info) ? '<span class="dir_success">On</span>' : '<span class="dir_error">Off</span>';
        $mysql = function_exists("mysql_connect") ? '<span class="dir_success">Off</span>' : '<span class="dir_success">Off</span>';
        //检测目录
        $dirctory = array(
            "/",
            "data",
            "data/config",
            "data/config/db.inc.php",
            "index.php",
        );
        require "./template/4.php";
        break;
    case 5: //数据配置
        require "./template/5.php";
        break;
    case 6: //执行安装
        require "./template/6.php";
        break;
    case 7: //安装完成
        //创建锁文件
        touch("lock.php");
        require "./template/7.php";
        break;
    case "check_connect":
        //检测配置
        if (@mysql_connect($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASSWORD'])) {
            //数据库不存在时创建数据库
            if (@mysql_select_db($_POST['DB_DATABASE'])) {
                echo 2;
                exit;
            } else {
                mysql_query("CREATE DATABASE " . $_POST['DB_DATABASE'] . " CHARSET UTF8");
                create_install_config();
                echo 1;
                exit;
            }
        } else {
            die(0);
            break;
        }
    case "create_database": //创建数据库
        create_install_config();
        echo 1;
        exit;
        break;
    case "install": //开始安装
        //删除hdcms临时目录temp
        require "../hdphp/hdphp/Extend/Tool/Dir.class.php";
        is_dir("../temp") and Dir::del("../temp");
        $config = require "config.inc.php";
        $db_prefix = $config['DB_PREFIX'];
        ob_implicit_flush(1);
        $db = M();
        //创建结构
        require "db/structure.php";
        //插入表数据
        foreach (glob("./db/*") as $f) {
            if (preg_match('@\d+.php@', $f)) {
                require $f;
                $table = preg_replace('@(hd_|_bk_\d+\.php)@', "", basename($f));
                return_msg("{$table} 表数据插入完毕...");
            }
        }
        //修改表信息
        $d = require "admin.inc.php";
        $db->exe("UPDATE {$db_prefix}config SET value='{$d['WEB_NAME']}' WHERE name='webname'");
        $db->exe("UPDATE {$db_prefix}config SET value='{$d['EMAIL']}' WHERE name='email'");
        $db->exe("UPDATE {$db_prefix}user SET username='{$d['ADMIN']}',email='{$d['EMAIL']}',password='" . md5($d['PASSWORD']) . "' WHERE username='admin'");
        //修改配置文件
        copy("config.inc.php", "../data/config/db.inc.php");
        return_msg("创建完毕!<script>setTimeout(function(){parent.location.href='?step=7'},0);</script>");
        break;
}
function create_install_config()
{
    $VERSION = VERSION;
    $config = <<<str
<?php
if (!defined("HDPHP_PATH"))exit("No direct script access allowed");
return array(
    "DB_DRIVER"                     => "mysqli",//数据库驱动
    "DB_HOST"                       => "{$_POST['DB_HOST']}",//数据库连接主机
    "DB_PORT"                       => 3306,//数据库连接端口
    "DB_USER"                       => "{$_POST['DB_USER']}",//数据库用户名
    "DB_PASSWORD"                   => "{$_POST['DB_PASSWORD']}",//数据库密码
    "DB_DATABASE"                   => "{$_POST['DB_DATABASE']}",//数据库名称
    "DB_PREFIX"                     => "{$_POST['DB_PREFIX']}",//表前缀
    "WEB_MASTER"                    => "{$_POST['ADMIN']}",//站长
    "INSERT_TEST_DATA"              => "{$_POST['INSERT_TEST_DATA']}",//安装测试数据
    "VERSION"                       => "{$VERSION}",//HDCMS版本
);
str;
    file_put_contents("config.inc.php", $config);
    $admin = <<<str
<?php
if (!defined("HDPHP_PATH"))exit("No direct script access allowed");
return array(
    "ADMIN"                         => "{$_POST['ADMIN']}",//站长
    "PASSWORD"                      => "{$_POST['PASSWORD']}",//站长密码
    "WEB_NAME"                      => "{$_POST['WEBNAME']}",//网站名称
    "EMAIL"                         => "{$_POST['EMAIL']}",//站长邮箱
);
str;
    file_put_contents("admin.inc.php", $admin);
}

class Db
{
    static $link = null;

    public function __construct()
    {
        if (is_null(self::$link)) {
            global $config;
            mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD']);
            mysql_select_db($config['DB_DATABASE']);
            mysql_query("SET NAMES UTF8");
            self::$link = true;
        }
    }

    function exe($sql)
    {
        global $config;
        $db_prefix = $config['DB_PREFIX'];
        if (!@mysql_query($sql)) {
            echo mysql_error();
        }
        $len = ini_get("output_buffering");
        echo str_repeat(" ", $len);
        if (preg_match('@CREATE TABLE `@', $sql)) {
            preg_match("@CREATE TABLE `{$db_prefix}(.*?)`@", $sql, $t);
            return_msg("{$t[1]} 表创建完毕...");
        }
    }
}

function M()
{
    return new DB();
}

//向浏览器输出写数据信息
function return_msg($msg)
{
    $h = "<span style='color:#555;font-weight: normal;font-size:14px;'>{$msg}<br/>";
    $h .= "<script>window.scrollTo(0,9000)</script>";
    echo $h;
}