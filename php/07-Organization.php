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
<?php
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
        <select id="OpropType" size="1" name="org[oproptype]">

        </select> <br>
        <input type="submit" value="Создать" name="org[submit]">
    </form>
<?php }
    if(isset($_GET['org'])){
        $name = $_GET['org']['oname'];
        $town = $_GET['org']['otown'];
        $type = $_GET['org']['otype'];
        $stn = connection()->prepare('INSERT INTO obj_object (name, towns_id, type_id) VALUES (:name , :town, :type)');
        $r = $stn->execute([':name' => $name, ':town' => $town, ':type' => $type]);
        if($r){
            echo 'Организация '.$name .' успешно создана';
        }
        else{
            echo 'Произошла ошибка при создании записи';
        }
    }
?>
<script src="../js/jquery/jquery-2.2.3.js"></script>
<script>
    $(function () {
        
        $('#Otown').on('change',function () {
            var id_t = $('select[name="org[otown]"]').val();

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

        $('#Otype').on('change',function () {
            var id_type = $('select[name="org[otype]"]').val();

            $.ajax({
                type: "POST",
                url: "07-Response.php",
                data: { action: 'showPropType', id_type: id_type },
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