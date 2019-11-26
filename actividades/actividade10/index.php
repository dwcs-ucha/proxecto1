<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú con dos apartados, Sinónimos y Antónimos
 * Versión: 1.0
 */
 require "../../layout/cabeceira.php";
 require "../../layout/menu.php";
 require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
?>
<html>
    <head>
        <title>Menú</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
    </head>
    <body>
        <h1 class="titulo">MENÚ PRINCIPAL</h1>
        <a class="tipo_juego" href="Sinonimos/menu_sinonimos.php">Sinonimos</a>
        <a class="tipo_juego" href="Antonimos/menu_antonimos.php">Antonimos</a>
        <?php
        require "../../layout/pe.php";
        ?>
    </body>
</html>