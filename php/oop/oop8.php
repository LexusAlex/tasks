<?php
/*
 * Интерфейс - это шаблон, можно только определить функциональность но не реализовать ее
 * Тела методов должны быть пустыми
 * Все методы должны быть публичными
 * Реализующий класс должен реализовать все методы
 * Можно реализовывать несколько интерфейсов также наследоваться друг от друга с помощью extends
 * Могут иметь константы
 * Интерфейс с контролем типов - отличный способ проверки что обьект содержит определенный набор методов
 */
namespace oop8;

interface ITemplate
{
    public function myfunc();
}


class NewClass implements ITemplate
{
    public function myfunc()
    {
        // TODO: Implement myfunc() method.
    }
}

// расширяемые интерфейсы
interface a
{
    public function foo();
}
interface b extends a
{
    public function baz(Baz $baz);
}
class C implements b
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}
// множественное наследование
interface Itemp
{
    public function one();
}
interface Itemp1
{
    public function two();
}
interface Itemp2
{
    public function three();
}
abstract class AbsClass
{
    abstract public function four();
}
// реализуем все что обьявили выше
class NewClass2 extends AbsClass implements Itemp,Itemp1,Itemp2
{
    public function one()
    {
        // TODO: Implement one() method.
    }
    public function two()
    {
        // TODO: Implement two() method.
    }
    public function three()
    {
        // TODO: Implement three() method.
    }
    public function four()
    {
        // TODO: Implement four() method.
    }
}
$o1 = new NewClass();
$o2 = new C();
