<?php

include '../../../Modelo/Config.class.php';
include '../Controlador/PartidaController.class.php';
include '../Controlador/CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';


session_start();

if (isset($_POST["xogar"])) {
    PartidaController::avanzarAFaseClasificarImaxes();
}

$fasePartida = PartidaController::getFasePartida();
switch ($fasePartida) {
    case PartidaVO::FASE_MEMORIZAR_IMAXES:
        break;
    case PartidaVO::FASE_CLASIFICAR_IMAXES:
        header("Location: actividade.php");
        exit();
        break;
    default:
        header("Location: ../index.php");
        exit();
        break;
}

$categorias = PartidaController::getCategoriasPartida();
$smarty->assign("categorias", $categorias);
$smarty->display("../Vista/respostas.tpl");
