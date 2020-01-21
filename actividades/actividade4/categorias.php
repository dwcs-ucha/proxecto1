<!DOCTYPE html>
<html>
    <head>
        <?php
        /**
         * @Autor: Santiago Calvo Piñeiro
         * */
        $directorioRaiz = "../..";
        include '../../layout/head.php';
        ?>
        <meta charset="utf-8">
        <title>Categorias</title>
        <style>
            .ficha {
                border-style: solid;
                border-width: 500;
                margin: 20px;
                text-align: center;
                padding: 10px;
            }
            .ficha img {
                width : 270px;
                height : 200px;
            }
        </style>
        <script src="seleccionar.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include '../../layout/cabeceira.php';
        switch ($_POST["dificultade"]) {
            case "facil":
                $numCategoriasSeleccionar = 2;
                break;
            case "normal":
                $numCategoriasSeleccionar = 3;
                break;
            case "dificil":
                $numCategoriasSeleccionar = 4;
                break;
        }
        $mensaxeErro = "";
        if (isset($_POST["enviarCategorias"])) {
            if (!isset($_POST["seleccionada$numCategoriasSeleccionar-1"])) {
                $mensaxeErro = "Debes seleccionar $numCategoriasSeleccionar categorias";
            } else {
                for ($i = 0; $i < $numCategoriasSeleccionar; $i++) {
                    $categoriasSeleccionadas[] = array($_POST["seleccionada$i"], $_POST["seleccionadaImaxe$i"]);
                }
                implode(",", $categoriasSeleccionadas);
            }
        }
        $rutaImaxes = "Imagenes/";
        $categorias = getCategorias();
        $columnas = 4;
        $filas = intdiv(count($categorias), $columnas);
        $filas += (count($categorias) % $columnas) == 0 ? 0 : 1;
        ?>

        <form action="categorias.php" method="post">
            <?php
            for ($i = 0; $i < $filas; $i++) {
                ?>
                <div class="d-flex">
                    <?php
                    for ($j = 0; ($j < $columnas) && (($i * $columnas) + $j < count($categorias)); $j++) {
                        $posicionArray = ($i * $columnas) + $j;
                        ?>
                        <div class="flex ficha" onclick="seleccionarCategoria(this, '<?= $categorias[$posicionArray][0] ?>', '<?= $categorias[$posicionArray][1] ?>')">
                            <input type="hidden" name="seleccionada<?= $posicionArray ?>" value=""/>
                            <input type="hidden" name="seleccionadaImaxe<?= $posicionArray ?>" value=""/>
                            <img src="<?= $rutaImaxes . $categorias[$posicionArray][0] . "/" . $categorias[$posicionArray][1] ?>" />
                            <h2><?= $categorias[$posicionArray][0] ?></h2>
                        </div>
                    <?php }
                    ?>
                </div>

            <?php }
            ?>
            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-success" type="submit" name="enviarCategorias" value="enviado">Seleccionar categorias</button>
            </div>
            <div class="d-flex justify-content-center">
                <?= $mensaxeErro ?>
            </div>
        </form>
        <?php
        include '../../layout/pe.php';
        ?>
        <?php

        function getCategorias() {
            $ficheiro = fopen("categorias.csv", "r");
            while (($datos = fgetcsv($ficheiro, 0, ";")) != false) {
                $categorias[] = array($datos[0], $datos[1]);
            }
            fclose($ficheiro);
            return $categorias;
        }
        ?>
    </body>
</html>