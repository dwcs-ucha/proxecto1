<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú con dos apartados, Sinónimos y Antónimos
 * Versión: 1.2
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

if (isset($_POST['juego'])) {//Si tiene algo de valor, se guarda en esta variable
    $juego_usuario = $_POST['juego'];
}
if (isset($_POST['dificultad'])) {//Si tiene algo de valor, se guarda en esta variable
    $dificultad_usuario = $_POST['dificultad'];
}
if (isset($_POST['jugar'])) {//Si tiene algo de valor, se guarda en esta variable
    $jugar = $_POST['jugar'];
}
if (isset($_POST['consultar_puntuacion'])) {//Si tiene algo de valor, se guarda en esta variable
    $consultar_puntuacion = $_POST['consultar_puntuacion'];
}

/**
 * Nombre: administrarBotonJugar
 * Descripción: comprueba si se pulsó el botón de "Xogar" y, dependiendo de lo que se eligió, se va a una página u otra
 */
function administrarBotonJugar($boton_jugar, $juego, $dificultad) {
    if (isset($boton_jugar)) {//Si se pulsó el botón de "Xogar":
        $_SESSION['dificultad'] = $dificultad;//Se guarda la dificultad del juego en la sesión del usuario
        $_SESSION['juego'] = $juego;//Se guarda el tipo de juego en la sesión de usuario
        $_SESSION['num_intentos'] = 0;//Se inicializa el número de intentos del jugador actual
        header("Location: juego.php");
    }
}

if (isset($_SESSION['usuario'])) {//Si existe la sesión de usuario, se le pasa ese dato a Smarty
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 1) {//Si el rol del usuario es igual a 1 (es administrador), se le devuelve a la página de administración
        header("Location: administracion.php");
    } else {//Por el contrario, se le pasa ese dato a Smarty
        $smarty->assign('sesion_usuario', $usuario);
    }
}

if (isset($jugar)) {//Si se pulsó el botón de "Xogar":
    administrarBotonJugar($jugar, $juego_usuario, $dificultad_usuario);//Se ejecuta la función "administrarBotonJugar() con los parámetros "$boton_jugar" y "$juego"
}

if (isset($consultar_puntuacion)) {//Si se pulsó el botón de "Consultar Puntuación", se le lleva a la página de consulta de la puntuación
    header("Location: consultar_puntuacion.php");
}

$smarty->display('index.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente
