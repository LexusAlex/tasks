<?php

/**
 * @return array
 */
function arr()
{
    return [
        ['id' => 1, 'parentid' => 0, 'name' => 'programming languages'],
        ['id' => 3, 'parentid' => 1, 'name' => 'php'],
        ['id' => 4, 'parentid' => 1, 'name' => 'javascript'],
            ['id' => 7, 'parentid' => 4, 'name' => 'jquery'],
                ['id' => 8, 'parentid' => 7, 'name' => 'jqueryUI'],
                    ['id' => 10, 'parentid' => 8, 'name' => 'datePicker'],
        ['id' => 9, 'parentid' => 4, 'name' => 'AngularJS'],
        ['id' => 5, 'parentid' => 1, 'name' => 'ruby'],
        ['id' => 6, 'parentid' => 1, 'name' => 'sql'],
        ['id' => 2, 'parentid' => 0, 'name' => 'athors'],
        ['id' => 22, 'parentid' => 0, 'name' => 'number'],
        ['id' => 23, 'parentid' => 22, 'name' => 'positive number'],
        ['id' => 25, 'parentid' => 23, 'name' => 'one'],
        ['id' => 26, 'parentid' => 23, 'name' => 'first'],
        ['id' => 27, 'parentid' => 23, 'name' => 'ten'],
        ['id' => 24, 'parentid' => 22, 'name' => 'negative number'],

    ];
}
// return levels
// 0 - root 1 - languages ... 4
/**
 * @param array $array
 * @return array
 */
function levelsTree(array $array){
    if(empty($array)){return false;}
    $levels = [];
    //if(!is_array($array)){throw new Exception('It is not array');}
    foreach ($array as $a){
        // $a['parentid'] - give all parent id
        if(!array_key_exists('parentid',$a)){return false;}
        $levels[$a['parentid']][] = $a;
    }
    return $levels;
}
/* $list - parentRoot $parent - firstElement */
/**
 * @param $list
 * @param $parent
 * @return array
 */
function createTree(array $list, array $parent){
    $tree = [];
    foreach ($parent as $k=>$l){
        if(isset($list[$l['id']])){
            $l['children'] = createTree($list, $list[$l['id']]);
        }
        $tree[] = $l;
    }
    return $tree;
}
// output recursive tree
/**
 * @param $list
 */
function outputTree(array $list){
    foreach($list as $t){
        echo '<ul>';
        echo '<li>'.$t['name'].'</li>';
        if(array_key_exists('children',$t)){
            outputTree($t['children']);
        }
        echo '</ul>';
    }
}

//$tree = createTree(levelsTree(arr()), levelsTree(arr())[0]);
//outputTree($tree);

function outputTestData(){
    $tree = createTree(levelsTree(arr()), levelsTree(arr())[0]);
    return outputTree($tree);
}
//outputTestData();