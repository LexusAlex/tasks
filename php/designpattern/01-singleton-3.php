<?php
class Singleton {
    private static $instance;  // экземпляр объекта
    private function __construct(){ /* ... @return Singleton */ }  // Защищаем от создания через new Singleton
    private function __clone()    { /* ... @return Singleton */ }  // Защищаем от создания через клонирование
    private function __wakeup()   { /* ... @return Singleton */ }  // Защищаем от создания через unserialize
    public static function getInstance() {    // Возвращает единственный экземпляр класса. @return Singleton
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function doAction() {
        echo __CLASS__;
    }
}

/*
Применение
*/
Singleton::getInstance()->doAction(); // 

?>