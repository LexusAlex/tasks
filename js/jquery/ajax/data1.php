<?php
// принимает данные из js и возвращаем json
// формируем данные

if($_GET['country'] == 'RU') {
    $_GET['country'] = 'Россия';
}
$arr = $_GET;
header('Content-Type: application/json');
echo json_encode($arr);