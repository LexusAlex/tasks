<?php

$arr = [
    ['id'=>20, 'ts'=>12345678, 'ip'=>'127.0.0.1', 'name'=> 'Oleg', 'phone'=> 9012232, 'executors'=>[
        ['name'=>'Olga'],
    ]],
    ['id'=>1, 'ts'=>1265656767, 'ip'=>'127.0.0.1', 'name'=> 'Hello', 'phone'=> 0000032, 'executors'=>[
        ['name'=>'Vova'],
        ['name'=>'Victor'],
    ],'actions'=>[
        [
            'action'=>1,
            'ts'=> 333333,
            'type' => 'call',
            'complete' => 'ok'
        ]
    ],'comments'=>[[
        'name' => 'hohol',
        'ts' => 123344,
        'text' => 55555,
    ]]],
    'name'=>'one',
    'recurse' => [
        ['r1' => [
            'r2' => [
                'r3' => [
                    'r4' => [
                        'r5' => [],
                    ],
                ],
            ],
        ]],
    ],
];


$a = [
    ['id' => 8],
    ['id' => 9],
    ['id' => 10, 'name' => [['com' => 'far']]],
];
/*
 * $needle - что искать
 * $haystack - где искать
 * */
function searchArrayRecursive($needle, $haystack){

    foreach ($haystack as $key => $arr) {
        // если это многомерный массив
        if(is_array($arr)) {
            // прогоняем много раз
            $ret=searchArrayRecursive($needle, $arr);

            if($ret!= false) {
                return $key.','.$ret;
            }

        } else {

            if($arr == $needle) {
                return (string)$key.' => ' .$arr;
            }

        }

    }

    return false;

}

function viewResult($n, array $h){
    $result = searchArrayRecursive($n, $h);

    if($result != false) {
        $result = explode(',', $result);

        foreach($result as $element) {
            echo ' ['.$element.'] ';
        }
        return true;

    }
    else{
        return false;
    }

}

//var_dump(viewResult(1,[[1],[2],[3]]));

?>