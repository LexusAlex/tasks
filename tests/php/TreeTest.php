<?php

require (__DIR__ . '/../../php/02-AdjacencyListTree.php');

class TreeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerType
     */
    public function testEmpty($type){

        $this->assertEmpty($type);
    }

    public function providerType()
    {
        return array(
            [''],
            [0],
            [0.0],
            ['0'],
            [null],
            [false],
            [[]],
            //[$v],
        );
    }

    public function testLevelsTree(){

        $this->assertTrue(is_array(
            levelsTree(
                [['id' => 1, 'parentid' => 0, 'name' => 'programming languages']]
            )
        )
        );
    }

    /*public function testOne(){
        return 8;
    }
    public function testTwo(){
        return 9;
    }*/

    /**
     * @depends testOne
     * @depends testTwo
     */
    /*public function testRes($first,$second){
        $this->assertEquals([8,9],func_get_args());
        $this->assertEquals($first + $second,17);
        $this->assertGreaterThan($first,$second);
    }*/
    /**
     * @dataProvider providerType
     */
    /*public function testType($type){

        $this->assertTrue(is_array($type));
    }

    public function providerType()
    {
        return array(
            [[]],
            [7],
            ['str'],
            [arr()]
        );
    }*/
    /*public function testLevelsTree (){
        $this->assertEquals(2,1+1);
        $this->assertEquals(5,count([1,2,3,4,5]));
        $this->assertTrue(empty([]));
        $this->assertNotEmpty([1]);
        $this->assertEmpty([]);
        levelsTree([]);

    }*/
}
