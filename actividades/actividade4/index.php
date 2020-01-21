<!DOCTYPE html>
<html>
    <head>
        <?php
        /**
         * @Autor: Santiago Calvo Piñeiro
         * */
        $directorioRaiz = "../..";
        include '../../layout/head.php';
        ?>
        <meta charset="utf-8">
        <title>Agrupar elementos</title>

        <style>
            .ficha {
                border-style: solid;
                border-width: 1px;
                margin: 20px;
                text-align: center;
                display: inline;
            }
            .ficha img {
                width : 100px;
                height : 80px;
            }
            .dificultade {
                border-style: solid;
                border-width: 3px;
            }
        </style>
    </head>
    <body>
        <?php
        include '../../layout/cabeceira.php';

        $categorias = getCategorias();
        shuffle($categorias);
        $dificultade = isset($_POST["dificultade"]) ? $_POST["dificultade"] : "normal";
        $rutaImaxes = "Imagenes/";

        switch ($dificultade) {
            case "facil":
                $categorias = array_slice($categorias, 0, 2);
                break;
            case "normal":
                $categorias = array_slice($categorias, 0, 3);
                break;
            case "dificil":
                $categorias = array_slice($categorias, 0, 4);
                break;
        }

        function getCategorias() {
            $ficheiro = fopen("categorias.csv", "r");
            while (($datos = fgetcsv($ficheiro, 0, ";")) != false) {
                $categorias[] = array($datos[0], $datos[1]);
            }
            fclose($ficheiro);
            return $categorias;
        }
        ?>
        <h1>Xogo de agrupar elementos por categorías</h1>

        <div class="container-fluid corpo">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
                    <img src="icono.png" height="300" width="300"/>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                    <span>Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categoría de vocabulario dada.</span>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " align="center">
                    <form action="index.php" method="post">
                        <h4>Dificultade</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active btn-success">
                                <input type="radio" name="dificultade" value="facil" 
                                <?php
                                if ($dificultade == "facil") {
                                    echo "cheked";
                                }
                                ?>/>Fácil
                            </label>
                            <label class="btn btn-secondary active btn-warning">
                                <input type="radio" name="dificultade" value="normal" 
                                <?php
                                if ($dificultade == "normal") {
                                    echo "cheked";
                                }
                                ?>/>Normal
                            </label>
                            <label class="btn btn-secondary active btn-danger">
                                <input type="radio" name="dificultade" value="dificil" 
                                <?php
                                if ($dificultade == "dificil") {
                                    echo "cheked";
                                }
                                ?>/>Difícil
                            </label>
                        </div>
                        <button class = "btn btn-secondary" type="submit" name="enviarDificultade">Seleccionar dificultade</button>
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
                        <?php foreach ($categorias as $categoria) { ?>
                            <div class="flex ficha">
                                <img src="<?= $rutaImaxes . $categoria[0] . "/" . $categoria[1] ?>" />
                                <h6><?= $categoria[0] ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                    <form action="categorias.php" method="post">
                        <input type="hidden" name="dificultade" value="<?=$dificultade ?>"/>
                        <button class = "btn btn-secondary" type="submit">Seleccionar categorías</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                    <br/>
                    <button class="btn btn-lg btn-success" type="submit" name="enviar" value="enviar">Xogar</button>
                </div>
            </div>
        </div>
        <?php
        include '../../layout/pe.php';
        ?>
    </body>
</html>