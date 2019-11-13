<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de sinónimos con dos niveles de dificultad: Fácil y Difícil
 * Versión: 1.0
 */
require "../../../layout/cabeceira.php";
require "../../../layout/menu.php";
?>
<html>
    <head>
        <title>Menú Sinónimos</title>
        <link rel="stylesheet" type="text/css" href="../Estilo/estilo.css">
    </head>
    <body>
        <h1 class="titulo">MENÚ SINÓNIMOS</h1>
        <h2>Elige la dificultad</h2>
        <a class='dificultades' href="Dificultades/sinonimos_facil.php">Fácil</a>
        <a class='dificultades' href="Dificultades/sinonimos_medio.php">Medio</a>
        <a class='dificultades' href="Dificultades/sinonimos_dificil.php">Difícil</a>
        <a class='volver_menu' href="../index.php">Volver al menu</a>
        <?php
        require "../../../layout/pe.php";
        ?>
    </body>
</html>