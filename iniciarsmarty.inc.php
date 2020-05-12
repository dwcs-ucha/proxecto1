<?php

/**
 * @autor Manuel Ángel Calvo Piñeiro
 * @versión 1.1
 * @data 10/03/2020
 * @descripción Arquivo iniciador de Smarty.
 */
//Inclúese Smarty
require_once "Modelo/Config.class.php";
require_once Config::getRutaRootPHP() . '/smarty/libs/Smarty.class.php';
require_once Config::getRutaRootPHP() . 'Controlador/CookiesController.class.php';
require_once Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';

//Créase o obxecto Smarty
$smarty = new Smarty();
$smarty->setTemplateDir(Config::getRutaRootPHP() . '/smarty/templates');
$smarty->setCompileDir(Config::getRutaRootPHP() . '/smarty/templates_c');
$smarty->setCacheDir(Config::getRutaRootPHP() . '/smarty/cache');
$smarty->setConfigDir(Config::getRutaRootPHP() . '/smarty/configs');

//Asígnanse variables para facer funcionar certas características da páxina web
$smarty->assign("rutaRootPHP", Config::getRutaRootPHP());
$smarty->assign("rutaRootHTML", Config::getRutaRootHTML());
if (!CookiesController::isPoliticaCookiesAceptada()) {
    $smarty->assign("mostrarAvisoCookies", true);
    CookiesController::aceptarPoliticaCookies();
}
session_start();
if (Usuario::getUsuarioEnSesion() !== null) {
    $smarty->assign("logeado", true);
}
?>