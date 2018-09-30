<?php

if (isset($_POST['dependencia'])) {
    $dep = ((int)$_POST['dependencia']) - 1;
    $subdep = ((int)$_POST['subdependencia']) - 1;

    $contents = file_get_contents("datos.json");
    $data = json_decode($contents);
    $data->dependencias[$dep]->subdependencias[$subdep]->consecutivo += 1;

    file_put_contents("datos.json", json_encode($data, JSON_UNESCAPED_UNICODE));

    $res = array(
        "FIET" => 8,
        "dependencia" => $data->dependencias[$dep]->numero,
        "subdependencia" => $data->dependencias[$dep]->subdependencias[$subdep]->numero,
        "consecutivo" => $data->dependencias[$dep]->subdependencias[$subdep]->consecutivo
    );

    echo json_encode($res);
}