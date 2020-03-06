<?php
//$rutaRootPHP = $_SERVER['DOCUMENT_ROOT'].Config::$rutaApp;
//$rutaRootHTML = $_SERVER['SERVER_NAME'].Config::$rutaApp;
require Config::$rutaRootPHP.'/smarty/libs/Smarty.class.php';
echo Config::$rutaRootPHP;
$smarty = new Smarty();
$smarty->setTemplateDir(Config::$rutaRootPHP.'/smarty/templates');
$smarty->setCompileDir(Config::$rutaRootPHP.'/smarty/templates_c');
$smarty->setCacheDir(Config::$rutaRootPHP.'/smarty/cache');
$smarty->setConfigDir(Config::$rutaRootPHP.'/smarty/configs');

$smarty->assign("rutaRootPHP", Config::$rutaRootPHP);
$smarty->assign("rutaRootHTML", Config::$rutaRootHTML);
?>