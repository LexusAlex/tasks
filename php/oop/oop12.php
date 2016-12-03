<?php
/*
 * __get(name) - вызывается когда клиентский код пытается прочитать необьявленное свойство Геттер
 * __set(name,value) - вызывается когда неопределенному свойству присваевается значение Сеттер
 */
namespace oop12;

class Test
{
    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this,"get{$name}")){
            return $this->$method();
        }
        else{
            throw new \Exception ("Method $method not found");
        }
    }

    public function __set($name, $value)
    {
        $method = "set{$name}";
        if (method_exists($this,"set{$name}")){
            return $this->$method($value);
        }
        else{
            throw new \Exception ("Method set{$name} not found");
        }
    }
    /*public function getNoprop(){
        echo __METHOD__;
    }*/

    /*public function setNoprop($value)
    {
        return $value;
    }*/
}

$o1 = new Test();
//$o1->noprop; // так как метода getnoprop нет выбросится исключение
echo $o1->noprop = 'test'; // так как метода нет будет выброшено исключение иначе будет вызван метод set..()
