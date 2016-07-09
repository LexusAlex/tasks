<?php

/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 08.07.16
 * Time: 17:56
 */
class CheckPhoneNumber extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider goodValuesCall
     */
    public function testPhone($phone){
        
        $data = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($data) == 10) {
            $data = substr($data, 0, 10);
        } elseif (strlen($data) == 11) {
            $data = substr($data, 1, 10);
            echo $data;
        } elseif ($data > 11 || strlen($data) != 10 || strlen($data) < 10) {
            $data = false;
        }
        if ($data) {
            //$this->sendCall($data['phone'],$sys_ip,$user,$secret,$wait_time);
        }
        echo $data;
        //$this->assertFalse($data);
        $this->assertEquals(strlen($data),10);
    }
    
    /**
     * @dataProvider goodValues
     */
    public function testValidPhone($phone){
        $pattern = '/^\+?[\d\(\)\-]{1,25}$/';
        $result = preg_match($pattern,$phone);
        $this->assertEquals($result,1);    
    }
    
    public function badValues(){
        return [
            ['123456789'],
            ['8(905)99-99-9']
        ];
    }
    public function goodValuesCall() {
        return [
            ['1234567890'],
            ['+7(916)786-89-89'],
            ['7(916)786-89-89'],
            ['7916786-89-89'],
            ['7916666666'],
            ['7-916-777-77-77'],
            ['7(916)(777-77-77)'],
            ['8905-000-00-00'],
        ];
    }
    public function goodValues(){
        return [
            ['+7(916)678-67-67'],
            ['+7(916)1111111'],
            ['7(916)1111111'],
            ['8(916)9999999'],
            ['89169999999'],
            ['8916999999999999999999999'],
        ];
    }
    
}
