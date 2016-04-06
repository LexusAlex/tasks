<?php

function RandomRecords()
{

    $connection = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    $records = [];
    $numberOfRecords = $connection->query('SELECT COUNT(*) FROM test.employee')->fetchColumn();

    $statement = $connection->prepare('SELECT * FROM test.employee WHERE id = :id LIMIT 1');

    for ($i = 1; $i <= 5; $i++) {
        $id = rand(1, $numberOfRecords);
        $statement->execute([':id' => $id]);
        $records[] = $statement->fetch(PDO::FETCH_OBJ);
    }
    return $records;
}


foreach (RandomRecords() as $v) {
    echo $v->id . ' ' . $v->name . '<br>';
}