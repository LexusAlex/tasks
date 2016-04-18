<?php

// блок 1
session_start();

//id сессии
echo 'id session : '. session_id() .'<br>';

//статус сессии
echo 'status : '. session_status() .'<br>';
// имя сессии
echo 'name : '. session_name() .'<br>';

//очистить фаил но не удалить сессию
//session_destroy();

// Принудительное удаление сессионной cookie
//setcookie(session_name(), session_id(), time()-3600);


// блок 2
if(isset($_SESSION['views']))
    $_SESSION['views']++;
else
    $_SESSION['views'] = 1;

// блок 3
echo "View: $_SESSION[views] <br>";



var_dump($_SESSION);

/*
 1. создание файла  в закрытой директории ОС sess_rpcrn3jajef3l3kpaq3mm4rle5
    то есть посылка ответа сервера что он установил куку Set-Cookie PHPSESSID=rpcrn3jajef3l3kpaq3mm4rle5; path=/
    при последующих посещениях запрос будует таким Cookie PHPSESSID=rpcrn3jajef3l3kpaq3mm4rle5
 2. данные массива SESSION пишутся в фаил на сервере
 3. Сессия живет 1440  секунд
*/