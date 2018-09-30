<?php
    $contents = file_get_contents("datos.json");
    $data = json_decode($contents);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script src="js/ria.js"></script>
</head>

<body>
    <div class="contenido">
        <h1 id="titulo">Códigos documentos</h1>
        <form method="post" action="generador.php" id="frm" name="frm">
            <label for="dependencia">Dependencia</label>
            <select id="dependencia" name="dependencia">
                <option value="0">-- Selecionar dependencia --</option>
                <?php for($i = 0; $i < count($data->dependencias); $i++) { ?>
                    <option value="<?= ($i+1) ?>"><?= $data->dependencias[$i]->nombre ?></option>
                <?php } ?>
            </select>

            <label for="subdependencia">Subdependencia</label>
            <select name="subdependencia" id="subdependencia">
                <option value="0">-- Selecionar subdependencia -- </option>
            </select>

            <input type="button" id="submit" value="Generar código" />
            <input type="button" id="codigo" value="Dar código" />
        </form>

        <div id="codigo">
            <h3>Código generado</h3>
            <span id="generado">Generado</span>
        </div>
    </div>
</body>

</html>