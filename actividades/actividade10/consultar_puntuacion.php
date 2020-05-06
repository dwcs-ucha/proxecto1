<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Marzo de 2020
 * Descripción: Menú de consulta de puntuación de un usuario en concreto
 * Versión: 1.2
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/DAO.class.php';//Se añade como requerimiento la clase de acceso a datos (DAO)
require_once '../../Modelo/Estatisticas.class.php';//Se añade como requerimiento la clase de "Estatisticas"
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

session_start();//Se inicializa la sesión

/**
* Nombre: irPaginaAnterior()
* Descripción: Vuelve al menú principal
*/
function irPaginaAnterior() {
    if (isset($_POST['volver'])) {//Si se pulsa el botón de "Volver al Menú" se vuelve al menú principal
        header("Location: index.php");
    }
}

/**
 * Nombre: mostrarEstadisticas()
 * Descripción: Coge las estadísticas de la actividad y usuario específico, lo formatea y lo devuelve
 */
function mostrarEstadisticas($tabla, $campos) {
    $resultado = "";//Cadena formateada de los datos
    $estadisticas_usuarios = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$estadisticas_usuarios"

    $resultado_estadisticas = comprobarUsuario($estadisticas_usuarios);//Se ejecuta la función "comprobarUsuario()" con el parámetro "$estadisticas_usuarios" y se recoge el resultado en la variable $resultado_estadisticas"

    if (!is_bool($resultado_estadisticas)) {//Si la variable no es booleano, se formatean los datos para luego salir por pantalla
        $resultado .= "<ul id='estadisticas'><li>Nome: " . $resultado_estadisticas->nomexogador . "</li><li>Data: " . $resultado_estadisticas->data . "</li><li>Numero de intentos: " . $resultado_estadisticas->puntos . "</li><li>Dificultade: " . $resultado_estadisticas->dificultade . "</li></ul>";
    }

    return $resultado;//Se devuelve la cadena formateada
}

/**
 * Nombre: comprobarUsuario()
 * Descripción: Comprueba si el usuario tiene estadísticas en la actividad correspondiente
 */
function comprobarUsuario($usuarios) {
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)

    for ($cont = 0; $cont < count($usuarios); $cont++) {//Cada vez que se ejecuta este bucle
        /**
         * Si el código de la actividad y el nombre del jugador coinciden, se crea el objeto "$estadisticas_usuario" a partir de la clase "Estatisticas" con
         * los parámetros "$usuarios[$cont]["codactividade"]", "$usuarios[$cont]["nomexogador"]", "$usuarios[$cont]["data"]", "$usuarios[$cont]["puntos"]" y 
         * "$usuarios[$cont]["dificultade"]". Después se devuelve el objeto creado
         */
        if ($usuarios[$cont]["codactividade"] === "10" && $usuarios[$cont]["nomexogador"] === $usuario->getNome()) {
            $estadisticas_usuario = new Estatisticas($usuarios[$cont]["codactividade"], $usuarios[$cont]["nomexogador"], $usuarios[$cont]["data"], $usuarios[$cont]["puntos"], $usuarios[$cont]["dificultade"]);
            return $estadisticas_usuario;
        }
    }
    return false;//Por el contrario, se devuelve falso (false)
}

if (!isset($_SESSION['usuario'])) {//Si no está abierta la sesión de usuario, se lleva a la página de inicio de la actividad
    header("Location: index.php");
} else {//De lo contrario:
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 1) {//Si el rol del usuario es igual a 1 (es administrador), se le devuelve a la página de administración
        header("Location: administracion.php");
    } else {//Por el contrario, se le pasa ese dato a Smarty
        $smarty->assign('sesion_usuario', $usuario);
    }
}

$seleccion_campos = array("codactividade", "nomexogador", "data", "puntos", "dificultade");//Array con los campos a elegir

$estadisticas_usuario = mostrarEstadisticas("estadisticas", $seleccion_campos);//Se ejecuta la función "mostrarEstadisticas()" con los parámetros "estadisticas" y "$seleccion_campos", y se recoge el resultado en la variable "$estadisticas_usuario"

irPaginaAnterior();//Se ejecuta la función "irPaginaAnterior()"

$smarty->assign("estadisticas", $estadisticas_usuario);//Se asigna el valor de "$estadisticas_usuario" a esta etiqueta (estadisticas) y se pasa a Smarty

$smarty->display('consultar_puntuacion.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente