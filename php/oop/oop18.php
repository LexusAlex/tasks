<?php
/*
 * Функции для работы с классами и обьектами
 * get_declared_classes() - все обьявленные классы к данному моменту
 * get_declared_interfaces() - все обьявленные интерфейсы к данному моменту
 * get_declared_traits() - все обьявленные трейты к даннному моменту
 * class_exists() - проверяет был ли обьявлен класс, в новых версиях php работает только с классами
 * interface_exists() - проверяем подключен ли в скрипте интерфейс
 * trait_exists() - проверяем подключен ли в скрипте траит
 */
namespace oop18;

require_once '../08-VarDump.php';

trait Test{}

//\VarDumper::dump(get_declared_classes(),10,true);
//\VarDumper::dump(get_declared_interfaces(),10,true);
\VarDumper::dump(get_declared_traits(),10,true);

//var_dump(class_exists('DateTime'));
//var_dump(interface_exists('Traversable'));
//var_dump(trait_exists('oop18\Test'));