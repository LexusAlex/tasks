<?php

/*
    1/ Подключение к базе данных;
    2/ По необходимости, подготовка запроса и связывание параметров;
    3/ Выполнение запроса.

    return result - select, show
    not rerurn result - insert, delete
*/
$connection = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

// Создать базу

//CREATE DATABASE IF NOT EXISTS test DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_general_ci';
//CREATE SCHEMA IF NOT EXISTS test DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_general_ci';
//CREATE SCHEMA test DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_general_ci';

// Удалить базу

//$res = $connection->exec('DROP DATABASE test');

//Создать таблицу

/*$res = $connection->exec("
  CREATE TABLE test.`employee`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'id',
  `name` VARCHAR(255) NOT NULL COMMENT 'name employee',
  `department` VARCHAR(255) NOT NULL COMMENT 'dep which work employee'
)
  ENGINE = 'InnoDB'
  DEFAULT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
  COMMENT 'table Employee';");*/

/*CREATE TABLE test.`department`(
`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'id',
  `name` VARCHAR(255) NOT NULL COMMENT 'name dep'
)
  ENGINE = 'InnoDB'
  DEFAULT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
  COMMENT 'table Department';*/


//Удалить таблицу
//$res = $connection->exec("DROP TABLE test.`employee`");

//Создать таблицу на основании другой таблицы
//$res = $connection->exec("CREATE TABLE test.dublicat LIKE test.employee");

//Изменить таблицу
//добавить колонку ALTER TABLE test.employee ADD COLUMN new INT(12) COMMENT 'newcolumn'
//удалить колонку ALTER TABLE test.employee DROP COLUMN new
//изменить тип колонки ALTER TABLE test.employee MODIFY COLUMN id INT(6)
//изменить название колонки ALTER TABLE test.employee CHANGE department newdep VARCHAR(30)

//Создать индекс
//CREATE INDEX d_index ON test.employee(department);

// Добавить внешний ключ
//ALTER TABLE test.`employee` ADD FOREIGN KEY fk_dep (department) REFERENCES test.`department`(id) ON DELETE CASCADE ON UPDATE CASCADE

/*
 * insert вставка
 * return int or false
 * */

// Вставим 5000 записей с помощью цикла php

/*$v = [];
for ($i = 1; $i < 5000; $i++) {
    $name = 'employer ' . $i;
    $dep = 1;
    $v[] = [$i, $name ,$dep];
}

$id = null;
$name = null;
$dep = null;
//$res = $connection->exec("INSERT INTO test.employee (id, name, department) VALUES ()");

foreach ($v as $k){
    $id = (int)$k[0];
    $name = (string)$k[1];
    $dep = (int)$k[2];
    $connection->exec("INSERT INTO test.employee (id, name, department) VALUES ('".$id."','".$name."','".$dep."')");
}*/
// но лучше поступим так еще 500 записей

/*for ($i = 1; $i < 100; $i++) {
    $name = 'new employer ' . $i;
    $dep = 2;
    $v[] = [$i, $name ,$dep];
}
$name = null;
$dep = null;
$stn = $connection->prepare('INSERT INTO test.employee (name, department) VALUES (:name , :dep)');
foreach ($v as $k){
    $name = (string)$k[1];
    $dep = (int)$k[2];
    $r = $stn->execute([':name' => $name, ':dep' => $dep]);
}
var_dump($r);*/


//$res = $connection->exec('INSERT INTO test (id, text) VALUES(2016,"sometext")');
//$res = $connection->exec('INSERT INTO test (id, text) VALUES(2017,"sometext"),(2018,"sometext"),(2019,"sometext")');
    //int $res

/*
 * delete удаление
 * return int or false
 * */
//$res = $connection->exec('DELETE FROM test WHERE id = 2016');
//$res = $connection->exec('DELETE FROM test WHERE id >= 990 AND id <= 999');
 // int $res


// обновление записей
//$res = $connection->exec('UPDATE test.employee SET name = "новая строка" WHERE id = 5507'); // одна запись
//var_dump($res);

// выборка
/*$stn = $connection->query('SELECT * FROM test.employee',PDO::FETCH_ASSOC);
var_dump($stn);
var_dump($stn->fetchAll());*/
/*$res = $connection->query('DESCRIBE test');
var_dump($res->fetchAll());*/


// Оператор in
/*$names = '2,55,123,4999';
$names = explode(',', $names);
$placeholder = implode(',', array_fill(0, count($names), '?'));

$statement = $connection->prepare("SELECT * FROM test.employee WHERE id IN ($placeholder)");
$statement->execute($names);
var_dump($statement->fetchAll());*/

// Соединения Join

/*$stn = $connection->query('SELECT employee.name AS en , department.name  AS dn  FROM employee INNER JOIN department ON employee.department = department.id WHERE department.id = 2',PDO::FETCH_ASSOC);
var_dump($stn->fetchAll());*/

//SELECT employee.name AS en , department.name  AS dn  FROM employee RIGHT JOIN department ON employee.department = department.id WHERE department.id != 1

// Запрос на обьединение тестовых таблиц
/*
 * SELECT html_elements.name,html_attributes.name
FROM html_elements_attributes
  LEFT JOIN html_attributes ON html_attributes.id = html_elements_attributes.id_attribute
  LEFT JOIN html_elements ON html_elements.id = html_elements_attributes.id_element
WHERE html_attributes.name = 'id'
*/
//удаление одного элемента привлечет за собой удаления всех связей
/*$del = $connection->exec('DELETE FROM test.html_attributes WHERE id = 2');
var_dump($del);*/


// Про записи
//http://xandeadx.ru/blog/mysql/592




