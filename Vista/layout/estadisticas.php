<?php
    // BreoBeceiro:03/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Módulo de funcións de validación e saneamento:
    include('moduloFuncions.php');

    // Ficheiro de funcións comúns do sitio incluído coa finalidade de empregar a función lerCSV() para elaborar as estadísticas
    //   por medio da matriz de resultados obtidos dela:
    include('../../librerias/utils.php');
?>
<!doctype html>
<html lang="gl">
    <head>
        <?php
            // Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:
            $directorioRaiz = ".";
            include 'layout/head.php';
        ?>
        <script type="text/javascript" src=""></script>
        <style type="text/css">

            h2 { text-align: center;
                 margin-top: 10px; }

            .container p { margin: 5px 1px; }

            .imaxe { display: block;
                     width: 30%;
                     margin: auto; }

        </style>
        <title>
            Xogoteca | Estadísticas
        </title>
    </head>

    <body>
        <div class="container">
            <?php
                include('layout/cabeceira.php');
            ?>



            <?php
                include('layout/pe.php');
            ?>
        </div>
    </body>
</html>