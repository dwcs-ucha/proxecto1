<html>
    <head>
        <?php
        $directorioRaiz = "../..";
        include '../../layout/head.php';
        ?>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function seleccionar(categoriaSeleccionada) {
                var seleccion = document.getElementById("seleccionado");
                seleccion.value = categoriaSeleccionada;
                document.formulario.submit();
            }
        </script>
        <style>
            .ocultar {
                display: none;
            }
            .cabeceira {
                position: relative;
            }
            .contenedor {
                border-style: solid;
                width: 80%;
                margin: 50px auto;
            }
            #puntuacion {
                text-align: right;
            }
            #puntuacion h5 {
                margin: 20px 40px;
            }
            .categorias {
                text-align: center;
            }
            .ficha {
                display: inline-block;
                text-align: center;
                margin: 10px 20px;
                padding: 15px;
                background-color: slateblue;
            }
            .ficha:hover{
                background-color: green;
                cursor: pointer;
            }
            .ficha img {
                width : 140px;
                height : 100px;
                background-color: white;
            }
            .elementos {
                margin: 50px auto;
                margin-bottom: 10px;
                text-align: center;
            }
            .erro {
                margin-top: 0px;
                text-align: center;
                color: red;
                font-size: 40px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php
        include '../../layout/cabeceira.php';
        if (isset($_POST["inicioXogo"])) {
            $puntuacion = 0;
            $claseOcultar = "ocultar";
            for ($i = 0; isset($_POST["categoria$i"]); $i++) {
                $categorias[] = $_POST["categoria$i"];
            }
            for ($i = 0; isset($_POST["imaxe$i"]); $i++) {
                $imaxesMisturadas[] = $_POST["imaxe$i"];
            }
            shuffle($imaxesMisturadas);
        } else {
            $puntuacion = $_POST["puntuacion"];
            for ($i = 0; isset($_POST["categorias$i"]); $i++) {
                $categorias[] = $_POST["categorias$i"];
            }
            //     echo var_dump($categorias);
            $categoriaSeleccionada = $_POST["categoriaSeleccionada"];
            $imaxesMisturadas = explode(",", $_POST["imaxes"]);
            $elementoSeleccionado = $_POST["elementoSeleccionado"];

            $categoriasTotais = getCategorias();
            $indexCategoriaSeleccionada = array_search($categoriaSeleccionada, array_column($categoriasTotais, 0));
            $directoriosElementoSeleccionado = explode("/", $elementoSeleccionado);
            if (in_array($directoriosElementoSeleccionado[count($directoriosElementoSeleccionado) - 1], $categoriasTotais[$indexCategoriaSeleccionada])) {
                $puntuacion++;
                $claseOcultar = "ocultar";
                unset($imaxesMisturadas[0]);
                $imaxesMisturadas = array_slice($imaxesMisturadas, 0);
                if (empty($imaxesMisturadas)) {
                    finalizarXogo($puntuacion); //Facer despois das estadisticas
                }
            } else {
                if ($puntuacion > 0) {
                    $puntuacion--;
                }
                $claseOcultar = "";
            }
        }

        function getCategorias() {
            $ficheiro = fopen("categorias.csv", "r");
            while (($datos = fgetcsv($ficheiro, 0, ";")) != false) {
                $categorias[] = $datos;
            }
            fclose($ficheiro);
            return $categorias;
        }
        ?>

        <div>
            <h1>Selecciona a categoria a que pertence o elemento</h1>
        </div>
        <div class="contenedor">
            <form action="actividade.php" method="post" name="formulario">
                <div id="puntuacion">
                    <input type="hidden" name="puntuacion" value="<?= $puntuacion ?>"/>
                    <h5>Puntuacion: <?= $puntuacion ?></h5>
                </div>
                <div>
                    <h3>Categorias</h3>
                </div>
                <div class="categorias">
                    <input type="hidden" id="seleccionado" name="categoriaSeleccionada" value="" />
                    <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                        <div class="ficha" onclick="seleccionar('<?= explode(",", $categorias[$i])[0] ?>')">
                            <input type="hidden" name="categorias<?= $i ?>" value="<?= $categorias[$i] ?>"/>
                            <img src="<?= explode(",", $categorias[$i])[1] ?>"/>
                            <h3><?= explode(",", $categorias[$i])[0] ?></h3>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="elementos">
                    <input type="hidden" name="imaxes" value="<?= implode(",", $imaxesMisturadas) ?>"/>
                    <input type="hidden" name="elementoSeleccionado" value="<?= $imaxesMisturadas[0] ?>"/>
                    <img src="<?= $imaxesMisturadas[0] ?>"/>
                    <h3>Elemento</h3>
                </div>
                <div class="erro <?= $claseOcultar ?>">
                    Intentao de novo
                </div>
            </form>
        </div>
        <?php
        require_once '../../layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
        ?>
    </body>
</html>