<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 30 de Marzo de 2020
 * Descripción: Página de logoff
 * Versión: 1.2
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

$_SESSION = array();//Elimina todos los datos de sesión
if (isset($_COOKIE[session_name()])) {//Si la cookie que almacena la sesión existe, se borra
        setcookie(session_name(), "", time() - 42000);
}
session_destroy();//Se destruye la sesión
session_unset();//Se cierra por completo la sesión llegado a este punto

$smarty->display('logoff.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente