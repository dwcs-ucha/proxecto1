<html>
    <head>
        <?php
        $directorioRaiz = "../..";
        include '../../layout/head.php';
        ?>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function temporizador() {
                var t = 5;
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
        include '../../layout/cabeceira.php';
        ?>

        <?php

        function getCategoria($nomeCategoria, $numImaxes) {
            $ficheiro = fopen("categorias.csv", "r");
            $atopado = false;
            while (($linea = fgetcsv($ficheiro, 0, ";")) != false && $atopado == false) {
                if ($linea[0] == $nomeCategoria) {
                    $atopado = true;
                    $imaxePrincipalCategoria = "Imagenes/". $linea[0] . "/" . $linea[1];
                    $imaxesCategoria = array_slice($linea, 2);
                    shuffle($imaxesCategoria);
                    $imaxesCategoria = array_slice($imaxesCategoria, 0, $numImaxes);
                }
            }
            array_unshift($imaxesCategoria, $nomeCategoria, $imaxePrincipalCategoria);
            return $imaxesCategoria;
        }

        $rutaImagenes = "Imagenes/";

        $numeroImaxes = $_GET["numImaxes"];
        $categorias = explode(",", $_GET["categorias"]);

        for ($i = 0; $i < count($categorias); $i++) {
            $categorias[$i] = getCategoria($categorias[$i], $numeroImaxes);
        }
        //   echo var_dump($categorias);

        $columnas = 4;
        $filas = count($categorias);
        ?>
        <h1>Memoriza os elementos de cada categoria</h1>
        <h2 id="segundosRestantes"></h2>
        <form action="actividade.php" method="post" name="formulario">
            <input type="hidden" name="inicioXogo" value="si"/>
            <?php
            $contadorImaxes = 0;
            for ($indexFila = 0; $indexFila < $filas; $indexFila++) {
                ?>
                <input type = "hidden" name = "categoria<?= $indexFila ?>" value = "<?= implode(",", array_slice($categorias[$indexFila], 0, 2)) ?>"/>
                <div class="d-flex justify-content-center fila">
                    <?php
                    for ($i = 2; $i < count($categorias[$indexFila]); $i++) {
                        ?>
                        <div class="flex ficha">
                            <?php $imaxeActual = $rutaImagenes . $categorias[$indexFila][0] . "/" . $categorias[$indexFila][$i] ?>
                            <input type="hidden" name="<?= "imaxe$contadorImaxes" ?>" value="<?= $imaxeActual ?>"/>
                            <img src="<?= $imaxeActual ?>" />
                        </div>
                        <?php
                        $contadorImaxes++;
                    }
                    ?>
                    <div class="categoria">
                        <img src="<?= $categorias[$indexFila][1] ?>" />
                        <h4 class="align-middle"><?= $categorias[$indexFila][0] ?></h4>
                    </div>
                </div>

            <?php }
            ?>
        </form>
        <?php
        require_once '../../layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
        ?>
    </body>
</html>
