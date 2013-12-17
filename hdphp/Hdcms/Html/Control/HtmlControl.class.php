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

    public function __construct()
    {
        parent::__construct();
        //模型缓存
        $this->model = F("model", false, MODEL_CACHE_PATH);
        //栏目缓存
        $this->category = F("category", false, CATEGORY_CACHE_PATH);
    }

    //向客户端发送生成静态状态信息
    public function message($message, $url = NULL)
    {
        if ($url) {
            $message .= " <script>
                    window.setTimeout(function(){location.href='" . $url . "'},10)</script>";
        }
        $this->assign("url", $url);
        $this->assign("message", $message);
        $this->display("message");
        exit;
    }

    //一键更新
    public function make_all()
    {
        if (!isset($_SESSION['make_all'])) {
            $_SESSION['make_all'] = array("index" => false, "category" => false, "content" => false);
        }
        //生成首页
        if (isset($_SESSION['make_all']['index'])) {
            $this->create_index();
        }
        //生成栏目页
        if (isset($_SESSION['make_all']['category'])) {
            $this->make_category();
        }
        //生成内容页
        if (isset($_SESSION['make_all']['content'])) {
            $this->make_content();
        }
        unset($_SESSION['make_all']);
        $this->message("全站静态更新完毕", U("create_all"));
    }
    //一键生成配置页
    public function create_all(){
        $this->display();
    }
    //生成首页
    public function create_index()
    {
        if (IS_POST or isset($_SESSION['make_all']['index'])) {
            import("Content.Control.IndexControl");
            if (Html::make("IndexControl", "index", array("_html" => "index.html"))) {
                //设置一键生成跳转地址
                if (isset($_SESSION['make_all']['index'])) {
                    $url = U("make_all");
                    unset($_SESSION['make_all']['index']);
                }
                $html = "<div style='font-size:14px;'>首页更新成功 <a href='./index.html' target='_blank'>浏览</a></div>";
                $this->message($html, $url);
            }
        } else {
            $this->display();
        }
    }

    //生成栏目
    public function make_category()
    {
        import("Content.Control.IndexControl");
        //栏目生成静态配置
        $config = session("category_html_config");
        //首次操作：1 创建session配置  2 生栏目所有栏目首页
        if (is_null($config)) {
            $db = M("category");
            $mid = Q("post.mid", 0, "intval");
            //一键生成时的情况，更新所有栏目
            if (isset($_SESSION['make_all']['category'])) {
                $category = $db->field("cid,mid,catname,catdir,is_cat_html,list_html_url")->where("is_cat_html=1")->all();
            } else if (count($_POST['cid']) == 1 and $_POST['cid'][0] == 0) { //没有选择栏目
                //不限模型时
                if ($mid === 0) {
                    $category = $db->field("cid,mid,catname,catdir,is_cat_html,list_html_url")->where("is_cat_html=1")->all();
                } else { //指定模型的所有栏目
                    $category = $db->field("cid,mid,catname,catdir,list_html_url")->where("mid=$mid and is_cat_html=1")->all();
                }
            } else { //指定具体栏目
                $category = $db->field("cid,mid,catname,catdir,list_html_url")->where("is_cat_html=1")->in($_POST['cid'])->all();
            }
            //不存在配置文件时生成栏目首页
            if (is_null($category)) {
                //一键生成时的跳转地址
                if (isset($_SESSION['make_all']['category'])) {
                    $url = U("make_all");
                } else {
                    $url = U("create_category");
                }
                $this->message("没有任何栏目需要生成!", $url);
            } else {
                $config = array();
                //生成所有栏目首页
                foreach ($category as $cat) {
                    //栏目cid IndexControl必须存在这个值
                    $_GET['cid'] = $cat['cid'];
                    $cat['_html'] = C("HTML_PATH") . '/' . $cat['catdir'] . '/index.html';
                    Html::make("IndexControl", "category", $cat);
                    //去掉页数为0时栏目
                    if (Page::$staticTotalPage == 0) continue;
                    $cat['total_page'] = Page::$staticTotalPage;
                    //即将更新的页数，用于计算完成百分比
                    $cat['self_page'] = 1;
                    //每次生成几页
                    $cat['row'] = Q("post.step_row", 10, "intval");
                    $config[$cat['cid']] = $cat;
                }
                //储存配置到session
                session("category_html_config", $config);
                $this->message("栏目静态初始化完成...", __METH__);
            }
        }
        $config = & $_SESSION['category_html_config'];
        if (empty($config)) {
            if (isset($_SESSION['make_all']['category'])) {
                $url = U("make_all");
            } else {
                $url = U("create_category");
            }
            unset($_SESSION['make_all']['category']);
            unset($_SESSION['category_html_config']);
            $this->message("所有栏目生成完毕", $url);
        } else {
            foreach ($config as $n => $cat) {
                for ($i = 0; $i < $cat['row']; $i++) {
                    $_GET['page'] = $config[$n]['self_page'];
                    //即将更新的页数，用于计算完成百分比
                    $config[$n]['self_page']++;
                    $_GET['cid'] = $cat['cid'];
                    $cat['_html'] = C("HTML_PATH") . '/' . str_replace(
                            array('{catdir}', '{cid}', '{page}'),
                            array($cat['catdir'], $cat['cid'], $_GET['page']),
                            $cat['list_html_url']
                        );
                    Html::make("IndexControl", "category", $cat);
                    //如果页数为0表示生成完毕，删除配置文件中的这个栏目
                    if ($config[$n]['total_page'] < $config[$n]['self_page']) {
                        unset($config[$n]);
                        $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                    }
                }
                //本次$cat['row']页生成完毕，执行下一轮静态生成
                $this->message("生成栏目{$cat['catname']}的下" . ($cat['total_page'] - $cat['self_page']) . "页,
                            共有{$config[$n]['total_page']}页
                            (<font color='red'>" . floor($config[$n]['self_page'] / $config[$n]['total_page'] * 100) . "%</font>)", __METH__);
            }
        }
    }

    //生成栏目静态规则配置
    public function create_category()
    {
        session("category_html_config", NULL);
        $this->assign("category", json_encode($this->category));
        $this->assign("model", F("model", false, MODEL_CACHE_PATH));
        $this->display();
    }

    //生成内容页静态
    public function make_content()
    {
        import("Content.Control.IndexControl");
        //栏目生成静态配置
        $config = session("content_html_config");
        //首次操作：1 创建session配置  2 生栏目所有栏目首页
        if (is_null($config)) {
            $db = M("category");
            $mid = Q("post.mid", 0, "intval");
            //没有选择栏目
            if (isset($_SESSION['make_all']['content'])) {
                $category = $db->field("cid,mid,catname,catdir,is_cat_html,list_html_url")->where("is_cat_html=1")->all();
            } else if (count($_POST['cid']) == 1 and $_POST['cid'][0] == 0) {
                //不限模型时
                if ($mid === 0) {
                    $category = $db->field("cid,mid,catname,catdir,is_cat_html,arc_html_url")->where("is_arc_html=1")->all();
                } else { //指定模型的所有栏目
                    $category = $db->field("cid,mid,catname,catdir,arc_html_url")->where("mid=$mid and is_arc_html=1")->all();
                }
            } else { //指定具体栏目
                $category = $db->field("cid,mid,catname,catdir,arc_html_url")->where("is_arc_html=1")->in($_POST['cid'])->all();
            }
            //不存在配置文件时生成栏目首页
            if (is_null($category)) {
                if (isset($_SESSION['make_all']['content'])) {
                    $url = U("make_all");
                } else {
                    $url = U("create_content");
                }
                //一键生成全站关于文章
                unset($_SESSION['make_all']['content']);
                $this->message("没有任何内容需要生成!", $url);
            } else {
                $config = array();
                //生成所有栏目首页
                foreach ($category as $cat) {
                    //当前栏目表
                    $table = $this->model[$cat['mid']]['tablename'];
                    //设置条件
                    $cat['where'] = C("DB_PREFIX") . $table . ".cid=" . $cat['cid'] . ' AND ishtml=1 AND redirecturl=""';
                    $cat['order'] = "";
                    $cat['limit'] = "";
                    //需要更新的总条数
                    $cat['total_row'] = 0;
                    //已经更新的条数
                    $cat['old_total'] = 0;
                    $type = Q("post.type", "all");
                    switch ($type) {
                        case "all":
                            break;
                        case "new":
                            $cat['order'] = "addtime desc";
                            $cat['total_row'] = $_POST['total_row'];
                            break;
                        case "time":
                            $cat['where'] .= " AND addtime>" . strtotime($_POST['start_time']) . " AND addtime<" . strtotime($_POST['end_time']);
                            break;
                        case "id":
                            $cat['where'] .= " AND aid>" . $_POST['start_id'] . " AND aid<" . $_POST['end_id'];
                            break;
                    }
                    //每次生成几条记录
                    $cat['row'] = Q("post.step_row", 20, "intval");
                    //去除没有文章的栏目
                    $db = M($table);
                    $count = $db->where($cat['where'])->order($cat['order'])->count();
                    if (!$count) {
                        continue;
                    }
                    //操作类型不为new时设置需要更新的总条数
                    if (empty($cat['total_row']))
                        $cat['total_row'] = $count;
                    $config[$cat['cid']] = $cat;
                }
                //储存配置到session
                session("content_html_config", $config);
                $this->message("内容静态初始化完成...", __METH__);
            }
        }
        $config = & $_SESSION['content_html_config'];
        if (empty($config)) {
            if (isset($_SESSION['make_all']['content'])) {
                $url = U("make_all");
            } else {
                $url = U("create_content");
            }
            unset($_SESSION['make_all']['content']);
            unset($_SESSION['content_html_config']);
            $this->message("所有文章生成完毕", $url);
        } else {
            foreach ($config as $n => $cat) {
                //如果设置更新最新的N条时，检测是否已经更新完毕
                if ($cat['old_total'] >= $cat['total_row']) {
                    unset($config[$n]);
                    $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                }
                //当前栏目表
                $table = $this->model[$cat['mid']]['tablename'];
                //获得本次更新数据
                $db = M($table);
                $content = $db->field("aid,addtime,html_path")->where($cat['where'])->order($cat['order'])->limit($cat['old_total'], $cat['row'])->all();

                //没有数据可更新时
                if (!$content) {
                    unset($config[$n]);
                    $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                }
                //增加已经更新的记录
                $config[$n]['old_total'] += count($content);
                foreach ($content as $con) {
                    $field = $cat;
                    $field['aid'] = $con['aid'];
                    $field['addtime'] = $con['addtime'];
                    $field['html_path'] = $con['html_path'];
                    $field['_html'] = C("HTML_PATH") . '/' . get_content_html($field);
                    //生成静态IndexControl中的content方法需要这2个变量
                    $_GET['cid'] = $cat['cid'];
                    $_GET['aid'] = $con['aid'];
                    Html::make("IndexControl", "content", $field);
                }
                //本次$cat['row']页生成完毕，执行下一轮静态生成
                $this->message("{$cat['catname']}共有{$cat['total_row']}条记录-
                                已经更新{$config[$n]['old_total']}条
                                (<font color='red'>" . floor($config[$n]['old_total'] / $cat['total_row'] * 100) . "%</font>)", __METH__);
            }
        }
    }

    //生成内容页静态规则配置
    public function create_content()
    {
        session("content_html_config", NULL);
        $this->assign("category", json_encode($this->category));
        $this->assign("model", F("model", false, MODEL_CACHE_PATH));
        $this->display();
    }

}