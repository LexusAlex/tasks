<?php

$animals = array(
    array('type'=>'dog', 'name'=>'butch', 'sex'=>'m', 'breed'=>'boxer'),
    array('type'=>'dog', 'name'=>'fido', 'sex'=>'m', 'breed'=>'doberman'),
    array('type'=>'dog', 'name'=>'girly','sex'=>'f', 'breed'=>'poodle'),
    array('type'=>'cat', 'name'=>'tiddles','sex'=>'m', 'breed'=>'ragdoll'),
    array('type'=>'cat', 'name'=>'tiddles','sex'=>'f', 'breed'=>'manx'),
    array('type'=>'cat', 'name'=>'tiddles','sex'=>'m', 'breed'=>'maine coon')
);


/*$iterator =new RecursiveArrayIterator(new ArrayObject($animals));

while($iterator->valid()){
$iterator->key().' -- '.$iterator->current();

$iterator->next();
}*/


/*foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($animals)) as $key=>$value){
	echo $key.' -- '.$value.'<br>';
}*/


/*$iter = new RecursiveArrayIterator($animals);

// Цикл по объекту
// Нам нужно создать RecursiveIteratorIterator например
foreach(new RecursiveIteratorIterator($iter) as $key => $value) {
    echo $key . ": " . $value . "<br>";
}*/

/*$fruits = array("a" => "lemon", "b" => "orange", array("a" => "apple", "p" => "pear"));

$iterator = new RecursiveArrayIterator($fruits);

while ($iterator->valid()) {

    // проверим, есть ли дочерние элементы
    if ($iterator->hasChildren()) {
        // выведем информацию о дочерних элементах
        foreach ($iterator->getChildren() as $key => $value) {
            echo $key . ' : ' . $value . "<br>";
        }
    } else {
        echo "No elem.<br>";
    }

    $iterator->next();
}*/

/*$a = [
    ['id'=>1],
    ['id'=>2, 'var' =>['name'=>'vasya', 'comment' => ['id' => 989900]  ]],
];

$i = new RecursiveArrayIterator($a);
var_dump($i);

foreach ($i as $k=>$v){
    echo $k;
    echo $v;
}*/

/*$arr  = [
    'id'=>8888,
    ['id' => 1, 'exec' => ['name' => 'Dasha'] ],
    ['id' => 44, 'exec' => ['name' => 'Vasya'] ],
];

$it = new RecursiveArrayIterator($arr);
$rit = new RecursiveIteratorIterator($it);

$rii = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::SELF_FIRST);

foreach($rii as $key => $value ) {
    echo "<b>Depth: </b>" . $rii->getDepth() ."<br>";

    if($rii->callHasChildren()){
        echo "<b>Element: </b>" . $key . "<br>";
        echo "<b>Children: </b>";
        print_r($rii->callGetChildren());
        echo "<br>";
    }
    else {
        echo "<b>Element: </b>" . $value . "<br>";
        echo "<b>Children: </b>None";
        echo "<br>";
    }
    echo "*************************<br>";
}*/

/*
 Алгоритм
1. Посчитаем кол-во
2. Проверить является ли текущий элемент массивом
3. Вывести его id
4. Если является то взять этот массив и перейти в шагу 2
5. Не являтся вывести id и value

*/

$a = [
    'id'=>2,
    'one' => ['a' => 5 , 'val' => ['id'=>0000]],
    'two' => ['a' => 99],
    'name' => 76,
];

$i = new RecursiveArrayIterator($a);

//echo $i->count();

function r($arr){
    if(is_array($arr)){
        echo key($arr)." => ";
    }
}

foreach ($i as $key=>$value){

    if(is_array($i->current())){
        echo $i->key()." => ";

        r($i->current());

        echo '<br>';
    }else{
        echo "$key  =>  $value <br>";
    }
}
?>