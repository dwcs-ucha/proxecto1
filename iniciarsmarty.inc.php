<?php
$rutaRootPHP = $_SERVER['DOCUMENT_ROOT'].Config::$rutaApp;
$rutaRootHTML = $_SERVER['SERVER_NAME'].Config::$rutaApp;
require $rutaRootPHP.'/smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($rutaRootPHP.'/smarty/templates');
$smarty->setCompileDir($rutaRootPHP.'/smarty/templates_c');
$smarty->setCacheDir($rutaRootPHP.'/smarty/cache');
$smarty->setConfigDir($rutaRootPHP.'/smarty/configs');

$smarty->assign("rutaRootPHP", $rutaRootPHP);
$smarty->assign("rutaRootHTML", $rutaRootHTML);
?>