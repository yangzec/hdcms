<?php
function getStuName($uid){
    $db=M("user");
    $user = $db->find($uid);
    return $user['username'];
}