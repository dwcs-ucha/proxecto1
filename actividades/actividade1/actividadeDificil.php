<?php
    // BreoBeceiro:29/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Módulo de funcións de validación e saneamento:
    include('moduloFuncions.php');
?>
<!doctype html>
<html lang="gl">
    <head>
        <?php
            // Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:
            include('../../layout/head.php');

            // En función do valor do parámetro 'tema' que veña pola URL, se é que ven, empregarase unha capa de CSS
            //   ou outra (sendo as existentes dúas, unha de estilo claro, e outra de estilo escuro):
            if(empty($_GET['tema'])){
                echo "<link rel='stylesheet' type='text/css' href='estiloClaro.css'>";
            }elseif($_GET['tema']== "escuro"){
                echo "<link rel='stylesheet' type='text/css' href='estiloEscuro.css'>";
            }elseif($_GET['tema']== "claro"){
                echo "<link rel='stylesheet' type='text/css' href='estiloClaro.css'>";
            }
        ?>
        <script type="text/javascript" src=""></script>
        <style type="text/css">

            /* CSS */
            
        </style>
        <title>
            Completar sílabas e palabras | Nivel 3
        </title>
    </head>

    <body>
        <div class="container">
            <?php
                include('../../layout/cabeceira.php');
            ?>

            <?php
                include('paxinaEnCoiros.php');
            ?>
            
            <?php
                include('../../layout/pe.php');
            ?>
        </div>
    </body>
</html>