<?php

require_once "../Modelo/Config.class.php";
include_once Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';

if (isset($_SERVER['HTTP_REFERER'])) {
    $paxinaAnterior = str_replace(Config::getRutaRootPHP(), Config::getRutaRootHTML(), $_SERVER['HTTP_REFERER']);
}
$paxinaRedirixir = isset($paxinaAnterior) ? $paxinaAnterior : Config::getRutaRootHTML() . "index.php";
Usuario::logoff();
header('Location: '. $paxinaRedirixir);
exit();
?>