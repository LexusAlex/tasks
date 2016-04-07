<?php

$connection = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

switch ($_POST['action']){

    case "showRegionForInsert":
        echo '<select size="1" name="region" onchange="javascript:selectCity();">';
        $stn = $connection->prepare('SELECT * FROM tbl_region WHERE id_country=:country ORDER BY region ASC');
        $stn->execute([':country'=>$_POST['id_country']]);
        $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows) === 0){echo '<option value="">Регионов нет</option>';die();}
        echo '<option value="">Выбрать регион</option>';
        foreach ($rows as $numRow => $row) {
            echo '<option value="'.$row['id_region'].'">'.$row['region'].'</option>';
        }
        echo '</select>';
        break;

    case "showCityForInsert":
        echo '<select size="1" name="city">';

        $stn = $connection->prepare('SELECT * FROM test.tbl_city WHERE id_region=:region ORDER BY city ASC');
        $stn->execute([':region'=>$_POST['id_region']]);
        $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows) === 0){echo '<option value="">Городов нет</option>';die();}
        echo '<option value="">Выбрать город</option>';
        foreach ($rows as $numRow => $row) {
            echo '<option value="'.$row['id_city'].'">'.$row['city'].'</option>';
        }
        echo '</select>';
        break;

};

/*$stn = $connection->prepare('SELECT * FROM tbl_region WHERE id_country=:country ORDER BY region ASC');
$stn->execute([':country'=>2]);
var_dump($stn->fetchAll(PDO::FETCH_ASSOC));*/


?>
