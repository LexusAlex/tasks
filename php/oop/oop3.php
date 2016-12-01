<?php
/*
 * Конструктор будет создан автоматически при создании обьекта
 * parent::var обращение к родтельскому методу или свойству
 */
namespace oop3;

class BaseClass
{
    public function __construct()
    {
        echo __METHOD__.'<br>';
    }

    public function __destruct()
    {
        echo __METHOD__.'<br>';
    }
}

class SubClass extends BaseClass
{
    public function __construct() // так как мы определили свой конструктор родительский не вызовется
    {
        parent::__construct(); // чтобы вызвать родительский конструктор
        echo __METHOD__.'<br>';
    }

    public function __destruct()
    {
        parent::__destruct();
        echo __METHOD__.'<br>';
    }
}

class SubSubClass extends SubClass
{

}

class SubSubSubClass extends SubSubClass
{

}
class OtherClass extends SubSubSubClass
{
    public function __construct() // Не будет вызван родитель
    {
    }
}
$o1 = new BaseClass(); // BaseClass
$o2 = new SubClass(); // BaseClass SubClass
$o3 = new SubSubClass(); // BaseClass SubClass
$o4 = new SubSubSubClass(); // BaseClass SubClass
$o5 = new OtherClass(); // -