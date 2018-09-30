<?php

if (isset($_GET['s'])) {
    $dep = ((int)$_GET['d']) - 1;
    $subdep = ((int)$_GET['s']) - 1;

    $contents = file_get_contents("datos.json");
    $data = json_decode($contents);
    $data->dependencias[$dep]->subdependencias[$subdep]->consecutivo += 1;

    $res = array(
        "FIET" => 8,
        "dependencia" => $data->dependencias[$dep]->numero,
        "subdependencia" => $data->dependencias[$dep]->subdependencias[$subdep]->numero,
        "consecutivo" => $data->dependencias[$dep]->subdependencias[$subdep]->consecutivo
    );

    echo json_encode($res);
}