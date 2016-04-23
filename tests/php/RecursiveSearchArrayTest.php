<?php

require (__DIR__ . '/../../php/10-RecursionSearchArray.php');

class RecursiveSearchArrayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider values
     */
    public function testSearch($arr,$neddle){
        $res = viewResult($arr,$neddle);
        $this->assertTrue($res);
    }
    
    public function values(){
        return [
            [3,[3]],
            [9,['id1'=>['id2'=>['id3'=>['id4'=>['id5'=>['num'=>9]]]]],]],
            ['text',[[[[[[[[[['i'=>'text']]]]]]]]]]]
        ]; 
    }
}
