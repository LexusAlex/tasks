<?php
/*
 * Абстактным может быть класс и метод
 * Нельзя создать экземпляр абстрактного класса
 * Абстрактный класс будет содержать по крайней мере один абстрактный метод
 * В остальном абстрактный класс имеет те же возможности что и обычный класс
 * Но в абстрактных классах можно реализовать и полностью методы
 */
namespace oop7;

abstract class NewClass
{
    //метод должен переопределен в дочернем классе
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);
    // обычный метод
    public function getValue2(){
        echo __METHOD__;
    }
}

class My extends NewClass
{
    // при этом сигнатура должна совпадать
    protected function getValue()
    {
        // TODO: Implement getValue() method.
    }
    // метод должен быть реализован как и заявлен в абстрактном классе
    protected function prefixValue($prefix)
    {
        // TODO: Implement prefixValue() method.
    }
}

class My2 extends NewClass
{
    // своя реализвация методов
    protected function getValue()
    {
        // TODO: Implement getValue() method.
    }
    protected function prefixValue($prefix)
    {
        // TODO: Implement prefixValue() method.
    }
}

$o1 = new My();

$o1->getValue2(); // вызвали метод из абстрактного класса