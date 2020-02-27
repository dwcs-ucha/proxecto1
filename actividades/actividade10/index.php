<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú con dos apartados, Sinónimos y Antónimos
 * Versión: 1.2
 */
 require "Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
?>
<html>
    
    <head>
        <title>Sinonimos y Antonimos</title>
        <?php require "../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        <?php require "../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
        <div class="container">
        <h1>SINONIMOS Y ANTONIMOS</h1>
        <form action="Funcionalidad/irPaginaCorrespondiente.php" method="post">
            <h2>Elixe un xogo</h2>
            <img id="nenos" src="Imagenes/nenos.png">
            <label>Sinonimos</label><input class="seleccion" type="radio" name="juego" value="sinonimos" checked><br/>
            <label>Antonimos</label><input class="seleccion" type="radio" name="juego" value="antonimos">

            <br/><br/>

            <h2>Elixe unha dificultade</h2>
            Fácil<input type="radio" class="seleccion" name="dificultad" value="facil" checked><br/>
            Normal<input type="radio" class="seleccion" name="dificultad" value="medio"><br/>
            Dificil<input type="radio" class="seleccion" name="dificultad" value="dificil">

            <br/><br/>

            <input type="submit" name="jugar" value="Xogar" onclick="return validarFormulario()">
            <input type="submit" name="consultar_puntuacion" value="Consultar Puntuación">
        </form>
        <div id="error" class="error"></div>
        <?php
        require "../../layout/pe.php";//Se incluye el pie de la página web
        ?>
    </body>
</html>


<script>
// Cuando el usario pulsa el botón "Xogar", se verifica si se eligió el juego y la dificultad
    function validarFormulario(){
        // Se cogen los valores del juego
        var juegos = document.getElementsByName("juego");
        var juegoSeleccion = false;

        // Si se eligió un juego, se cambia el valor de la variable "juegoSeleccion" a "true" (verdadero)
        for (var i = 0; i < juegos.length; i++)
        {  
            if(juegos[i].checked){
                juegoSeleccion = true;
                break;
            }
        }

        // Si no se eligió el juego, sale un mensaje de error que pide eligir un juego
        if(!juegoSeleccion){
            document.getElementById("error").innerHTML = "Elixe un xogo";
            return false;
        }

        // Se cogen los valores de la dificultad
        var dificultades = document.getElementsByName("dificultad");        
        var dificultadSeleccion = false;

        // Si se eligió una dificultad, se cambia el valor de la variable dificultadSeleccion a "true" (verdadero)
        for (var i = 0; i < dificultades.length; i++)
        {  
            if(dificultades[i].checked){
                dificultadSeleccion = true;
                break;
            }
        }

        // Si no se eligió la dificultad, sale un mensaje de error que pide eligir una dificultad
        if(!dificultadSeleccion){
            document.getElementById("error").innerHTML = "Elixe unha dificultade";
            return false;
        }

        // Si se eligió el juego y la dificultad, se devuelve "verdadero" y se manda el formulario
        return true;

    };
</script>