<?php

include_once '../Modelo/Config.class.php';
include_once Config::$rutaRootPHP . 'iniciarsmarty.inc.php';
$smarty->display(Config::$rutaRootPHP.'Vista/politicaCookies.tpl');