<?php

require (__DIR__ . '/../../php/03-AddDigits.php');

class AddDigitsTest extends PHPUnit_Framework_TestCase
{
    public function testEq(){
        $d = addDigits1(12);
        $d2 = addDigits2(12);
        $this->assertEquals($d,3);
        $this->assertEquals($d2,3);
    }
    /**
     * @dataProvider values
     */
    public function testValue($type,$num){
        $d = addDigits1($type);
        $d2 = addDigits2($type);
        $this->assertEquals($d,$num);
        $this->assertEquals($d2,$num);
    }

    public function values(){
        return [
            [12,3],
            [10000000,1],
            [567,9],
            [00000000000000,0],
            [222,6]
        ];
    }
}
