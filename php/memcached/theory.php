<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Теория кеширования и Memcahed</title>
</head>
<body>
<ul>
    <li>Поместить результат в некое хранилище тем самым сделать запрос к бысрому кешу</li>
    <li>На сайте есть всегда наиболее популярные страницы</li>
    <li>Кеш всегда лучше исходного источника данных</li>
    <li>Но при падении web сервера кеш не сохранятся и не обладает логикой</li>
    <li>Возвращает лишь то что мы ранее в него положили</li>
    <li>Memcached представляет собой огромную хэш-таблицу в оперативной памяти, доступную по сетевому протоколу</li>
    <li>Ключ-значение операии get,set,del инкремент/декремент значения ключа (incr/decr) дописать данные к значению ключа в начало или в конец (append/prepend) атомарная связка получения/установки значения (gets/cas)</li>
    <li>Время выполнеие одной операции не завист от колличества ключей которые хранит memcached</li>
    <li>Основными оптимизированными операциями является выделение/освобождение блоков памяти под хранение ключей</li>
    <li>Можно сказаить что время отклика сервера memcached определяется только сетевыми издержками и практически равно времени передачи пакета от frontend’а до сервера memcached (RTT)</li>
    <li>Возможные потери ключей</li>
    <ul>
        <li>Нехватка памяти для хранения других ключей и ключ был удален, то есть ключ редко использовался</li>
        <li>Ключ был удален, так как истекло его время жизни.</li>
        <li>Крах процесса memcached или сервера</li>
    </ul>
    <li>Что можно потерять : выборки из бд</li>
    <li>Не хотелось терять : счетчики посеилей сайта, сессии пользователей </li>
    <li>Выбор ключа для каждого кэша. Ключ строка ограниченной длины.Для одного набора данных должен быть уникальный ключ.Например задать ключ можно так $key = md5(serialize($options))</li>
    <li>Кластеризация, использование нескольких серверов memcached, ключи распределяются по ним</li>
    <li>Процесс кеширования $x = get x - получить значение ключа, $x = $x + 1 - изменить значение ключа, set x = $x - запись нового значения под этим же имененем</li>
    <li>Но что делать если несколько запосов будут сделаны одновременно то есть неатомарно, для этого есть incr/decr (инкремент и декремент). Они обеспечивают атомарное увеличение (или, соответственно, уменьшение) целочисленного значения существующего в memcached ключа.</li>
    <li>append/prepend - добавить данные в кеш, в начало/конец</li>
    <li>add - задать значение ключа только если он ранее не существовал</li>
    <li>replace - заменить значение уже существующего ключа</li>
    <li>Счетчики в memcahed.Счетчик просмотров чего либо</li>
    <ul>
        <li>Клиент во время просмотра делает имя ключа count потом делает incr,если успешно в кеше есть то зеапишем count = 1 и покажем пользователю</li>
        <li>Иначе если этого ключа нет, то выбираем число просмотров из бд увеличить на 1 и записать в кеш</li>
        <li>При последующих просмотрах ключ уже будет в кеш и мы будем просто увеличить на 1</li>
    </ul>
    <li>Перестроение кешей / Проблема  много обращений к кэшу в единицу времени и сложный запрос.</li>
    <li>Блокировка кешей. Пытаемся получить значение ключа get, если нет то устанавливаем set в 1 то есть блокировка , снимаем удаляя ключ командом del</li>
    <li>Но первый вариант неоптимален.Гораздо проще второй вариант Для захвата блокировки достаточно выполнитькоманду add Команда add будет успешной только в том случае, если ключа в memcached еще нет Если add вернет ошибку «такой ключ уже существует», значит, блокировка была захвачена раньше каким-то другим процессом.</li>
    <li>Сброс грппы кешей.Очень желательно чтобы при сбросе старого кеша,данные сразу же заменялись новыми</li>
    <li>Тег кеша - Тег это имя и связанная с ним версия.Версии тега только увеличиваются</li>
    <li>tag1 и tag2 версии тегов</li>
    <li>Статистика работы memcached</li>
</ul>
</body>
</html>