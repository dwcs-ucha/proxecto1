
<?php

include '../../../Modelo/Config.class.php';
include 'PartidaController.class.php';
include 'CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
session_start();
if (isset($_POST["categoriaSeleccionada"])) {
    $nomeCategoriaSeleccionada = $_POST["categoriaSeleccionada"];
    if (PartidaController::comprobarResposta($nomeCategoriaSeleccionada)) {
        PartidaController::sumarPunto();
        PartidaController::seguinteImaxeClasificar();
    } else {
        PartidaController::restarPunto();
        $erro = true;
    }
}

if (PartidaController::rematouPartida()) {
    header("Location: ../index.php");
    exit();
}

$partida = PartidaController::getPartida();
$categorias = PartidaController::getCategoriasPartida();
$imaxeClasificar = PartidaController::getImaxeClasificar();
$puntuacion = PartidaController::getPuntuacion();

$smarty->assign("categorias", $categorias);
$smarty->assign("imaxeClasificar", $imaxeClasificar);
$smarty->assign("puntuacion", $puntuacion);
if (isset($erro)) {
    $smarty->assign("erro", $erro);
}
$smarty->display("../Vista/actividade.tpl");