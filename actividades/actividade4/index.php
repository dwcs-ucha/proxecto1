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
        <title>Agrupar elementos</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .ficha:hover{
                background-color: slateblue;
                cursor: default;
            }
        </style>
        <script type="text/javascript">
            function cambiarDificultade() {
                var t = 1;
                setInterval(function () {
                    t--;
                    if (t == 0) {
                        document.formularioDificultade.submit();
                    }
                }, 10, "JavaScript");
            }
        </script>
    </head>
    <body>
        <?php
        include 'funcionsActividade.php';
        /**
         * @property string $rutaImaxes Directorio no que se atopan todas as imaxes da actividade.
         */
        $rutaImaxes = "Imagenes/";
        /**
         * @property array $categoriasFicheiro Array multidimensional que contén todas as categorías do ficheiro "categorias.csv".
         * Só garda o nome e a imaxe de cada categoría.
         */
        $categoriasFicheiro = getNomesImaxesCategoriasFicheiro();
        /**
         * @property string $dificultade Dificultade seleccionada para a actividade. Por defecto e unha dificultade media,
         * pero o usuario pode modificala a través dun formulario. Os posibles valores son: fácil, normal, difícil.
         */
        $dificultade = isset($_GET["dificultade"]) ? $_GET["dificultade"] : "normal";
        /**
         * @param array $categoriasPartida Array multidimensional que contén as categorías que van a usarse na partida
         * actual. Só garda o nome e a imaxe de cada categoría.
         */
        $categoriasPartida = getCategoriasPartida($categoriasFicheiro, $dificultade);

        
        ?>
        <div class="container">
            <?php
            include '../../Vista/layout/cabeceira.php';
            ?>
            <h1>Xogo de agrupar elementos por categorías</h1>

            <div class="container-fluid corpo">
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 imaxe">
                        <img src="icono.png" height="300" width="300"/>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                        <span>Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categoría de
                            vocabulario dada. Primeiro se mostran as categorías e os elementos que pertencen a ela e
                            despois reforzaría o aprendido clasificando eses mesmos elementos. 
                            <a href = "Manual de usuario.pdf" >Descargar manual de usuario</a>
                        </span>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " align="center">
                        <form action="index.php" method="get" name="formularioDificultade">
                            <h4>Dificultade</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary <?php
            if ($dificultade == "facil") {
                echo "active";
            }
            ?>  btn-success" onclick="cambiarDificultade()">
                                    <input type="radio" name="dificultade" value="facil" 
                                           />Fácil
                                </label>
                                <label class="btn btn-secondary <?php
                                if ($dificultade == "normal") {
                                    echo "active";
                                }
            ?> btn-warning" onclick="cambiarDificultade()">
                                    <input type="radio" name="dificultade" value="normal" 
                                           />Normal
                                </label>
                                <label class="btn btn-secondary <?php
                                if ($dificultade == "dificil") {
                                    echo "active";
                                }
            ?> btn-danger" onclick="cambiarDificultade()">
                                    <input type="radio" name="dificultade" value="dificil" 
                                           />Difícil
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 marxe"></div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                        <div class="d-flex">
                            <h4 class="flex">Categorías </h4>
                        </div>
                        <div class="d-flex">
                            <?php foreach ($categoriasPartida as $categoria) { ?>
                                <div class="flex ficha">
                                    <img src="<?= $rutaImaxes . $categoria[0] . "/" . $categoria[1] ?>" />
                                    <h6><?= $categoria[0] ?></h6>
                                </div>
                            <?php } ?>
                        </div>
                        <form action="categorias.php" method="post">
                            <input type="hidden" name="dificultade" value="<?= $dificultade ?>"/>
                            <button class = "btn btn-secondary" type="submit">Seleccionar categorías</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                        <form action="respostas.php" method="get">
                            Número imaxes por categoría <input type="number" name="numImaxes" value="5" min="5" max="10"/>
                            <input type="hidden" name="categorias" value="<?= implode(",", array_column($categoriasPartida, 0)) ?>"/>
                            <input type="hidden" name="dificultade" value="<?= $dificultade ?>"/>
                            <br/>
                            <button class="btn btn-lg btn-success" type="submit" name="enviar" value="enviar">Xogar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include '../../Vista/layout/pe.php';
            ?>
        </div>
    </body>
</html>