<?php
    // BreoBeceiro:29/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Módulo de funcións de validación e saneamento:
    include('moduloFuncions.inc.php');

    // Ficheiro de funcións comúns do sitio:
    include('../../librerias/utils.php');
?>
<!doctype html>
<html lang="gl">
    <head>
        <?php
            // Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:
            $directorioRaiz ="../..";
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
        <wrapper class="d-flex flex-column">
            <main class="container corpo">
                <?php
                    include('../../layout/cabeceira.php');
                ?>

                <?php
                    include('paxinaEnCoiros.inc.php');
                ?>
                
                <?php
                    include('../../layout/pe.php');
                ?>
            </main>
        </wrapper>
    </body>
</html>