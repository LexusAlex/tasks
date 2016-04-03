<?php
require (__DIR__ . '/../../php/01-Reverse.php');

class ReverseATest extends PHPUnit_Framework_TestCase
{
    public function testValueReverseFunc(){
        $this->assertFalse(reverseAll([]));
    }
}
