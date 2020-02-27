<html>
    <head>
        <?php
        /**
         * @author Santiago Calvo Piñeiro
         */
        $directorioRaiz = "../..";
        include '../../Vista/layout/head.php';
        ?>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function temporizador() {
                var t = 60;
                setInterval(function () {
                    document.getElementById("segundosRestantes").innerHTML = "Tes " + t-- + " segundos";
                    if (t == 0) {
                        document.formulario.submit();
                    }
                }, 1000, "JavaScript");
            }
            window.onload = temporizador();
        </script>
        <style>
            .fila {
                align-items: center;
                margin: 5px 0px;
            }
            .ficha {
                border-style: solid;
                border-width: 2;
                border-collapse: collapse;
                background-color: blue;
                width : 103;
                height : 103;
            }
            .btn-lg {
                padding: 10 70;
            }
            .ficha img {
                width : 100px;
                height : 100px;
            }
            .categoria {
                border-style: solid;
                margin: 0 20;
            }
            .categoria img {
                width : 110px;
                height : 110px;
            }
            h4 {
                text-align: center;
            }
            .cabeceira {
                position: relative;

            }
        </style>
    </head>
    <body>
        <?php
        include '../../Vista/layout/cabeceira.php';
        ?>

        <?php
        include "funcionsActividade.php";


        $rutaImaxes = "Imagenes/";

        $numeroImaxesCategoria = $_GET["numImaxes"];
        $nomesCategoriasSeleccionadas = getNomesCategorias();
        $numCategorias = count($nomesCategoriasSeleccionadas);

        for ($indexCategoria = 0; $indexCategoria < $numCategorias; $indexCategoria++) {
            $categorias[$indexCategoria] = getCategoriaPartida($nomesCategoriasSeleccionadas[$indexCategoria], $numeroImaxesCategoria);
        }
        ?>
        <h1>Memoriza os elementos de cada categoria</h1>
        <h2 id="segundosRestantes"></h2>
        <form action="actividade.php" method="post" name="formulario">
            <input type="hidden" name="inicioXogo" value="si"/>
<?php
$contadorImaxes = 0;
for ($indexCategoria = 0; $indexCategoria < $numCategorias; $indexCategoria++) {
    ?>
                <input type = "hidden" name = "categoria<?= $indexCategoria ?>" value = "<?= implode(",", array_slice($categorias[$indexCategoria], 0, 2)) ?>"/>
                <div class="d-flex justify-content-center fila">
    <?php
    $numeroElementosCategoria = count($categorias[$indexCategoria]);
    for ($indexImaxeCategoria = INDEX_CATEGORIA_INICIO_IMAXES_XOGO; $indexImaxeCategoria < $numeroElementosCategoria; $indexImaxeCategoria++) {
        ?>
                        <div class="flex ficha">
                        <?php $imaxeActual = $rutaImaxes . $categorias[$indexCategoria][INDEX_CATEGORIA_NOME] . "/" . $categorias[$indexCategoria][$indexImaxeCategoria] ?>
                            <input type="hidden" name="<?= "imaxe$contadorImaxes" ?>" value="<?= $imaxeActual ?>"/>
                            <img src="<?= $imaxeActual ?>" />
                        </div>
        <?php
        $contadorImaxes++;
    }
    ?>
                    <div class="categoria">
                        <img src="<?= $categorias[$indexCategoria][INDEX_CATEGORIA_IMAXE_PRINCIPAL] ?>" />
                        <h4 class="align-middle"><?= $categorias[$indexCategoria][INDEX_CATEGORIA_NOME] ?></h4>
                    </div>
                </div>

<?php }
?>
            <div class="d-flex justify-content-center fila">
                <button class="btn btn-lg btn-success" type="submit" name="xogar">Xogar xa</button>
            </div>
        </form>
<?php
require_once '../../Vista/layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
?>
    </body>
</html>
