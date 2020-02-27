<!DOCTYPE html>
<html>
    <head>
        <?php
        /**
         * @author Santiago Calvo Piñeiro
         */
        $directorioRaiz = "../..";
        include '../../Vista/layout/head.php';
        ?>
        <meta charset="utf-8">
        <title>Categorias</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            function seleccionarCategoria(elemento, categoria) {
                if (elemento.style.backgroundColor != "green") {
                    elemento.children[0].value = categoria;
                    elemento.style.backgroundColor = "green";
                } else {
                    elemento.children[0].value = "";
                    elemento.style.backgroundColor = "";
                }
            }
        </script>
    </head>
    <body>
        <?php
        include 'funcionsActividade.php';
        $dificultade = $_POST["dificultade"];
        $numCategoriasSeleccionar = getNumCategoriasSeleccionar($dificultade);
        $mensaxeErro = "";
        if (isset($_POST["enviarCategorias"])) {
            eventoBotonSeleccionarCategorias($numCategoriasSeleccionar, $dificultade, $mensaxeErro);
        }
        $rutaImaxes = "Imagenes/";
        $categorias = getNomesImaxesCategoriasFicheiro();
        
        //Número de imaxes a mostrar en cada liña da páxina
        $columnas = 4;

        //Número de filas completas
        $filas = intdiv(count($categorias), $columnas);

        //Engade 1 fila nova aínda que o número de imaxes non ocupe todo o espazo reservado á fila.
        $filas += (count($categorias) % $columnas) == 0 ? 0 : 1;
        ?>
        <div class="container">
            <?php
            include '../../Vista/layout/cabeceira.php';
            ?>

            <form action="categorias.php" method="post">
                <?php
                $indexCategoriaActual = 0;
                for ($indexFila = 0; $indexFila < $filas; $indexFila++) {
                    ?>
                    <div class="d-flex justify-content-center">
                        <?php
                        $indexColumna = 0;
                        while (($indexColumna < $columnas) && ($indexCategoriaActual < count($categorias))) {
                            $categoriaActual = $categorias[$indexCategoriaActual];
                            $nomeCategoriaActual = $categoriaActual[INDEX_CATEGORIA_NOME];
                            $imaxeCategoriaActual = $categoriaActual[INDEX_CATEGORIA_IMAXE_PRINCIPAL];
                            $rutaImaxeCategoriaActual = $rutaImaxes . $nomeCategoriaActual . "/" . $imaxeCategoriaActual;
                            ?>
                            <div class="flex ficha" onclick="seleccionarCategoria(this, '<?= $nomeCategoriaActual ?>')">
                                <input type="hidden" name="nomeCategoriaSeleccionada<?= $indexCategoriaActual ?>" value=""/>
                                <img src="<?= $rutaImaxeCategoriaActual ?>" />
                                <h2><?= $nomeCategoriaActual ?></h2>
                            </div>
                            <?php
                            $indexCategoriaActual++;
                            $indexColumna++;
                        }
                        ?>
                    </div>

                <?php }
                ?>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-lg btn-success" type="submit" name="enviarCategorias" value="enviado">Seleccionar categorías</button>
                </div>
                <div class="d-flex justify-content-center erro">
                    <?= $mensaxeErro ?>
                </div>
                <input type="hidden" name="dificultade" value="<?= $dificultade ?>"/>
            </form>
            <?php
            include '../../Vista/layout/pe.php';
            ?>
        </div>

        <?php
        ?>
    </body>
</html>