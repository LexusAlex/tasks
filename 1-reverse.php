<?php
// reverse number
    $n = -123;
    $num = strrev(abs($n));
    $answear = $n > 0 ? $num : -$num;
    var_dump($answear);
?>