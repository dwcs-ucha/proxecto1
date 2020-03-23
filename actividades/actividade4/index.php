<!DOCTYPE html>
<?php
/**
 * @author Santiago Calvo Piñeiro
 */
include '../../Modelo/Config.class.php';
include 'Controlador/PartidaController.class.php';
include 'Controlador/CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';

session_start();
$fasePartida = PartidaController::getFasePartida();
if ($fasePartida !== PartidaVO::FASE_CONFIGURAR) {
    PartidaController::crearPartidaNova();
}
$partida = PartidaController::getPartida();
if (isset($_POST["dificultade"])) {
    PartidaController::setDificultade($_POST["dificultade"]);
}

if (isset($_POST["xogar"])) {
    $numImaxes = $_POST["numImaxes"];
    PartidaController::iniciarXogo($numImaxes);
    header("Location: Controlador/respostas.php");
    exit();
}


$smarty->assign("dificultade", $partida->getDificultade());
$smarty->assign("categoriasPartida", $partida->getCategorias());
$smarty->assign("numImaxes", $partida->getNumeroImaxesCategoria());
$smarty->assign("numMinImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MINIMO);
$smarty->assign("numMaxImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MAXIMO);
$smarty->display("Vista/index.tpl");
?>
        