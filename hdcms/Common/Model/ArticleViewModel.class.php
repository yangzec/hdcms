<?php
class ArticleViewModel extends ViewModel
{
    public $view;

    /**
     * 构造函数
     * @param $table 表名
     * @param $param
     *  参数 array(
     *      "mid"=>1,//模型mid
     *      "flag"=>array(1,2,3)//属性
     *  )
     */
    public function __construct($table, $param)
    {
        parent::__construct($table);
        $this->view = array(
            "category" => array(
                "on" => $table . ".cid=category.cid"
            ),
            "user" => array(
                "on" => $table . ".username=" . "user.username"
            ),
            "model" => array(
                "on" => "model.mid=" . $table . ".mid"
            ),
            "user_role" => array(
                "on" => "user.uid=user_role.uid"
            ),
            "role" => array(
                "on" => "user_role.rid=role.rid",
                "field" => "title|role_title,rname"
            )
        );
        //获得副表数据
        if (isset($param['dataTable']) && $this->getModelType()) {
            $dataTable = $table . '_data';
            $this->view[$dataTable] = array(
                "on" => $dataTable . '.aid=' . $table . '.aid'
            );
        }
        //属性处理
        if (isset($param['flag'])) {
            $this->view["flag_relation"] = array(
                "on" => "flag_relation.aid={$table}.aid",
                "type" => "left",
                "field"=>"fid"
            );
        }
    }

    /**
     * 获得模型是有没有副表
     * @return bool 1:含副表   2:不含副表
     */
    private function getModelType()
    {
        $mid = intval($_GET['mid']);
        $model = $this->table("model")->join()->find($mid);
        if (empty($model)) {
            error("模型不存在");
        }
        return $model['type'] == 1;
    }
}