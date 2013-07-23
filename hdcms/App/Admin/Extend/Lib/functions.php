<?php


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