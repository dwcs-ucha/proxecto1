<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Marzo de 2020
 * Descripción: Menú de completado con login para guardar los resultados
 * Versión: 1.2
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/DAO.class.php';//Se añade como requerimiento la clase de acceso a datos (DAO)
require_once '../../Modelo/Estatisticas.class.php';//Se añade como requerimiento la clase de "Estatisticas"
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

if (!isset($_SESSION['usuario'])) {//Si no está abierta la sesión de usuario, se lleva a la página de inicio de la actividad
    header("Location: index.php");
} else {//De lo contrario:
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 1) {//Si el rol del usuario es igual a 1 (es administrador), se le devuelve a la página de administración
        header("Location: administracion.php");
    }
}

$usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)

setlocale(LC_TIME, "es_ES.UTF-8");//Se pone la información de localización en español de España
$fecha = strftime("%Y-%m-%d %H:%M:%S");//Fecha actual a guardar en las estadísticas (Año-Mes-Día Horas:Minutos:Segundos)

$dificultad = "";//Dificultad elegida

switch ($_SESSION['dificultad']) {//Se comprueba el valor de esta variable:
    case "facil"://Si el valor es "facil", se pone el valor "baixa" a la variable "$dificultad"
        $dificultad = "baixa";
        break;
    case "medio"://Si el valor es "medio", se pone el valor "media" a la variable "$dificultad"
        $dificultad = "media";
        break;
    case "dificil"://Si el valor es "dificil", se pone el valor "dificil" a la variable "$dificultad"
        $dificultad = "dificil";
        break;
}

/**
 * Se crea el objeto "$estadisticas" a partir de la clase "Estatisticas" con los parámetros "10", "$usuario->getNome()", "$fecha", "$_SESSION['num_intentos']" y "$dificultad"
 */
$estadisticas = new Estatisticas(10, $usuario->getNome(), $fecha, $_SESSION['num_intentos'], $dificultad);

$estadisticas->gardar_estatistica($estadisticas);//Se ejecuta la función "gardar_estatistica()" a partir del objeto "$estadisticas" con el parámetro "$estadisticas"

unset($_SESSION['juego'], $_SESSION['dificultad'], $_SESSION['num_intentos']);//Se elimina la información en sesion del tipo de juego, la dificultad y el número de intentos

$smarty->display('guardar_puntuacion.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente