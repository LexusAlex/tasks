<?php
/*
 * final - законченный метод нельзя переопределить в дочерних классах
 * final - законченный класс нельзя унаследовать
 * Обьявить окончательными можно только методы и классы
 */
namespace oop11;

class One
{
    final public function test(){
        echo __METHOD__;
    }
}

class Two extends One
{
    // фатальная ошибка - метод нельзя переопределить
    /*public function test(){
        echo __METHOD__;
    }*/
}

final class Three
{

}
// фатальная ошибка класс нельзя унаследовать он законченный
/*class Four extends Three
{

}*/