<?php

include '../../../Modelo/Config.class.php';
include 'PartidaController.class.php';
include 'CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
include Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';
include Config::getRutaRootPHP() . 'Modelo/Estatisticas.class.php';

session_start();
$usuario = Usuario::getUsuarioEnSesion();
if ($usuario !== null) {
    $usuarioLogeado = true;
}

if (isset($_POST["gardarPuntuacion"])) {
    $puntuacion = PartidaController::getPuntuacion();
    $dificultade = PartidaController::getDificultade();
    $data = date("Y-m-d");
    $estadistica = new Estatisticas('a4', $usuario->getNome(), $data, $puntuacion, $dificultade);
    Estatisticas::gardar_estatistica($estadistica);
}

$puntuacion = PartidaController::getPuntuacion();


$smarty->assign("puntuacion", $puntuacion);
if (isset($usuarioLogeado)) {
    $smarty->assign("usuarioLogeado", $usuarioLogeado);
}

$smarty->display("../Vista/estatisticas.tpl");
