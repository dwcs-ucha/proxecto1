
<?php

/**
 * @author Santiago Calvo Piñeiro
 */
include '../../../Modelo/Config.class.php';
include 'PartidaController.class.php';
include 'CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';

session_start();
$partida = PartidaController::getPartida();

if (isset($_POST["enviarCategorias"])) {
    $nomesCategoriasSeleccionadas = $_POST["nomesCategoriasSeleccionadas"];
    $categoriasSeleccionadas = CategoriaController::getCategoriasSeleccionadas($nomesCategoriasSeleccionadas);
    PartidaController::setCategoriasSeleccionadas($categoriasSeleccionadas);
    header("Location: ../index.php");
    exit();
}

$categorias = CategoriaController::getCategorias();
$smarty->assign("categorias", $categorias);
if (isset($mensaxeErro)) {
    $smarty->assign("erro", $mensaxeErro);
}
$smarty->display("../Vista/categorias.tpl");
