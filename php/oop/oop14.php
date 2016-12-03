<?php
/*
 * call(name, arg) Клиентский код обращается к неопределенному методу к которому передаются имя метода и массив аргументов
 * делегирование - механизм посредством которого один обеьект может вызвать метод другого обьекта
 * callStatic(name, arg) - будет вызван в статическом контексте при недоступном методе
 */
namespace oop14;

class Test
{
    public function __call($name, $arguments)
    {
        echo 'Call not found method:'. $name;
        var_dump($arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        echo 'Call not found static method:'. $name;
        var_dump($arguments);
    }
}

$o1 = new Test();
$o1->notmethod(12,'str',[]);
$o1::notmethod(34,'str');