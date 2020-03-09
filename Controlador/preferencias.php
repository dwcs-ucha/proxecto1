<?php

include_once '../Modelo/Config.class.php';
include_once Config::$rutaRootPHP . 'iniciarsmarty.inc.php';
include_once Config::$rutaRootPHP . 'Controlador/cookies.php';

if (isset($_POST["preferencias"])) {
    if (isset($_POST["temaOscuro"])) {
        setcookie("temaOscuro", true, time()+3600, "/");
    } else {
        setcookie("temaOscuro", true, time()-100, "/");
    }
}
//var_dump($_COOKIE);
$smarty->assign("temaOscuro", isset($_COOKIE["temaOscuro"]));
$smarty->display(Config::$rutaRootPHP.'Vista/preferencias.tpl');
