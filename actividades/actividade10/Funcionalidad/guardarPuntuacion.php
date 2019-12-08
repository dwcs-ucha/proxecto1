<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Se guarda la puntuación del jugador junto con su nombre y contraseñaS
 * Versión: 1.2
 */
$nombre_jugador = trim($_POST['nombre']);//Nombre del jugador
$contrasena_jugador = trim($_POST['contrasena']);//Contraseña del jugador
$juego_jugador = $_POST['juego_a'];//Juego elegido por el jugador
$dificultad_usuario = $_POST['dificultad_oculta'];//Dificultad que eligió el usuario
$num_intentos = $_POST['num_intentos'];//Número de intentos por parte del usuario
$lista_jugadores = "../Puntuacion/lista_jugadores.csv";//Lista de jugadores con la dificultad elegida y el número de intentos correspondiente

$datos = array($nombre_jugador, $contrasena_jugador, $juego_jugador, $dificultad_usuario, $num_intentos);//Se guardan los datos del jugador en un array ($datos)

if (!empty($nombre_jugador) && !empty($contrasena_jugador)) {//Si no está vacío los campos de nombre y contraseña:
    $fp = fopen($lista_jugadores, "a");//Se abre el archivo en modo escritura desde final del fichero añadiendo al mismo

    if (!$fp = fopen($lista_jugadores, "a")) {//Si no puede abrir el fichero sale un mensaje de error
        echo "<div class='error'>Non se pode ler o ficheiro</div>";
    } else {//Por el contrario, se pone la información en el archivo .csv, se cierra y lleva a la página de inicio
        fputcsv($fp, $datos);
        fclose($fp);
        header("Location: ../index.php");
    }
}