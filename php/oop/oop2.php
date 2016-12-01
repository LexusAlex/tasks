<?php
/*
 * Модификаторы доступа относится к методам и свойствам:
 *
 * Доступ из вне класса
 * public +
 * protected -
 * private -
 *
 * Доступ внутри метода
 * public +
 * protected +
 * private +
 *
 * Доступ внутри другого класса
 * public +
 * protected +
 * private -
 *
 *
 * $this - это ссылка на текущий обьект
 * Метод предоставляющий локальные функции другим методам в классе не нужен пользователям класса
 */
namespace oop2;

class Menu
{
    public $public = 'Public'; // доступ отовсюду
    protected $protected = 'Protected'; // наследники и родительский класс
    private $private = 'Private'; // только из класса где обьявлен

    public function printHello()
    {
        echo $this->public.'<br>'; // доступен
        echo $this->protected.'<br>'; // доступен
        echo $this->private.'<br>'; // доступен
    }

    public function pub() { // можно вызвать откуда угодно
        echo __METHOD__.'<br>';
    }
    protected function prot() { // нельзя вызвать из вне только, внутри этого класса
        echo __METHOD__.'<br>';
    }
    private function priv() { // только внутри этого класса
        echo __METHOD__.'<br>';
    }

    public function printMethods(){
        $this->pub(); // +
        $this->prot(); // +
        $this->priv(); // +
    }
}

class Menu2 extends Menu
{
    public function printHello()
    {
        echo $this->public . '<br>'; // доступен
        echo $this->protected . '<br>'; // доступен
        //echo $this->private.'<br>'; //  не доступен будет ошибка
    }
    public function printMethods(){
        $this->pub(); // +
        $this->prot(); // +
        //$this->priv(); // -
    }
}

$o1 = new Menu();
var_dump($o1->public);
$o1->printHello();
$o1->pub();
$o1->printMethods();

$o2 = new Menu2();
$o2->printHello();
$o2->pub();
$o2->printMethods();