<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de sinónimos con dos niveles de dificultad: Fácil y Difícil
 * Versión: 1.0
 */
require "../../../layout/cabeceira.php";//Se incluye la cabecera de la página web
require "../../../layout/menu.php";//Se incluye el menú de la página web
?>
<html>
    <head>
        <title>Menú Antónimos</title>
        <link rel="stylesheet" type="text/css" href="../Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../../estilos/estilos.css">
    </head>
    <body>
        <h1 class="titulo">MENÚ ANTÓNIMOS</h1>
        <h2>Elige la dificultad</h2>
        <a class='dificultades' href="Dificultades/antonimos_facil.php">Fácil</a>
        <a class='dificultades' href="Dificultades/antonimos_medio.php">Medio</a>
        <a class='dificultades' href="Dificultades/antonimos_dificil.php">Difícil</a>
        <a class='volver_menu' href="../index.php">Volver al menu</a>
        <?php
        require "../../../layout/pe.php";//Se incluye el pie de la página web
        ?>
    </body>
</html>