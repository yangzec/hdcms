<?php

function getArticleFlag($aid, $cid, $mid)
{
    $db = M();
    $pre = C("DB_PREFIX");
    $sql = "SELECT distinct(flagname) from {$pre}flag as f JOIN {$pre}flag_relation as fr ";
    $sql.=" ON f.fid=fr.fid ";
    $sql .= " WHERE fr.aid=$aid AND fr.cid=$cid AND fr.mid=$mid";
    return $db->query($sql);
}

/**
 * 后台栏目列表首页(index)显示栏目文章数
 * @param $cid 栏目cid
 * @param $mid 模型mid
 * @return int 文章数
 */
function getArticleCount($cid, $mid)
{
    static $db = null;
    if ($db == null) {
        $db = M("model");
    }
    $model = $db->find($mid);
    return $db->table($model['tablename'])->where("cid=$cid")->count();
}

/**
 * 后台基本配置
 * @param $field 配置字段
 * @return string 配置值
 */
function form_view($field)
{
    $form = '';
    switch ($field['type']) {
        case "string":
            $form = "<input type='text' class='w250' name='{$field['name']}' value='{$field['value']}'/>";
            break;
        case "radio":
            $arr = explode(",", $field['param']);
            foreach ($arr as $k => $n) {
                $f= explode(":",$n);
                $checked = $field['value']==$n[0]?"checked='checked'":"";
                $form.= "<label class='radio'></label><input type='radio' class='radio' {$checked} name='{$field['name']}' value='{$f[0]}'/> {$f[1]} </label>";
            }
            break;
    }
    return $form;
}