<?php

if(isset($_POST) && !empty($_POST['data'])) {
    var_dump(json_decode($_POST['data']));

    die();
}