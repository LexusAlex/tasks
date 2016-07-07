<?php
/*

    4 пробела
    Длина строки 80 - 120 сим

    Пример правильного оформления классов
    namespace Vendor\Package;

    use FooInterface;
    use BarClass as Bar;
    use OtherVendor\OtherPackage\BazClass;

    class Foo extends Bar implements FooInterface
    {
        public function sampleFunction($a, $b = null)
        {
            if ($a === $b) {
                bar();
            } elseif ($a > $b) {
                $foo->bar($arg1);
            } else {
                BazClass::bar($arg2, $arg3);
            }
        }

        final public static function bar()
        {
            // тело метода
        }
    }

    Во всех файлах только (Unix linefeed, т.е. \n
    В конце файла пустая строка
    Закрывающий тег отсуствует

    true / false / null в нижнем регистре

    namespace Vendor\Package;

    use FooClass;
    use BarClass as Bar;
    use OtherVendor\OtherPackage\BazClass;

    Расположение ключевых слов

    class ClassName extends ParentClass implements \ArrayAccess, \Countable
    или
    class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable

    Определение методов

    class ClassName
    {
        public function fooBarBaz($arg1, &$arg2, $arg3 = [])
        {
            // тело метода
        }
    }

    Ключевые слова

        abstract class ClassName
    {
        protected static $foo;

        abstract protected function zim();

        final public static function bar()
        {
            // тело метода
        }
    }

    Вызовы

    bar();
    $foo->bar($arg1);
    Foo::bar($arg2, $arg3);
    $foo->bar(
        $longArgument,
        $longerArgument,
        $muchLongerArgument
    );

    if ($expr1) {
        // тело if
    } elseif ($expr2) {
        // тело elseif
    } else {
        // тело else
    }


    switch ($expr) {
        case 0:
            echo 'First case, with a break';
            break;
        case 1:
            echo 'Second case, which falls through';
            // no break
        case 2:
        case 3:
        case 4:
            echo 'Third case, return instead of break';
            return;
        default:
            echo 'Default case';
            break;
    }

    while ($expr) {
    // тело конструкции
    }

    do {
    // тело конструкции
    } while ($expr);

    for ($i = 0; $i < 10; $i++) {
    // тело for
    }

    foreach ($iterable as $key => $value) {
    // тело foreach
    }

    try {
        // тело try
    } catch (FirstExceptionType $e) {
        // тело catch
    } catch (OtherExceptionType $e) {
        // тело catch
    }

    $closureWithArgs = function ($arg1, $arg2) {
    // тело
    };

    $closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // тело
    };
 */
