<?php

require_once 'vendor/autoload.php';

//Twig_Autoloader::register();
// где шаблоны
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader,[
    //'cache' => 'cache',
]);

$template = $twig->loadTemplate('index.twig');

$title = 'Новое значение';
$array = [];
for ($i = 1; $i < 100; $i++) {
    $name = 'employer ' . $i;
    $office = 1;
    $array[] = ['id' => $i, 'name' => $name ,'office' => $office];
}

//var_dump($array);
echo $template->render([
    'title' => $title,
    'arrays' => $array
]);