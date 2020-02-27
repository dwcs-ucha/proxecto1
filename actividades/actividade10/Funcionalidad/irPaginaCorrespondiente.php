<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Dependiendo de lo que eligió el usuario en el menú principal, se va a un juego o a otro con la dificultad correspondiente
 * Versión: 1.2
 */


// Se cogen los valores del formulario
$juego_usuario = $_POST["juego"];
$dificultad_usuario = $_POST["dificultad"];
$pagina_consulta = $_POST["consultar_puntuacion"];

// Se va al juego con la dificultad elegida
if (isset($juego_usuario) && isset($dificultad_usuario)) {//Si se puso el juego y la dificultad:
    if ($juego_usuario == "sinonimos") {//Si el juego que se eligió es el de los sinónimos, se pone la dificultad puesta por el usuario y se va a la página de "juego_sinonimos.php"
        switch($dificultad_usuario) {
            case "facil":
                $dificultad = "facil";
                break;
            case "medio":
                $dificultad = "medio";
                break;
            case "dificil":
                $dificultad = "dificil";
        }
        header("Location: ../Sinonimos/juego_sinonimos.php?dificultad=" . $dificultad . "&num_intentos=0");
    }
    if ($juego_usuario == "antonimos") {//Si el juego que se eligió es el de los antónimos, se pone la dificultad puesta por el usuario y se va a la página de "juego_antonimos.php"
        switch($dificultad_usuario) {
            case "facil":
                $dificultad = "facil";
                break;
            case "medio":
                $dificultad = "medio";
                break;
            case "dificil":
                $dificultad = "dificil";
        }
        header("Location: ../Antonimos/juego_antonimos.php?dificultad=" . $dificultad . "&num_intentos=0");
    }
}
if (isset($pagina_consulta)) {//Si se pulsó en el botón de "Consultar Puntuación", se va a la página de la consulta de las puntuaciones
    header("Location: ../consultar_puntuacion.php");
}
?>