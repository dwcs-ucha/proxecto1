<!DOCTYPE html>
<html>
    <head>
        <?php
        /**
         * @Autor: Santiago Calvo Pi�eiro
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
        $dificultade = $_POST["dificultade"];
        $numCategoriasSeleccionar = getNumCategoriasSeleccionar($dificultade);
        $mensaxeErro = "";
        if (isset($_POST["enviarCategorias"])) {
            eventoBotonSeleccionarCategorias($numCategoriasSeleccionar, $dificultade);
        }
        include '../../layout/cabeceira.php';
        $rutaImaxes = "Imagenes/";
        $categorias = getCategorias();
        $columnas = 4;
        $filas = intdiv(count($categorias), $columnas);
        $filas += (count($categorias) % $columnas) == 0 ? 0 : 1;
        ?>

        <form action="categorias.php" method="post">
            <?php
            for ($indexFila = 0; $indexFila < $filas; $indexFila++) {
                ?>
                <div class="d-flex justify-content-center">
                    <?php
                    for ($indexColumna = 0; ($indexColumna < $columnas) && (($indexFila * $columnas) + $indexColumna < count($categorias)); $indexColumna++) {
                        $posicionArray = ($indexFila * $columnas) + $indexColumna;
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
                <button class="btn btn-lg btn-success" type="submit" name="enviarCategorias" value="enviado">Seleccionar categorías</button>
            </div>
            <div class="d-flex justify-content-center">
                <?= $mensaxeErro ?>
            </div>
            <input type="hidden" name="dificultade" value="<?= $dificultade ?>"/>
        </form>
        <?php
        include '../../layout/pe.php';
        ?>
        
        
        <?php

        function eventoBotonSeleccionarCategorias($numCategoriasSeleccionar, $dificultade) {
            global $mensaxeErro;
            $categoriasSeleccionadas = getCategoriasSeleccionadas();
            if (count($categoriasSeleccionadas) != $numCategoriasSeleccionar) {
                $mensaxeErro = "Debes seleccionar $numCategoriasSeleccionar categorías";
            } else {
                redirixirPaxinaInicio($categoriasSeleccionadas, $dificultade);
            }
        }

        function getCategorias() {
            $ficheiro = fopen("categorias.csv", "r");
            while (($datos = fgetcsv($ficheiro, 0, ";")) != false) {
                $categorias[] = array($datos[0], $datos[1]);
            }
            fclose($ficheiro);
            return $categorias;
        }

        function getNumCategoriasSeleccionar($dificultade) {
            switch ($dificultade) {
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
            return $numCategoriasSeleccionar;
        }

        function getCategoriasSeleccionadas() {
            for ($i = 0; isset($_POST["seleccionada$i"]); $i++) {
                if (!empty($_POST["seleccionada$i"])) {
                    $categoriasSeleccionadas[] = $_POST["seleccionada$i"];
                }
            }
            return $categoriasSeleccionadas;
        }

        function redirixirPaxinaInicio($categoriasSeleccionadas, $dificultade) {
            $categoriasString = implode(",", $categoriasSeleccionadas);
            header("Location:" . urldecode("index.php?categorias=" . $categoriasString . "&dificultade=" . $dificultade));
            exit();
        }
        ?>
    </body>
</html>