<?php
/*
 * __toString() - как будет вести себя обьект при преобразовании в строку
 */
namespace oop16;

class Test{
    public function __toString()
    {
        return 'test obj';
    }
}

$o1 = new Test();
var_dump($o1); // выведет object(oop16\Test)[1]
echo $o1;// выведет указанную строку
print $o1;// выведет указанную строку