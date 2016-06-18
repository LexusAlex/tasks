<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Memcached</title>
</head>
<body>
<h1>Memcahed</h1>

<pre>
    Кеширующий сервер Memcached
    Расширение Memcache  2013-04-07 3.0.8 linux win <a href="https://pecl.php.net/package/memcache">Версии</a>
    Расширение Memcached 2014-04-01 2.2.0 linux <a href="https://pecl.php.net/package/memcached">Версии</a>

    Проверяем
    netstat -tap | grep memcached
    tcp 0 0 localhost:11211 *:* LISTEN 1226/memcached

    Установка расщирения для php
    apt-get install php5-dev libmemcache-dev
    pecl download memcache
    tar xzvf memcache-2.2.6.tgz
    cd memcache-2.2.6/
    phpize && ./configure --enable-memcache && make
    cp modules/memcache.so /usr/lib/php5/20060613/

echo 'extension=memcache.so' >> /etc/php5/apache2/php.ini
</pre>

<?php
if (!class_exists("Memcache"))  exit("Memcache не установлен");
if (!class_exists("Memcached"))  exit("Memcached не установлен");
$mc = new Memcache();
$mcd = new Memcached();

//Memcache
$mc->connect('127.0.0.1', 11211) or die('Could not connect');

$test = $mc->get('test');
echo 'Незакешированные данные '. date('H:i:s',time()).'<br>';
if(!empty($test))
{
    echo 'Закешированные данные '.$test .'<br>';
}else{
    $time = date('H:i:s',time());
    $mc->set('test',$time,false,20);
    echo 'Данные закешировали '.$mc->get('test') . '<br>';
}
var_dump($mc->getVersion());
$mc->close();

//Memcached
$mcd->addServer('127.0.0.1',11211);
$testM = $mcd->get('new');
echo 'Незакешированные данные '. date('H:i:s',time()).'<br>';

if(!empty($testM))
{
    echo 'Закешированные данные '.$testM;
}else{
    $timeM = date('H:i:s',time());
    $mcd->set('new',$timeM,30);
    echo 'Данные закешировали '.$mcd->get('new');
}

?>
</body>
</html>