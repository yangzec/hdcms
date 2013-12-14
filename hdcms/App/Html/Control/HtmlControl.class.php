<?php
/**
 * 静态处理模块
 * Class HtmlControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class HtmlControl extends AuthControl
{
    //模型缓存
    public $model;
    //栏目缓存
    public $category;
    //模型对象
    public $db;

    public function __construct()
    {
        parent::__construct();
        //模型缓存
        $this->model = F("model", false, MODEL_CACHE_PATH);
        //栏目缓存
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
        $cid = Q("cid", NULL, "intval");
        if ($cid) {
            $this->db = K("CategoryView");
        }
    }

    /**
     * 生成首页
     */
    public function create_index()
    {
        if (IS_POST) {
            import("Content.Control.IndexControl");
            ob_start();
            $ob = new IndexControl();
            $ob->index();
            $content = ob_get_clean();
            if (file_put_contents("./index.html", $content) !== false) {
                $html = "<div style='font-size:14px;'>首页更新成功 <a href='./index.html' target='_blank'>浏览</a></div>";
                $this->assign("message", $html);
                $this->display("message");
            }
        } else {
            $this->display();
        }
    }

    //生成栏目缓存配置
    public function get_category_config($cid, $step_row = 10, $url = null)
    {
        if (!is_null($cid)) {
            $_SESSION['html_history'] = __URL__;
            $config['step_row'] = $step_row;
            $config['url'] = $url;
            $_cid = array();
            $db = M("category");
            foreach ($cid as $cid) {
                $cat = $db->field("cid,catname,list_html_url,catdir,cattype")->where("cattype<3 and cid={$cid}")->find();
                if ($cat) {
                    $cat['list_html_url'] = C("HTMLDIR") . '/' . preg_replace(array('@\{catdir\}@i', '@\{cid\}@i'), array($cat['catdir'], $cat['cid']), $cat['list_html_url']);
                    $_cid[$cid] = $cat;
                    $html_dir = C("HTMLDIR") . '/' . $cat['catdir'];
                    $_cid[$cid]['index_html'] = $html_dir . '/index.html';
                    $_cid[$cid]['html_dir'] = $html_dir;
                    $_cid[$cid]['total_page'] = 1;
                    $_cid[$cid]['has_index'] = false;
                }
            }
            $_SESSION['html_category'] = array('step_row' => $step_row, 'url' => $url, 'cid' => $_cid);
        }
    }

    //生成栏目
    public function create_category($cid = null, $step_row = 10, $url = null)
    {
        //创建生成静态配置文件
        $this->get_category_config($cid, $step_row, $url);
        $config =& $_SESSION['html_category'];
        if (empty($config['cid'])) {
            $message = "全部栏目更新完成!";
            $this->assign("message", $message);
            $this->assign("success_url", $_SESSION['html_history']);
            $this->display("message");
            unset($_SESSION['html_category']);
            exit;
        }
        $cat = current($config['cid']);
        //创建目录
        is_dir($cat['html_dir']) or dir_create($cat['html_dir']);
        $_GET['cid'] = $cat['cid'];
        //导入类库
        import("Content.Control.IndexControl");
        $ob = new IndexControl();
        $total = $config['cid'][$cat['cid']]['total_page'];
        for ($i = 0; $i < $config['step_row']; $i++) {
            $_GET['page'] = $total;
            Page::$staticUrl = __ROOT__ . '/' . $cat['list_html_url'];
            ob_start();
            $ob->category();
            $con = ob_get_clean();
            if ($config['cid'][$cat['cid']]['has_index'] === false) {
                //生成首页
                file_put_contents($cat['index_html'], $con);
                $total = Page::$staticTotalPage;
                $config['cid'][$cat['cid']]['has_index'] = true;

            } else {
                $list_html_url = str_replace('{page}', $_GET['page'], $cat['list_html_url']);
                file_put_contents($list_html_url, $con);
                //生成页数减少
                $total--;
                if ($total <= 0) {
                    break;
                }
            }
        }
        if ($total > 0) {
            $config['cid'][$cat['cid']]['total_page'] = $total;
            $message = "继续生成" . $cat['catname'] . "的第{$total}页...";
        } else {
            unset($config['cid'][$cat['cid']]);
            $message = "栏目" . $cat['catname'] . "生成完成!";
        }
        $message .= " <script>
                    window.setTimeout(function(){location.href='" . U("create_category") . "'},3500)</script>";
        $this->assign("message", $message);
        $this->display("message");
    }

    //批量生成栏目静态
    public function batch_category()
    {
        if (IS_POST) {
            //每次生成数
            $step_row = Q("post.step_row");
            //栏目cid
            if ($_POST['mid'] == 0) {
                $cat = M("category")->field("cid")->all();
            } else if (isset($_POST['cid'][0]) && $_POST['cid'][0] == 0) {
                $cat = M("category")->field("cid")->where("mid={$_POST['mid']}")->all();
            } else {
                $cat = $_POST['cid'];
            }
            if (empty($cat)) {
                $this->assign("message", "更新栏目成功<script>
                                window.setTimeout(function(){location.href='" . U("category_set") . "'},3000)</script>");
                $this->display("message");
            } else {
                //获得分页数
                $cid = array();
                foreach ($cat as $c) {
                    $cid[] = $c['cid'];
                }
                $this->create_category($cid, $step_row, __METH__);
            }
        } else {
            $this->assign("model", F("model", false, MODEL_CACHE_PATH));
            $this->display();
        }
    }

    //生成内容页静态
    public function create_content()
    {
        $config = & $_SESSION["create_html_config"];
        //生成静态
        $cid = current($config['cid']);
        $_GET['cid'] = $cid;
        if (empty($cid)) {
            $message = "全部内容更新完毕!";
            $this->assign("message", $message);
        } else {
            import("Content.Control.IndexControl");
            $ob = new IndexControl();
            $model = new ContentViewModel();
            $where = array();
            $where['where'] = $config['where'];
            $where['order'] = $config['order'];
            $model->join(null)->where($where)->where("cid=$cid")->all();
            $con = $model->join("category")->where($where)->where("category.cid=$cid")->
                limit(array($config['current'], $config['step_row']))->field("catname,aid,category.cid,url,ishtml")->all();
            $count = $model->where($where)->where("cid=$cid")->count();
            if (count($con) == 0) {
                $cid = array_shift($config['cid']);
                $config['current'] = 0;
                $cat = M("category")->find($cid);
                $message = "栏目 <font color='red'>{$cat['catname']} </font> 更新完成...
                        <script>window.setTimeout(function(){location.href='" . __METH__ . "'},500)</script>
                        ";
                $this->assign("message", $message);
            } else {
                $dir = dirname($con[0]['url']);
                is_dir($dir) or dir_create($dir, 0755);
                foreach ($con as $c) {
                    if (empty($c['url'])) continue;
                    $_GET['aid'] = $c['aid'];
                    ob_start();
                    $ob->content($c['aid']);
                    $html = ob_get_clean();
                    file_put_contents($c['url'], $html);
                }
                $config['current'] += count($con);
                $message = "栏目<font color='red'> {$con[0]['catname']} </font> 共有<font color='red'>{$count}</font>条记录,
                    已经更新<font color='red'>" . $config['current'] . "</font>条
                    (" . ceil($config['current'] / $count * 100) . "%)
                    <script>window.setTimeout(function(){location.href='" . __METH__ . "'},1)</script>
                    ";
                $this->assign("message", $message);
            }
        }
        $this->assign("success_url", $config['success_url']);
        F("create_html_config", $config);
        $this->display("message");
    }

    //配置内容页静态
    public function batch_content()
    {
        if (IS_POST) {
            //更新类型
            $type = $_POST['type'];
            //更新配置
            $config = array(
                "step_row" => $_POST['step_row'],
                "where" => "",
                "order" => "aid ASC",
                "total_row" => 0, //更新总条数
                "current" => 0 //当前条数
            );
            switch ($type) {
                //更新最新的N条
                case "new":
                    $config['order'] = "aid desc";
                    $config['total_row'] = $_POST['total_row'];
                    break;
                case "time":
                    $start_time = strtotime($_POST['start_time']);
                    $end_time = strtotime($_POST['end_time']);
                    $config['where'] = "addtime >{$start_time} AND addtime <{$end_time}";
                    break;
                case "id":
                    $config['where'] = "aid >{$_POST['start_id']} AND aid <{$_POST['end_id']}";
                    break;
            }
            //栏目cid
            if ($_POST['mid'] == 0) {
                $cid = M("category")->field("cid")->all();
            } else {
                //不限栏目
                if (isset($_POST['cid'][0]) && $_POST['cid'][0] == 0) {
                    $cid = M("category")->field("cid")->where("mid={$_POST['mid']}")->all();
                } else {
                    $cid = $_POST['cid'];
                }

            }
            $config['cid'] = array();
            foreach ($cid as $c) {
                $config['cid'][] = $c['cid'];
            }
            $config['success_url'] = __METH__;
            session("create_html_config", $config);
            $this->assign("message", "初始化完成...<script>window.setTimeout(function(){location.href='" . U("create_content") . "'},1000)</script>");
            $this->display("message");
        } else {
            $this->assign("model", F("model", false, MODEL_CACHE_PATH));
            $this->display();
        }
    }

    //前台选择模型后的ajax加载栏目
    public function get_category()
    {
        $category = F("category", false, CATEGORY_CACHE_PATH);
        $this->_ajax($category);
    }
}












































