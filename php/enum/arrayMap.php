<?php

$arr = [ ['id'=>1] ,['id'=>8] ];

function f($v) {
    if(is_array($v)){
        foreach ($v as $k=>$val){
          f($val);
        }
    }
    //return $v;
}

$newArr = array_map('f',$arr);

var_dump($newArr);

f($arr);