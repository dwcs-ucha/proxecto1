<?php

include_once '../Modelo/Config.class.php';
include_once Config::$rutaRootPHP . 'iniciarsmarty.inc.php';

if (isset($_POST["preferencias"])) {
    if (isset($_POST["temaOscuro"])) {
        setcookie("temaOscuro", true, time()+3600, "/");
    } else {
        setcookie("temaOscuro", true, time()-100, "/");
    }
    header("Location: " . Config::$rutaRootHTML . "Controlador/preferencias.php");
    exit();
}
//var_dump($_COOKIE);
$temaOscuro = isset($_COOKIE["temaOscuro"]) ? "checked" : "";
$smarty->assign("temaOscuro", $temaOscuro);
$smarty->display(Config::$rutaRootPHP.'Vista/preferencias.tpl');
