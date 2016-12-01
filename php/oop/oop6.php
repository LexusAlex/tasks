<?php
/*
 * Константы задаются один раз для всего класса а не для каждого созданного обьекта
 * Только простые обычные значения без возможности перезаписи
 * Выражения можно писать в константах с версии php 5.6.0
 * Модификаторы видимости констант c php 7.1.0
 */
namespace oop6;

class Constant
{
    const AB = 3;
    const CD = 'value';

    public function show(){
        return self::AB;
    }
}

echo Constant::CD;
// или так
$classname = "oop6\Constant";
echo $classname::AB;
// или же
$o1 = new Constant();
echo $o1->show();