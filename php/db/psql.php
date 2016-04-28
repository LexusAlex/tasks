<?php

$connectionpsql = new \PDO("pgsql:host=localhost;port=5432;dbname='test';user='postgres';password='root'");

//psql
$stn = $connectionpsql->query('SELECT now()',PDO::FETCH_ASSOC);
$stn2 = $connectionpsql->query('SELECT n FROM t',PDO::FETCH_ASSOC);
$stn3 = $connectionpsql->query('SELECT n FROM t WHERE t.n >= 154',PDO::FETCH_ASSOC);

//var_dump($stn3->fetchAll());

//создать таблицу добавить индекс и вставить 10 000 записей
// create table t(n numeric);
// create index t_idx on t(n);
// insert into t select * from generate_series(1, 10000);

// размер таблицы в кб
// select pg_size_pretty(pg_table_size('t'));

// переименовать базу
//alter database test rename to db;

//Изменить количество соединений
//alter database db connection limit 10;

//Базу данных можно удалить (если к ней нет активных подключений)
//\conninfo
//drop database db;

// Проверить что база есть и можно удалить
//drop database if exists db;

// добавим колонку
//$res = $connectionpsql->exec("ALTER TABLE public.t ADD name VARCHAR(255) NULL;");

// удалить строчки
//$res = $connectionpsql->exec('DELETE FROM "public".t WHERE n >= 100 AND n <= 200');

// обновление записей
//$res = $connectionpsql->exec('UPDATE "public".t SET name = "новая строка" WHERE n >= 1 AND n <= 300');

/*CREATE TABLE city
(
    id INTEGER PRIMARY KEY NOT NULL,
    name VARCHAR(255)
);*/

/*
 * CREATE TABLE public.org
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    id_town INT,
    CONSTRAINT org_city_id_fk FOREIGN KEY (id_town) REFERENCES city (id)
);
CREATE UNIQUE INDEX org_id_town_uindex ON public.org (id_town);
COMMENT ON TABLE public.org IS 'organization';
*/
// запрос на обьединение

//SELECT * FROM org INNER JOIN city ON org.id_town = city.id WHERE city.name = 'Москва'
//var_dump($res);




