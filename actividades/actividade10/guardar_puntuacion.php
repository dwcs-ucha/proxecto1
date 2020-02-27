<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de completado con login para guardar los resultados
 * Versión: 1.2
 */
require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa

?>
<html>
    <head>
        <title>Guardar Puntuación</title>
        <?php require "../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
    </head>
    <body>
        <div class="container">
            <?php require "../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
            <h1 class="titulo">Escribe usuario y contrasena:</h1>
            <form action="Funcionalidad/guardarPuntuacion.php" method="post">
                <label for="nombre">Nombre:</label><br/>
                <input id="nombre" type="text" name="nombre">

                <br/><br/>

                <label for="contrasena">Contraseña:</label><br/>
                <input id="contrasena" type="password" name="contrasena">

                <br/><br/>

                <input type="hidden" name="dificultad_oculta" value="<?php echo $dificultad ?>">
                <input type="hidden" name="num_intentos" value="<?php echo $num_intentos ?>">
                <input type="hidden" name="juego_a" value="<?php echo $juego_actual ?>">

                <input type="submit" name="guardar" value="Guardar Puntuación" onclick="return comprobarCampos()">
            </form>
            <div id="error" class="error"></div>
            <?php
            require "../../layout/pe.php";//Se incluye el pie de la página web
            ?>
        </div>
    </body>
</html>

<script>
    //Con esta función se comprueban que los campos de nombre y contraseña no vengan vacíos
    function comprobarCampos() {
        var nombre = document.getElementById("nombre").value;//Nombre del usuario
        var contrasena = document.getElementById("contrasena").value;//Contraseña del usuario
        var comprobacion = /^[A-Za-z0-9]+$/;//La expresión regular que comprueba que los datos sólo contengan letras y/o números

        if (nombre === "") {//Si el nombre está vacío se muestra un mensaje de error y devuelve falso (false)
            document.getElementById("error").innerHTML = "Tes que poñer un nome";
            return false;
        }

        if (!nombre.match(comprobacion)) {//Si el nombre contiene caracteres que no sean letras o números, se muestra un mensaje de error y devuelve falso (false)
            document.getElementById("error").innerHTML = "O nome só pode conter letras e números";
            return false;
        }

        if (contrasena === "") {//Si la contraseña está vacía se muestra un mensaje de error y devuelve falso (false)
            document.getElementById("error").innerHTML = "Tes que poñer un contrasinal";
            return false;
        }

        if (!contrasena.match(comprobacion)) {//Si la contraseña contiene caracteres que no sean letras o números, se muestra un mensaje de error y devuelve falso (false)
            document.getElementById("error").innerHTML = "O contrasinal só pode conter letras e números";
            return false;
        }

        return true;//Si no se cumple ninguna de las condiciones anteriores, devuelve verdadero (true) y se manda el formulario
    }
</script>