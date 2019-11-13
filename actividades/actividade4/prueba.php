<html>
    <head>
        <title>Prueba</title>
    </head>
    <?php
    require_once '../../layout/head.php'; /* Contén etiquetas coma meta, link, script */
    ?>
    <body>
        <?php
        require_once '../../layout/cabeceira.php'; /* Contén a cabeceira, que consiste nun menú horizontal <nav> [...] </nav> */

        $categoria = $_POST["categoria"];
        $seleccionados = getSeleccionadas();
        $correctas = getCorrectas($categoria);
        $aciertos = array_intersect($correctas, $seleccionados);
        ?>
        <h1>Tiveches <?= count($aciertos); ?> acertos</h1>


        <?php

        function getSeleccionadas() {
            for ($i = 0; isset($_POST["seleccionada" . $i]); $i++) {
                $seleccionados[] = $_POST["seleccionada" . $i];
            }
            return $seleccionados;
        }

        function getCorrectas($categoria) {
            $fichero = fopen("categorias.csv", "r");
            while (($linea = fgetcsv($fichero, 0, ";")) != false) {
                $categoriaLeida = $linea[0];
                if ($categoriaLeida == $categoria) {
                    for ($i = 1; $i < count($linea); $i++) {
                        $correcto[] = "Imagenes/" . $categoria . "/" . $linea[$i];
                    }
                    break;
                }
            }
            fclose($fichero);
            return $correcto;
        }
        ?>
        <?php
        require_once '../../layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
        ?>
    </body>
</html>
