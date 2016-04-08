<?php

function connection(){
   return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
}



function getRecord(){

    if(isset($_GET['record'])){
        $record = (int)$_GET['record'];
    }else{
        $record = 'all';
    }

    $r = connection()->prepare('SELECT * FROM test.employee WHERE id =:id');
    $r->execute([':id'=>$record]);
    return $r->fetch(PDO::FETCH_ASSOC);
}

function getPrev(){
    $current = (int)getRecord()['id'];

    $r = connection()->prepare('SELECT * FROM test.employee WHERE id =:id');
    $r->execute([':id'=>$current - 1]);
    return $r->fetch(PDO::FETCH_ASSOC);
}

function getNext(){
    $current = (int)getRecord()['id'];

    $r = connection()->prepare('SELECT * FROM test.employee WHERE id =:id');
    $r->execute([':id'=>$current + 1]);
    return $r->fetch(PDO::FETCH_ASSOC);
}

?>

<h1 style="text-align: center">Текущая запись <?php echo getRecord()['id'];?></h1>
<div style="text-align: center;font-size: 2em;">
    <?php echo getRecord()['name'];?>
</div>


<div style="text-align: center;position: fixed;bottom: 20px;left: 33%;">
    <a href="06-PrevNextRecord.php?record=<?php echo getPrev()['id'];?>">Предыдущая запись</a>
    Текущая запись id - <a href="06-PrevNextRecord.php?record=<?php echo getRecord()['id'];?>"><?php echo getRecord()['id'];?></a>
    <a href="06-PrevNextRecord.php?record=<?php echo getNext()['id'];?>">Следующая запись</a>
</div>


