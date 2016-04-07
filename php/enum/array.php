<?php

$arr = range('a','z');
$arr2 = array_combine(['k1','k2','k3'],['v1','v2','v3']);
var_dump($arr);

for($i = 0; count($arr)>$i; $i++ ){
    echo $arr[$i].'<br>';
}
echo '<br>';

while(list(, $value) = each($arr)){
    echo $value.'<br>';
}
echo '<br>';

function aprint($value, $key) {
    echo $key . '=&gt;' . $value . '<br>';
}
array_walk($arr, "aprint");
echo '<br>';

foreach($arr as $v){
    echo $v.'<br>';
}

echo '<br>';

for (reset($arr2); ($key = key($arr2)); next($arr2)) {

    echo $key. '=&gt;' .$arr2[$key] . '<br>';
}