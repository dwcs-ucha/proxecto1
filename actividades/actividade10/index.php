<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú con dos apartados, Sinónimos y Antónimos
 * Versión: 1.1
 */
 require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
?>
<html>
    
    <head>
        <title>Sinónimos y Antónimos</title>
        <?php require "../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
    </head>
    <body>
        <div class="container">
        <?php require "../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
        <h1>SINÓNIMOS Y ANTÓNIMOS</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h2>Elixe un xogo</h2>
            <img id="nenos" src="Imagenes/nenos.jpg">
            <label>Sinónimos</label><input class="seleccion" type="radio" name="juego" value="sinonimos" checked><br/>
            <label>Antónimos</label><input class="seleccion" type="radio" name="juego" value="antonimos">

            <br/><br/>

            <h2>Elixe unha dificultade</h2>
            Fácil<input type="radio" class="seleccion" name="dificultad" value="facil" checked><br/>
            Normal<input type="radio" class="seleccion" name="dificultad" value="medio"><br/>
            Dificil<input type="radio" class="seleccion" name="dificultad" value="dificil">

            <br/><br/>

            <input type="submit" name="jugar" value="Xogar">
        </form>
        <?php
        irPaginaCorrespondiente();
        require "../../layout/pe.php";//Se incluye el pie de la página web
        ?>
        </div>
    </body>
</html>