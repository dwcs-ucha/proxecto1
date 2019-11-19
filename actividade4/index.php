<html>
    <head>
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
        <form method = "post" action = "prueba.php">
            <input id = "aciertos" type = "hidden" name = "aciertos" value = "0"/>
            <?php
            $rutaImagenes = "Imagenes/";
            $categoria = "Animales/";

            $buenos = getImagenesBuenas();
            $malos = getImagenesMalas();

            $contadorMal = 0;
            for ($i = 0; $i < 20; $i++) {
                $aleatorio = rand(1, 5);
                if ($aleatorio < 5 || $contadorMal >= 5) {
                    ?>
                    <img src = "<?php echo next($buenos); ?>" onclick = "seleccionarAcierto(this)"/>
                <?php
                } else {
                    $contadorMal++;
                    ?>
                    <img src = "<?php echo next($malos); ?>" onclick = "seleccionar(this)"/>
                    <?php
                }
            }
            ?>
            <input type = "submit" value = "Enviar"/>
        </form>
        <?php

        function getImagenesBuenas() {
            global $categoria;
            global $rutaImagenes;

            for ($i = 1; $i <= 20; $i++) {
                $buenos[] = $rutaImagenes . $categoria . "Bien/$i.JPG";
            }
            shuffle($buenos);
            return $buenos;
        }

        function getImagenesMalas() {
            global $categoria;
            global $rutaImagenes;

            for ($i = 1; $i <= 6; $i++) {
                $malos[] = $rutaImagenes . $categoria . "Mal/$i.JPG";
            }
            shuffle($malos);
            return $malos;
        }
        
        
        ?>
    </body>
</html>
