<?php
/*
 * Что тут важно
 * 1. new используется для создания нового обьекта
 * 2.
 */
namespace oop1;

class Menu
{

}

$o1 = new Menu(); //1
$className = 'oop1\Menu';
$o2 = new $className(); //2
$o3 = new Menu(); // 3
$o4 = $o3; // 3 - ссылка на один и тот же обьект
$o5 =& $o3; // 3 - ссылка на один и тот же обьект
$o6 = clone $o3; // 4 - клон обьекта

var_dump($o1,$o2,$o3,$o4,$o5,$o6);

