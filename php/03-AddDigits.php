<?php
/*
 * 1. Дано число
 * 2. Разделить на подчисла
 *
 * */
// var 1
function addDigits1($num){
    if(!is_integer($num) || is_null($num)){return false;}
    $num = str_split($num);

    $sum = 0;

    for ($i=0; $i<count($num); $i++) {
        $sum += $num[$i];
    }
    if(strlen($sum) >= 2){$val=addDigits1($sum); return $val;}
    return $sum;
}

// var2
function addDigits2($num){
    if(!is_integer($num) || is_null($num)){return false;}
    $arr = str_split(abs($num),1);

    $sum = array_sum($arr);
    if(strlen($sum) >= 2){
        $val=addDigits2($sum);
        return $val;
    }
    return $sum;
}
//var_dump(addDigits1(234));
//var_dump(addDigits2(234));