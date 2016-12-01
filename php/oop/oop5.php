<?php
/*
 * Статические методы принадлежат обьекту
 * К статическим методам и свойствам происходит обращение в контесте класса а не обьекта
 * Доступ к статическому методу через ::
 * self :: обращение внутри класса к статическому методу или свойству
 *
 * Полезность сего дела:
 * 1.Доступны из любой точки скрипта
 * 2.Свойство доступно каждому экземпляру обьета этого класса
 * 3.Избежать создание обьекта ради вызова простой функции
 */
namespace oop5;

class Foo
{
    public static $num = 23;
    private static $stat = 'statvalue'; // нет доступа из вне
    public static function StaticMethod(){
        echo __METHOD__.'<br>';
    }

    static protected function ProtectedMethod(){
        echo __METHOD__;
    }

    public function StatValue(){
        return self::$num;
    }

    public static function PrivStatValue(){
        return self::$stat;
    }
}

class Bar extends Foo
{
    public static function fooStat(){
        return parent::$num;
    }
}
Foo::StaticMethod(); // к методу
// можно так же так обратится
$classname = 'oop5\Foo';
$classname::StaticMethod();

echo Foo::$num; // к свойству
echo Foo::PrivStatValue(); // к закрытому свойству из нутри класса
$o1 = new Foo();
echo $o1->StatValue(); // или так из нутри класса

// из дочернего класса обращение как parent
echo Bar::fooStat();