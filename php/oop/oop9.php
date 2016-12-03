<?php
/*
 * Трейты - это классы от которых нельзя создать обьект, но их можно включить в другие классы
 * Устранение проблем дублирования кода
 * При одинаковых именах возмозжны конфликты имен
 * Можно использовать статические методы в трейте
 */
namespace oop9;

trait Utility
{
    public function calculate(){ // используем один метод в разных местах
        return 'sum';
    }
}

class Product
{
    use Utility;
}

class Service
{
    use Utility;
}

$o1 = new Product();
$o2 = new Service();
echo $o1->calculate();
echo $o2->calculate();

class Base
{
    public function say(){
        echo __METHOD__;
    }
}

trait T1
{
    public function say(){
        echo __METHOD__;
    }
}

trait T2
{
    public function say(){
        echo __METHOD__;
    }
}

class Main extends Base
{
    use T1,T2 {
        // Использовать метод T2::say вместо такого же в трейте T1
        T2::say insteadof T1; // разрешение коллизий
        T1::say as NewMethod; // псевдоним для трейта
        //T2::say as private; // обьявим метод приватным
    }
}

$o3 = new Main();
$o3->say();
$o3->NewMethod();