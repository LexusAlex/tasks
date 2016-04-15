<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organization</title>
</head>
<body>
<?php
function connection(){
    return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
}


/*$stn = $connection->query('SELECT obj_object.name AS objectname, obj_towns.name AS townname, obj_type.name AS typename, obj_type_prorerty.name AS typepropname  FROM obj_object
  INNER JOIN obj_towns ON obj_object.towns_id = obj_towns.id
  INNER JOIN obj_type ON obj_object.type_id = obj_type.id
  INNER JOIN obj_type_prorerty ON obj_type.id = obj_type_prorerty.type_id',PDO::FETCH_ASSOC);
var_dump($stn->fetchAll());*/
?>
<a href="07-Organization.php?createOrg">Создать организацию</a>
<a href='07-Organization.php?changeOrg'>Редактировать огранизации</a>
<?php
include '08-VarDump.php';
/*--------------------------------------------------------------*/
if(isset($_GET['createOrg'])){
    function towns(){
        return connection()->query('SELECT * FROM obj_towns',PDO::FETCH_ASSOC)->fetchAll();
    }
    function viewTowns(){
        foreach (towns() as $v){
            echo "<option value='$v[id]'>";
            echo $v['name'];
            echo "</option>";
        }
    }
    ?>

    <form name="org[]" action="07-Organization.php">
        <label for="On">Название организации</label>
        <input id="On" type="text" name="org[oname]"> <br>
        <label for="Otown">Город в которой находиться организации</label>
        <select id="Otown" size="1" name="org[otown]">
            <option value="0">Все доступные города</option>
            <?php viewTowns();?>
        </select> <br/>
        <label for="Otype">Тип вашей организации</label>
        <select id="Otype" size="1" name="org[otype]">

        </select> <br>
        <label for="OpropType">Специфика организации</label>
        <select id="OpropType" multiple name="org[oproptype][]">

        </select> <br>
        <input type="submit" value="Создать" name="org[submit]">
        <input type="reset" value="Сбросить" name="org[reset]">
    </form>
<?php }
    if(isset($_GET['org'])){
        $name = $_GET['org']['oname'];
        $town = $_GET['org']['otown'];
        $type = $_GET['org']['otype'];
        //$typeprop = $_GET['org']['oproptype'];//arr
        $check = connection()->prepare('SELECT name,towns_id FROM obj_object WHERE name = :checkname AND towns_id = :checktown');
        $check->execute([':checkname' => $name,':checktown' => $town]);
        $row = $check->fetch();
        if($row !== false){
            echo "Организация $name уже существует";
            die();
        }
        $stn = connection()->prepare('INSERT INTO obj_object (name, towns_id, type_id) VALUES (:name , :town, :type)');
        $r = $stn->execute([':name' => $name, ':town' => $town, ':type' => $type]);
        
        
        if($r){
            echo 'Организация '.$name .' успешно создана';
        }
        else{
            echo 'Произошла ошибка при создании записи';
        }
    }

/*---------------------------------------------------------------*/
if(isset($_GET['changeOrg'])){
    function org(){
        return connection()->query('SELECT * FROM obj_object',PDO::FETCH_ASSOC)->fetchAll();
    }
    function viewOrg(){
        echo '<table border="1">';
        echo '<caption>Все организации</caption>';
        echo '<tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
              </tr>';
        foreach (org() as $v){
            echo '<tr>';
            echo "<td>$v[id]</td>";
            echo "<td>$v[name]</td>";
            echo "<td>
                    <a href='07-Organization.php?updateOrg=$v[id]'>обновить</a>
                    <a href='07-Organization.php?deleteOrg=$v[id]'>удалить</a>
                 </td>";
            echo '</tr>';
        }
        echo '<table>';
    }
    viewOrg();
}
/*-------------------------------------------------------------------*/
if(isset($_GET['updateOrg'])){

    function record(){
        $s = connection()->prepare('SELECT obj_object.id AS idobj,obj_object.towns_id AS townid,obj_object.type_id AS typeid,obj_object.name AS objectname, obj_towns.name AS townname, obj_type.name AS typename FROM obj_object
          INNER JOIN obj_towns ON obj_object.towns_id = obj_towns.id
          INNER JOIN obj_type ON obj_object.type_id = obj_type.id
          WHERE obj_object.id = :id');
        $s->execute([':id'=>(int)$_GET['updateOrg']]);
        return $s->fetch(PDO::FETCH_ASSOC);
    }
    //$id = (int)$_GET['updateOrg'];
    function townsNotRecord(){
        $s =  connection()->prepare('SELECT * FROM obj_towns WHERE id != :notid');
        $s->execute([':notid'=>record()['townid']]);
        return $s->fetchAll(PDO::FETCH_ASSOC);

    }
    function viewTowns(){
        foreach (townsNotRecord() as $v){
            echo "<option value='$v[id]'>";
            echo $v['name'];
            echo "</option>";
        }
    }
    function typeNotRecord(){
        $s =  connection()->prepare('SELECT * FROM obj_type WHERE id != :notid');
        $s->execute([':notid'=>record()['typeid']]);
        return $s->fetchAll(PDO::FETCH_ASSOC);

    }
    function viewTypes(){
        foreach (typeNotRecord() as $v){
            echo "<option value='$v[id]'>";
            echo $v['name'];
            echo "</option>";
        }
    }
    
?>
    <form name="orgup[]" action="07-Organization.php">
        <label for="On">Название организации</label>
        <input id="On" type="text" name="orgup[oname]" value="<?php echo record()['objectname']?>"> <br>
        <label for="Otown">Город в которой находиться организации</label>
        <select id="Otown" size="1" name="orgup[otown]">
            <option value="0">Все доступные города</option>
            <option selected value="<?php echo record()['townid'];?>"><?php echo record()['townname']?></option>
            <?php viewTowns();?>
        </select> <br/>
        <label for="Otype">Тип вашей организации</label>
        <select id="" size="1" name="orgup[otype]">
            <option selected value="<?php echo record()['typeid'];?>"><?php echo record()['typename']?></option>
            <?php viewTypes();?>
        </select> <br>
        <label for="OpropType">Специфика организации</label>
        <select id="OpropType" multiple name="orgup[oproptype][]">

        </select> <br>
        <input type="submit" value="Обновить" name="orgup[submit]">
        <input type="reset" value="Сбросить" name="orgup[reset]">
    </form>
<?php
}
if(isset($_GET['orgup'])){
    $name = $_GET['orgup']['oname'];
    $town = $_GET['orgup']['otown'];
    $type = $_GET['orgup']['otype'];
    //$typeprop = $_GET['org']['oproptype'];//arr
    /*$check = connection()->prepare('SELECT name,towns_id FROM obj_object WHERE name = :checkname AND towns_id = :checktown');
    $check->execute([':checkname' => $name,':checktown' => $town]);
    $row = $check->fetch();
    if($row !== false){
        echo "Организация $name уже существует";
        die();
    }*/

    $stn = connection()->prepare('UPDATE obj_object SET name = :name,towns_id = :townid,type_id = :typeid WHERE id = :id');

   $r = $stn->execute([':name' => $name, ':townid' => $town, ':typeid' => $type, ':id' =>1]);


    if($r){
        echo 'Организация '.$name .' успешно обновлена';
    }
    else{
        echo 'Произошла ошибка при обновлении записи';
    }
    VarDumper::dump($_GET,10,true);
}

/*-------------------------------------------------------------------*/
if(isset($_GET['deleteOrg'])){
    function delOrg(){
        $i = (int)$_GET['deleteOrg'];
        return connection()->exec("DELETE FROM obj_object WHERE id = $i");
    }
    
    if(delOrg()){
        echo 'Запись удалена';
    }else{
        echo 'Ошибка при удалении записи';
    }

}
/*-------------------------------------------------------------------*/
?>
<script src="../js/jquery/jquery-2.2.3.js"></script>
<script>
    $(function () {

        let type = $('#Otype');
        let labeltype = type.prev();

        type.hide();
        labeltype.hide();

        $('#Otown').on('change',function () {
            var id_t = $('select[name="org[otown]"]').val();
            type.show();
            labeltype.show();
            $.ajax({
                type: "POST",
                url: "07-Response.php",
                data: { action: 'showType', id_town: id_t },
                cache: false,
                success: function(responce){
                    $('#Otype').html(responce);
                }
            });
        });

        type.on('change',function () {
            var id_type = $('select[name="org[otype]"]').val();
            
            var id_town = $('select[name="org[otown]"]').val();

            $.ajax({
                type: "POST",
                url: "07-Response.php",
                data: { action: 'showPropType', id_type: id_type , id_town:id_town },
                cache: false,
                success: function(responce){
                    $('#OpropType').html(responce);
                }
            });
        });
    });
</script>
</body>
</html>