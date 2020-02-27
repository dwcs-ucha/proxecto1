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
            function seleccionar(categoriaSeleccionada) {
                var seleccion = document.getElementById("seleccionado");
                seleccion.value = categoriaSeleccionada;
                document.formulario.submit();
            }
        </script>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include 'funcionsActividade.php';
            $estiloOcultarErro = "ocultar";
        for ($i = 0; isset($_POST["categoria$i"]); $i++) {
            $categorias[] = $_POST["categoria$i"];
        }
        if (isset($_POST["inicioXogo"])) {
            $puntuacion = 0;
            $imaxesPartida = getImaxesPartida();
            shuffle($imaxesPartida);
        } else {
            $puntuacion = $_POST["puntuacion"];
            $nomeCategoriaSeleccionada = $_POST["nomeCategoriaSeleccionada"];
            $imaxesPartida = explode(",", $_POST["imaxes"]);
            $elementoSeleccionado = $_POST["elementoSeleccionado"];
            seguinteTurno($puntuacion, $nomeCategoriaSeleccionada, $imaxesPartida, $elementoSeleccionado, $estiloOcultarErro);
            if (empty($imaxesPartida)) {
                finalizarXogo($puntuacion); //Facer despois das estadisticas
            }
        }

        ?>
        <div class="container">
            <?php
            include '../../Vista/layout/cabeceira.php';
            ?>

            <div>
                <h1>Selecciona a categoria a que pertence o elemento</h1>
            </div>
            <div class="contenedor">
                <form action="actividade.php" method="post" name="formulario">
                    <div id="puntuacion">
                        <input type="hidden" name="puntuacion" value="<?= $puntuacion ?>"/>
                        <h5>Puntuación: <?= $puntuacion ?></h5>
                    </div>
                    <div>
                        <h3>Categorías</h3>
                    </div>
                    <div class="categorias">
                        <input type="hidden" id="seleccionado" name="nomeCategoriaSeleccionada" value="" />
                        <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                            <div class="ficha" onclick="seleccionar('<?= explode(",", $categorias[$i])[INDEX_CATEGORIA_NOME] ?>')"/>
                            <input type="hidden" name="categoria<?= $i ?>" value="<?= $categorias[$i] ?>"/>
                            <img src="<?= explode(",", $categorias[$i])[INDEX_CATEGORIA_IMAXE_PRINCIPAL] ?>"/>
                            <h3><?= explode(",", $categorias[$i])[INDEX_CATEGORIA_NOME] ?></h3>
                        </div>
                    <?php }
                    ?>
            </div>
            <div class="elementos">
                <input type="hidden" name="imaxes" value="<?= implode(",", $imaxesPartida) ?>"/>
                <input type="hidden" name="elementoSeleccionado" value="<?= $imaxesPartida[INDEX_CATEGORIA_NOME] ?>"/>
                <img src="<?= $imaxesPartida[INDEX_CATEGORIA_NOME] ?>"/>
                <h3>Elemento</h3>
            </div>
            <div class="erro <?= $estiloOcultarErro ?>">
                Inténtao de novo
            </div>
        </form>
    </div>
    <?php
    require_once '../../Vista/layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
    ?>
</div>
</body>
</html>