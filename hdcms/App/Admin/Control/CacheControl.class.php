<?php
class CacheControl extends RbacControl
{
    /**
     * 更新所有缓存
     */
    public function all($type = true)
    {
        if (!$this->model()) {
            $this->error("缓存目录./data/model不可写，请修改权限");
        }
        if (!$this->modelField()) {
            $this->error("更新模型字段失败");
        }
        if (!$this->category()) {
            $this->error("缓存目录./data/category不可写，请修改权限");
        }
        if ($type)
            $this->success("缓存更新成功");
        return true;
    }

    /**
     * 更新栏目缓存
     */
    public function category()
    {
        $db = V("category");
        $db->view = array( //定义视图
            'model' => array( //定义user_info表规则
                'type' => "inner", //指定连接方式
                "on" => "category.mid=model.mid", //关联条件
            )
        );
        $data = Data::channel($db->all(), $fieldPri = 'cid', $fieldPid = 'pid', $pid = 0, $sid = null, $type = 2, '─');
        return F("category", $data, './data/category');
    }

    /**
     * 更新模型缓存
     */
    public function model()
    {
        $db = M("model");
        return F("model", $db->all(), './data/model');
    }

    /**
     * 更新模型字段缓存
     */
    public function modelField()
    {
        $model = M("model")->all();
        $dbField = K("Field");
        if ($model) {
            foreach ($model as $m) {
                $dbField->updateCache($m['mid']);
            }
        }
        return true;
    }
}

?>