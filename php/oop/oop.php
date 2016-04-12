<?php

class A{

    public $a = 'public property'; // отовсюду
    private $b = 'private property'; // только из класса
    protected $c = 'protected property'; // из класса либо из подкласса
    private $noprop = 'no prop';

    public function one(){}
    private function two(){ echo __METHOD__;}
    protected function three(){}

    const MY_CONST = 'value';
    public function __construct()
    {
        echo __METHOD__;
    }

    public function __destruct()
    {
        echo __METHOD__;
    }

    public function __get($name)
    {
        if (method_exists($this,"get{$name}")){
            return "get{$name}";
        }
        else{
            throw new Exception ("Method get{$name} not found");
        }
    }

    public function __set($name, $value)
    {
        if (method_exists($this,"set{$name}")){
            return "set{$name}($value)";
        }
        else{
            throw new Exception ("Method set{$name} not found");
        }
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    static public function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    public function __toString()
    {
        return 'toString';
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    static public function __set_state($an_array)
    {
        // TODO: Implement __set_state() method.
    }
    // php 5.6
    public function __debugInfo()
    {
        // TODO: Implement __debugInfo() method.
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->c;
    }

    public function setA($a)
    {
        $this->a = $a;
    }

    public function setB($b)
    {
        $this->b = $b;
    }

    public function setC($c)
    {
        $this->c = $c;
    }

    static function myStatic(){
        return self::returnText();
    }

    public function getNoprop()
    {
        return $this->noprop;
    }

    public function setNoprop($noprop)
    {
        $this->noprop = $noprop;
    }

    public function returnPrivateMethod(){
        return $this->two();
    }

    public function returnText(){
        return 'Text';
    }




}

class B extends A{

    // можно переопределить конструктор или деструктор если их нет будет вызван родитель
    /*public function __construct()
    {
        echo 'contr4444';
    }*/

    public function parentMethod(){
        return parent::myStatic();
    }


}

class C extends B{
  public function Cfunc(){
      return parent::getNoprop();
  }
}

abstract class D{
    abstract public function Write();
}

class E extends D{
    public function Write()
    {
        echo __METHOD__;
    }
}

interface F{
    public function Read();
}

interface I{
    public function NewFunk();
}
interface L{
    public function SuperFunk();
}

class G implements F,I,L{
    public function Read()
    {
        echo __METHOD__;
    }

    public function NewFunk()
    {
        echo __METHOD__;
    }

    public function SuperFunk()
    {
        echo __METHOD__;
    }
}

trait One{
    public $a = 'prop a';
    public function s(){
        echo __METHOD__;
    }
}

trait Two{
    public $b = 'prop b';
    public function s(){
        echo __METHOD__;
    }
}
trait Three{
    public $c = 'prop c';
    public function s(){
        echo __METHOD__;
    }
}

trait Four{
    public function s(){
        echo __METHOD__;
    }
}

class M{
    use One,Two,Three,Four{
        One::s insteadof Four;
        Two::s insteadof One;
        Three::s insteadof Two;
        Four::s insteadof Three;
}
    public function s(){
        echo __METHOD__;
    }
}
$o1 = new A();

var_dump($o1);
var_dump($o1->a);
var_dump($o1->a = 'new str');
var_dump($o1::myStatic());
var_dump($o1::MY_CONST);
var_dump($o1->noprop);
var_dump($o1->noprop = 'set new noprop');
var_dump($o1->getB());
var_dump($o1->setB('new'));
var_dump($o1->returnPrivateMethod());

$o2 = new B();
var_dump($o2);
var_dump($o2->parentMethod());

$o3 = new C();
var_dump($o3);

$o4 = new E();
var_dump($o4->Write());

$o5 = new G();
var_dump($o5->Read());
var_dump($o5->NewFunk());
var_dump($o5->SuperFunk());

$o6 = new M();
var_dump($o6->s());

foreach ($o1 as $k=>$v){
    echo $k .' '.$v;
}
