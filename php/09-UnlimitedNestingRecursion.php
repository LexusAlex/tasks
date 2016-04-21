<?php

/*$nav_menu = array("Level 1" => array("Level 1 child (a)", "Level 1 child (b)"),
    "Level 2" => array("Level 2 child (a)" =>
        array("Level 2.1 child (a)" =>
            array("Level 2.2 child (a)"),
            "Level 2.1 Child (b)"
        ),
        "Level 2 child (b)"
    ),
    "Level 3"
);

$arr = [
    'language' => [
        ['name' => 'php'],
        ['name' => 'js'],
        ['name' => 'css'],
    ],
    'authors' => [
        ['name' => 'php'],
        ['name' => 'js'],
        ['name' => 'css'],
    ],
];
//print_r($nav_menu);
$rai = new RecursiveArrayIterator($arr);
$rii = new RecursiveIteratorIterator($rai, RecursiveIteratorIterator::SELF_FIRST);
$str ="<ul>";
foreach($rii as $key => $value ) {
    echo "<b>Depth: </b>" . $rii->getDepth() ."<br>";
    echo "<b>Key: </b>" . $key . "<br>";
    echo "<b>Value: </b>"; print_r($value); echo "<br>";
    echo "*************************<br>";
    if($rii->callHasChildren()){
        $str .= "<li>" . $rii -> key();
        $str .= "<ul>";
        //Find out how many children the current parent has
        $children = $rii->callGetChildren();
        $childrenCount = $children->count();
    }
    else {
        $str.= "<li>" . $rii -> current() . "</li>";
        //Close the unordered list if the current child is the final child
        if($rii -> key() == $childrenCount-1) $str.= "</ul>";

    }

}
echo($str);*/

function makeNestedList($array){
    $output = '<ul>';

    foreach($array as $key => $value){

        $output .= "<li><strong>{$key}: </strong>";

        if(is_array($value)){
            $output .= makeNestedList($value);
        }else{
            $output .= $value;
        }
        $output .= '</li>';
    }

    $output .= '</ul>';

    return $output;
}

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
echo makeNestedList($arr);
?>