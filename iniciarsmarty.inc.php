<?php
/**
 * @autor Manuel Ángel Calvo Piñeiro
 * @versión 1
 * @data 07/03/2020
 * @descripción Arquivo iniciador de Smarty.
 */
require Config::$rutaRootPHP.'/smarty/libs/Smarty.class.php';
require Config::$rutaRootPHP.'Controlador/CookiesController.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir(Config::$rutaRootPHP.'/smarty/templates');
$smarty->setCompileDir(Config::$rutaRootPHP.'/smarty/templates_c');
$smarty->setCacheDir(Config::$rutaRootPHP.'/smarty/cache');
$smarty->setConfigDir(Config::$rutaRootPHP.'/smarty/configs');

$smarty->assign("rutaRootPHP", Config::$rutaRootPHP);
$smarty->assign("rutaRootHTML", Config::$rutaRootHTML);
if (!CookiesController::isPoliticaCookiesAceptada()) {
    $smarty->assign("mostrarAvisoCookies", true);
    CookiesController::aceptarPoliticaCookies();
}
?>