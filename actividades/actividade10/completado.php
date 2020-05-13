<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 9 de Marzo de 2020
 * Descripción: Página de confirmación de guardado de estadísticas
 */

require '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

if (isset($_SESSION['usuario'])) {//Si está abierta la sesión de usuario:
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 1) {//Si el rol del usuario es igual a 1 (es administrador), se le devuelve a la página de administración
        header("Location: administracion.php");
    } else {//Por el contrario, se le pasa ese dato a Smarty
        $smarty->assign('sesion_usuario', $usuario);
    }
}

$smarty->display("completado.tpl");//Se muestra la plantilla "Smarty" correspondiente