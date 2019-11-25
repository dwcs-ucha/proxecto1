<html>
    <head>
        <?php
        require_once '../../layout/head.php'; /* Contén etiquetas coma meta, link, script */
        ?>
        <title>Título</title>
        <meta charset="utf-8"/>
        <script src="script.js"></script>
        <style>
            img {
                border-style : solid;
                width : 150;
                height : 150;
            }
        </style>
    </head>
    <body>
        <?php
        require_once '../../layout/cabeceira.php'; /* Contén a cabeceira, que consiste nun menú horizontal <nav> [...] </nav> */
        ?>

        <?php
        define("NUMERO_IMAGENES_FACIL", 5);
        define("NUMERO_IMAGENES_NORMAL", 10);
        define("NUMERO_IMAGENES_DIFICIL", 20);

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
        <form method = "post" action = "prueba.php">

            <h1><?= $categoriaAcierto ?></h1>
            <input type="hidden" name="categoria" value="<?= $categoriaAcierto; ?>"/>
            <div class="imagenes">
                <?php escribirImagenes(); ?>
            </div>
            <input type = "submit" value = "Enviar"/>
        </form>
        <?php

        function escribirImagenes() {
            global $numeroImagenes;
            global $proporcionImagenesCorrectas;
            global $imagenesAcierto;
            global $imagenesFallo;
            
            for ($i = 0; $i < $numeroImagenes; $i++) {
                $aleatorio = rand(1, $proporcionImagenesCorrectas + 1);
                if ($aleatorio <= $proporcionImagenesCorrectas) {
                    $rutaImagen = next($imagenesAcierto);
                } else {
                    $rutaImagen = next($imagenesFallo);
                }
                ?>
                <input id = "seleccionada<?= $i; ?>" type = "hidden" name = "seleccionada<?= $i; ?>" value = ""/>
                <img id = "imagen-<?= $i; ?>" src = "<?= $rutaImagen; ?>" onclick = "seleccionar(this)"/>
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
            //     switch ("normal") {
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
        require_once '../../layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
        ?>
    </body>
</html>
