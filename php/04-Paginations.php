<?php


$connection = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
$stn = $connection->query('SELECT COUNT(*) as c FROM test.employee',PDO::FETCH_ASSOC);
$count = (int)$stn->fetch()['c'];
$countView = 5;

if(isset($_GET['page'])){
    $pageNum = (int)$_GET['page'];
}else{
    $pageNum = 1;
}

$shift = $count * ($pageNum - 1); // смещение лимит

$startIndex = ($pageNum-1)*$countView; // с какой записи начать выборку

$sql = $connection->query("SELECT * FROM test.employee LIMIT $startIndex, $countView",PDO::FETCH_ASSOC);
$result = $sql->fetchAll();
var_dump($result);

$lastPage = ceil($count/$countView);

/* Входные параметры */
$count_pages = $lastPage; // всего станиц
$active = $pageNum; //активная станица
$count_show_pages = 10; // отображаемые страницы
$url = "04-Paginations.php";
$url_page = "04-Paginations.php?page=";

if ($count_pages > 1) {

    $left = $active - 1;
    $right = $count_pages - $active;

    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);

    $end = $start + $count_show_pages - 1;

    if ($end > $count_pages) {
        $start -= ($end - $count_pages);
        $end = $count_pages;
        if ($start < 1) $start = 1;
    }
?>

        <?php if ($active != 1) { ?>
            <a href="<?=$url?>" title="Первая страница">&lt;&lt;&lt;</a>
            <a href="<?php if ($active == 2) { ?><?=$url?><?php } else { ?><?=$url_page.($active - 1)?><?php } ?>" title="Предыдущая страница">&lt;</a>
        <?php } ?>
        <?php for ($i = $start; $i <= $end; $i++) { ?>
            <?php if ($i == $active) { ?><span><?=$i?></span><?php } else { ?><a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>"><?=$i?></a><?php } ?>
        <?php } ?>
        <?php if ($active != $count_pages) { ?>
            <a href="<?=$url_page.($active + 1)?>" title="Следующая страница">&gt;</a>
            <a href="<?=$url_page.$count_pages?>" title="Последняя страница">&gt;&gt;&gt;</a>
        <?php } ?>
<?php } ?>