<?php
/*
 * __isset($prop) вызывается когда функция isset или emppy вызывается для неопределенного свойства
 * __unset($prop) вызывается когда функция unset вызывается для неопределенного свойства
 */
namespace oop13;

class Test
{
    public function __isset($name)
    {
        echo 'isset not found'.'<br>';
    }
    public function __unset($name)
    {
        echo 'unset not found'.'<br>';
    }
}

$o1 = new Test();

isset($o1->no);
empty($o1->no);
unset($o1->no);