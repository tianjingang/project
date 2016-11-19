<?php
function dealArr($array,$p_id=0,$level=0){
    $arr = array();
    foreach ($array as $v) {
        if ($v['p_id'] == $p_id) {
            $v['level'] = $level;
            $v['html'] = str_repeat('<font color="red">【★★】</font>', $level);
            $arr[] = $v;
            $arr = array_merge($arr, dealArr($array, $v['id'], $level + 1));
        }
    }
    return $arr;
}
