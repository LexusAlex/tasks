<?php

$arr = [
    ['id'=>1, 'parentid'=>0, 'name'=>'programming languages'],
        ['id'=>3, 'parentid'=>1, 'name'=>'php'],
        ['id'=>4, 'parentid'=>1, 'name'=>'javascript'],
            ['id'=>7, 'parentid'=>4, 'name'=>'jquery'],
                ['id'=>8, 'parentid'=>7, 'name'=>'jqueryUI'],
                    ['id'=>10, 'parentid'=>8, 'name'=>'datePicker'],
            ['id'=>9, 'parentid'=>4, 'name'=>'AngularJS'],
        ['id'=>5, 'parentid'=>1, 'name'=>'ruby'],
        ['id'=>6, 'parentid'=>1, 'name'=>'sql'],
    ['id'=>2, 'parentid'=>0, 'name'=>'athors'],

];
// return levels
// 0 - root 1 - languages ... 4
function levelsTree($array){
    $levels = [];
    foreach ($array as $a){
        // $a['parentid'] - give all parent id
        $levels[$a['parentid']][] = $a;
    }
    return $levels;
}
/* $list - parentRoot $parent - firstElement */
function createTree($list, $parent){
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
function outputTree($list){
    foreach($list as $t){
        echo '<ul>';
        echo '<li>'.$t['name'].'</li>';
        if(array_key_exists('children',$t)){
            outputTree($t['children']);
        }
        echo '</ul>';
    }
}

$tree = createTree(levelsTree($arr), levelsTree($arr)[0]);
outputTree($tree);
