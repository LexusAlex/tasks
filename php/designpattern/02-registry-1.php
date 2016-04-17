<?php
/**
 * Реестр
 */
class Product
{

    /**
     * @var mixed[]
     */
    protected static $data = array();

    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function get($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    final public static function removeProduct($key)
    {
        if (array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        }
    }
}


Product::set('name', 'First product');
Product::set('name2', '2 product');
Product::set('name3', '3 product');
Product::set('name4', '4 product');

print_r(Product::get('name'));
print_r(Product::get('name2'));
print_r(Product::get('name3'));
print_r(Product::get('name4'));

Product::removeProduct('name2');

print_r(Product::get('name2')); // not
