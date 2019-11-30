<?php
// BreoBeceiro:25/11/2019
// PROXECTO 1º AVALIACIÓN | Versión 1.0
// Páxina de Inicio PROVISIONAL para o sitio web do Proxecto da 1ª Avaliación do módulo de 'Desenvolvemento web 
//   en contorno servidor'.
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
                     width: 42%;
                     margin: auto; }

        </style>
        <title>
            Proxecto1 | Inicio
        </title>
    </head>

    <body>
        <div class="container">
            <?php
            include('layout/cabeceira.php');
            ?>

            <h2>Proxecto 1ª Avaliación</h2>
            <p>
                Benvid@s ao sitio web de xogos e actividades para nenos e nenas con trastornos do espectro autista (TEA) e outros
                problemas psicosociais.
                <br /><br />
                Este sitio foi desenvolvido polos alumn@s do módulo de <strong>'Desenvolvemento web en contorno servidor'</strong> 
                pertencente ao segundo curso do FP Superior en 'Desenvolvemento de Aplicacións Web', no CIFP Rodolfo Ucha Piñeiro,
                como parte da materia do propio módulo.
                <br /><br />
                Tódolos alumnos do módulo esperamos que disfrutedes moito coas nosas actividades, así que non esperedes máis e 
                comezade xa cos xogos!
            </p>

            <br />
            <img src="imaxes/arcoIris.jpg" alt="Globo con cara feliz" class="imaxe" />

            <?php
            include('layout/pe.php');
            ?>
        </div>
    </body>
