<?php
    // BreoBeceiro:24/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Arquivo que pode desaparecer:
    include('actividadeDoada_Utilidades.php');

    // Módulo de funcións de validación e saneamento:
    include('actividadeDoada_moduloFuncions.php');

    if(isset($_POST['enviar'])){

    }
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
            Completar sílabas e palabras | Nivel 2
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