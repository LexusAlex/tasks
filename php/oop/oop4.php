<?php
/*
 * Наследование, выделение общих вещей в класс
 * В php поддерживается наследование только от одного родителя после слова extends можно указать только один класс имя базового класса
 */

namespace oop4;

class ClassOne
{
    public $variable = __CLASS__;

    public function Hello(){
        echo __METHOD__.'<br>';
    }
}
class ClassTwo extends ClassOne
{
    public $variable = __CLASS__; // Переопределили

    public function Hello(){
        echo __METHOD__.'<br>';
    }
}
class ClassThree extends ClassTwo
{
    public $variable = __CLASS__; // Переопределили

    public function Hello(){
        echo __METHOD__.'<br>';
    }
}

$o1 = new ClassOne();
$o1->Hello();
$o2 = new ClassTwo();
$o2->Hello();
$o3 = new ClassThree();
$o3->Hello();
var_dump($o1,$o2,$o3);


// Пример

class Product // общий класс с общими методами
{
    public function __construct()
    {
        // общий функционал
    }
}
class BookProduct extends Product // специфика для книг
{
    private $title;
    public function __construct()
    {
        parent::__construct();
        // специфичный функционал для книг
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
}
class CDProduct extends Product // специфика для компакт-дисков
{
    public function __construct()
    {
        parent::__construct();
        // специфичный функционал для cd
    }
}
class TVProduct extends Product // специфика для телевиденья
{
    public function __construct()
    {
        parent::__construct();
        // специфичный функционал для tv
    }
}