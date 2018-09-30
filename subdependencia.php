<?php

if(isset($_GET['i'])) {
    $contents = file_get_contents("datos.json");
    $data = json_decode($contents);
    $index = ((int)$_GET['i']) - 1;

    echo json_encode($data->dependencias[$index]->subdependencias);
}