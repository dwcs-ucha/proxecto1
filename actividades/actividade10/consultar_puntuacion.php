<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de consulta de puntuación de un usuario en concreto
 * Versión: 1.2
 */
require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
irPaginaAnterior();//Dependiendo de que botón se pulse, se vuelve a una página u otra (En este caso se vuelve al menú principal)

?>
<html>
    <head>
        <title>Consultar Puntuacion</title>
        <?php require "../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
    </head>
    <body>
        <div class="container">
            <?php require "../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
            <h1 class="titulo">Escribe usuario y contrasena:</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="nombre">Nombre:</label><br/>
                <input id="nombre" type="text" name="nombre">

                <br/><br/>

                <label for="contrasena">Contraseña:</label><br/>
                <input id="contrasena" type="password" name="contrasena">

                <br/><br/>

                <input type="submit" name="consultar" value="Consultar Puntuación">
                <input type="submit" name="volver_consulta" value="Volver al menú">
            </form>
            <?php
            consultarPuntuacion("Puntuacion/lista_jugadores.csv");//Se ejecuta la función "consultarPuntuacion()" con el parámetro del archivo csv donde se encuentra

            require "../../layout/pe.php";//Se incluye el pie de la página web
            ?>
        </div>
    </body>
</html>