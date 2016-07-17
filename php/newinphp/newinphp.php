<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>new in php version</title>
</head>
<body>
    <h1>php 5.0</h1>
    <p>
        <ul>
            <li>Переписана работа с обьектами</li>
            <li>Новый уровень ошибок E_STRICT</li>
            <li>Изменение конфигурационных файлов с php4xxx на php5xxx</li>
            <li> is_a() заменен на  instanceof</li>
        </ul>
    </p>
    <h1>php 5.1</h1>
    <p>
    <ul>
        <li>Полностью переписан код по работе с датами с расширенной поддержкой временных зон.</li>
        <li>Расширение PDO сейчас включено по умолчанию.</li>
        <li><pre>
                Теперь такой код вызовет fatal_error
                class test {
                    const foobar = 'foo';
                    const foobar = 'bar';
                }
            </pre>
        </li>
    </ul>
    </p>
    <h1>php 5.2</h1>
    <p>
    <ul>
        <li>Добавлены DateTime и DateTimeZone RegexIterator</li>
        <li>Новые расширения JSON Filter Zip </li>
        <li>Добавлена поддержка конструкторов в интерфейсах</li>
    </ul>
    </p>
    <h1>php 5.3</h1>
    <p>
    <ul>
        <li>Функция realpath() стала полностью независима от платформы</li>
        <li>Магический метод __toString() не принимает более аргументы.</li>
        <li>Магические методы __get(), __set(), __isset(), __unset(), и __call() должны всегда быть публичными</li>
        <li>Новые зарезервированные слова goto namespace</li>
        <li>Пространство имен</li>
        <li>Позднее статическое связывание</li>
        <li>Замыкания Lambda/Anonymous функции</li>
        <li>Goto переход</li>
        <li>Появились два магических метода: __callStatic() и __invoke(). </li>
        <li>Появилась поддержка синтаксиса Nowdoc, подобный Heredoc, но с одинарными кавычками. </li>
        <li>Константы теперь могут быть объявлены вне класса, используя ключевое слово const. </li>
        <li>Тернарный оператор ?:.</li>
        <li>Стал возможен динамический доступ к статическим методам</li>
        <li> is_a() возвращена</li>
        <li>Новые расширения SQLite3 Fileinfo INTL Phar</li>
        <li>Новые классы в пакетах Date/Time Phar SPL</li>
    </ul>
    </p>
    <h1>php 5.4</h1>
    <p>
    <ul>
        <li>Директивы php.ini register_globals и register_long_arrays были удалены.</li>
        <li>"Волшебные" кавычки теперь не работают</li>
        <li>Операторы break и continue теперь не принимают аргументов в виде переменной</li>
        <li>Преобразование массива в строку теперь приводит к предупреждению E_NOTICE</li>
        <li>Новые зарезервиронные слова trait callable insteadof </li>
        <li>Добавлена поддержка трейтов.</li>
        <li>Массив можно обьявить как []</li>
        <li>Классы для создания анонимных функций (Closures) теперь поддерживают $this.</li>
        <li>Добавлена возможность получения доступа к члену класса при создании экземпляра. Например: (new Foo)->bar().</li>
        <li>Встроенный веб-сервер в режиме командной строки для разработчиков</li>
        <li>Доступен новый модуль SAPI, называемый cli-server. </li>
        <li>Удалено расширение sqlite</li>
        <li>Стало актуальным требование присутствия аргументов абстрактного конструктора класса __construct в базовом классе при наследовании. </li>
    </ul>
    </p>
    <h1>php 5.5</h1>
    <p>
    <ul>
        <li>Поддержка windows xp и 2003 была удалена</li>
        <li>Добавлены генераторы</li>
        <li>finally в ислючения</li>
        <li>foreach теперь поддеживает list</li>
        <li>empty() пооддерживает произвольные выражения</li>
        <li>Обратится к классу можно так ClassName::class</li>
        <li>Добавлено расширение OPcache</li>
        <li>foreach поддерживает нескалярные ключи</li>
        <li>ext/mysql deprecated</li>
    </ul>
    </p>
    <h1>php 5.6</h1>
    <p>
    <ul>
        <li>Массивы как свойства класса</li>
        <li>В константы можно включать скалярные выражения</li>
        <li>Оператор **</li>
        <li>
            <pre>
                Стало возможным присоединять
                use const Name\Space\FOO;
                use function Name\Space\f;
            </pre>
        </li>
        <li>Новый отладчик phpdbg</li>
        <li>Функции с переменным числом аргументов</li>
        <li>Поддержка загрузки файлов больше 2 Гб.</li>
    </ul>
    </p>
</body>
</html>