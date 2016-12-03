<?php
/*
 * __clone()
 */
namespace oop15;

class Person
{
    public function __clone()
    {
        echo 'cloning obj';
    }
}

$o1 = new Person();
$o2 = clone $o1;
// при клонировании метод __clone будет вызван у обьекта o2 так как создаться его копия