<html>
    <head>
        <?php
        $directorioRaiz = "../..";
        include '../../layout/head.php';
        ?>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        <script src="seleccionar.js"></script>
        <style>
            .ficha {
                border-style: solid;
                border-width: 20;
                margin: 20 0;
                width : 150;
                height : 150;
            }
            .btn-lg {
                padding: 10 70;
            }
        </style>
    </head>
    <body>
        <?php
        include '../../layout/cabeceira.php';
        ?>

        <?php
        define("NUMERO_IMAGENES_FACIL", 5);
        define("NUMERO_IMAGENES_NORMAL", 10);
        define("NUMERO_IMAGENES_DIFICIL", 15);

        define("PROPORCION_IMAGENES_CORRECTAS_FACIL", 3);
        define("PROPORCION_IMAGENES_CORRECTAS_NORMAL", 2);
        define("PROPORCION_IMAGENES_CORRECTAS_DIFICIL", 1);
        asignarDificultad();

        $rutaImagenes = "Imagenes/";
        $numeroCategorias = getLineasFichero();
        $lineaCategoriaAciertos = rand(1, $numeroCategorias);

        $arrayAciertos = getImagenes($lineaCategoriaAciertos);
        $imagenesAcierto = $arrayAciertos["imagenes"];
        $categoriaAcierto = $arrayAciertos["categoria"];

        $arrayFallos = getImagenes(getNumeroAleatorioDistinto(1, $numeroCategorias, $lineaCategoriaAciertos));
        $imagenesFallo = $arrayFallos["imagenes"];
        ?>
        <form class = "container" method = "post" action = "respuestas.php">

            <h1><?= $categoriaAcierto ?></h1>
            <input type = "hidden" name="categoria" value="<?= $categoriaAcierto; ?>"/>
            <div>
                <?php escribirImagenes(); ?>
            </div>
            <div align = "center">
                <input class = "btn-lg btn-success"  type = "submit" value = "Enviar"/>
            </div>
        </form>
        <?php

        function escribirImagenes() {
            global $numeroImagenes;
            global $proporcionImagenesCorrectas;
            global $imagenesAcierto;
            global $imagenesFallo;
            $filas = $numeroImagenes / 5;

            $contador = 0;

            for ($i = 0; $i < $filas; $i++) {
                ?>
                <div class="d-flex"> 
                    <?php
                    for ($j = 0; $j < 5 && ($i * $j) < $numeroImagenes; $j++) {
                        $aleatorio = rand(1, $proporcionImagenesCorrectas + 1);
                        if ($aleatorio <= $proporcionImagenesCorrectas) {
                            $rutaImagen = next($imagenesAcierto);
                        } else {
                            $rutaImagen = next($imagenesFallo);
                        }
                        $contador++;
                        ?>
                        <div class="flex-fill">
                            <input id = "enviada<?= $contador; ?>" type = "hidden" name = "imagen<?= $contador; ?>" value = "<?= $rutaImagen; ?>-n"/>
                            <img class = "ficha" id = "imagen-<?= $contador; ?>" src = "<?= $rutaImagen; ?>" onclick = "seleccionar(this)"/>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        }

        function getLineasFichero() {
            global $rutaImagenes;

            $contador = 0;
            $archivo = fopen("categorias.csv", "r");
            while ($linea = fgetcsv($archivo) != false) {
                $contador++;
            }
            fclose($archivo);
            return $contador;
        }

        function getImagenes($indexLinea) {
            global $rutaImagenes;

            $archivo = fopen("categorias.csv", "r");
            for ($i = 0; $i < $indexLinea - 1; $i++) {
                fgetcsv($archivo);
            }
            $linea = fgetcsv($archivo, 0, ";");
            $categoria = $linea[0];
            for ($columna = 1; $columna < count($linea); $columna++) {
                $buenos[] = $rutaImagenes . $categoria . "/" . $linea[$columna];
            }
            fclose($archivo);
            shuffle($buenos);
            return array("categoria" => $categoria, "imagenes" => $buenos);
        }

        function getNumeroAleatorioDistinto($min, $max, $distinto) {
            do {
                $aleatorio = rand($min, $max);
            } while ($aleatorio == $distinto);
            return $aleatorio;
        }

        function asignarDificultad() {
            global $numeroImagenes;
            global $proporcionImagenesCorrectas;
            switch ($_POST["dificultade"]) {
                case "facil":
                    $numeroImagenes = NUMERO_IMAGENES_FACIL;
                    $proporcionImagenesCorrectas = PROPORCION_IMAGENES_CORRECTAS_FACIL;
                    break;
                case "normal":
                    $numeroImagenes = NUMERO_IMAGENES_NORMAL;
                    $proporcionImagenesCorrectas = PROPORCION_IMAGENES_CORRECTAS_NORMAL;
                    break;
                case "dificil":
                    $numeroImagenes = NUMERO_IMAGENES_DIFICIL;
                    $proporcionImagenesCorrectas = PROPORCION_IMAGENES_CORRECTAS_DIFICIL;
                    break;
            }
        }
        ?>

        <?php
        require_once '../../layout/pe.php'; /* Cont�n o p� da p�xina (<footer>[...]</footer>) */
        ?>
    </body>
</html>
