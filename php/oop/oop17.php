<?php
/*
 * __sleep() при срабатывании serialize()
 * __wakeup() при срабатывании unserialize()
 */
namespace   oop17;

class Test
{
    public $id;

    public function __sleep()
    {
        echo 'serialize';
        return array();
    }

    public function __wakeup()
    {
        echo 'unserialize';
    }
}

$o1 = new Test();
serialize($o1);
//unserialize($o1);