<?php

function connection(){
    return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
}

if(isset($_POST['action'])){

    if ($_POST['action'] === 'showType') {

        function viewType()
        {
            $stn = connection()->prepare('SELECT obj_type.id,obj_type.name FROM obj_type_town INNER JOIN obj_type ON obj_type_town.id_type = obj_type.id WHERE id_town=:id');
            $stn->execute([':id' => $_POST['id_town']]);
            $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows) === 0){echo '<option value="">У данной организации нет типов</option>';die();}
            echo '<option>Все доступные типы организации</option>';
            foreach ($rows as $numRow => $row) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
        viewType();
    }

    if ($_POST['action'] === 'showPropType') {

        function viewType()
        {
            $stn = connection()->prepare('SELECT * FROM obj_type_prorerty WHERE type_id = :type_id AND towns_id = :town_id');
            $stn->execute([':type_id' => $_POST['id_type'],':town_id' => $_POST['id_town']]);
            $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
            echo '<option disabled>Все доступные описания организации</option>';
            foreach ($rows as $numRow => $row) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
        viewType();
    }


    

}

