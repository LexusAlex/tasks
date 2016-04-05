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
 * insert
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

//$res = $connection->exec('INSERT INTO test (id, text) VALUES(2016,"sometext")');
//$res = $connection->exec('INSERT INTO test (id, text) VALUES(2017,"sometext"),(2018,"sometext"),(2019,"sometext")');
    //int $res
/*
 * delete
 * return int or false
 * */
//$res = $connection->exec('DELETE FROM test WHERE id = 2016');
//$res = $connection->exec('DELETE FROM test WHERE id >= 990 AND id <= 999');
 // int $res

/*$res = $connection->query('DESCRIBE test');
var_dump($res->fetchAll());*/


