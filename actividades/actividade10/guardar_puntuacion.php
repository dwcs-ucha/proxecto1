<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de completado con login para guardar los resultados
 * Versión: 1.1
 */
require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa

?>
<html>
    <head>
        <title>Menú Sinónimos</title>
        <?php require "../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
    </head>
    <body>
        <div class="container">
            <?php require "../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
            <h1 class="titulo">Escribe usuario y contraseña:</h1>
            <form action="" method="post">
                <label for="nombre">Nombre:</label><br/>
                <input id="nombre" type="text" name="nombre">

                <br/><br/>

                <label for="contrasena">Contraseña:</label><br/>
                <input id="contrasena" type="password" name="contrasena">

                <br/><br/>

                <input type="hidden" name="dificultad_oculta" value="<?php echo $dificultad ?>">
                <input type="hidden" name="num_intentos" value="<?php echo $num_intentos ?>">
                <input type="submit" name="guardar" value="Guardar Puntuación">
            </form>
            <?php
            guardarPuntuacion("Puntuacion/lista_jugadores.csv");

            require "../../layout/pe.php";//Se incluye el pie de la página web
            ?>
        </div>
    </body>
</html>