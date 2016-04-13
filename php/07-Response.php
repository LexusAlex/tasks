<?php

function connection(){
    return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
}

if(isset($_POST['action'])){

    if ($_POST['action'] === 'showType') {

        function viewType()
        {
            $stn = connection()->prepare('SELECT * FROM obj_type WHERE id=:id');
            $stn->execute([':id' => $_POST['id_town']]);
            $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
            echo '<option value="0">Все доступные типы организации</option>';
            foreach ($rows as $numRow => $row) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
        viewType();
    }

    if ($_POST['action'] === 'showPropType') {

        function viewType()
        {
            $stn = connection()->prepare('SELECT * FROM obj_type_prorerty WHERE type_id=:type_id');
            $stn->execute([':type_id' => $_POST['id_type']]);
            $rows = $stn->fetchAll(PDO::FETCH_ASSOC);
            echo '<option value="0">Все доступные описания организации</option>';
            foreach ($rows as $numRow => $row) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
        viewType();
    }


    

}

