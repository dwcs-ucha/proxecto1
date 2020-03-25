
<?php

include '../../../Modelo/Config.class.php';
include 'PartidaController.class.php';
include 'CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
session_start();

if (isset($_POST["categoriaSeleccionada"])) {
    $nomeCategoriaSeleccionada = $_POST["categoriaSeleccionada"];
    $nomesCategoriasPartida = PartidaController::getNomesCategoriasPartida();
    if (Validacion::buscaStringEnArray($nomeCategoriaSeleccionada, $nomesCategoriasPartida)) {
        if (PartidaController::comprobarResposta($nomeCategoriaSeleccionada)) {
            PartidaController::sumarPunto();
            PartidaController::seguinteImaxeClasificar();
        } else {
            PartidaController::restarPunto();
            $respostaEquivocada = true;
        }
    } else {
        $mensaxeErro = "Categoria non válida";
    }
}

if (PartidaController::rematouPartida()) {
    header("Location: ../index.php");
    exit();
}

$categorias = PartidaController::getCategoriasPartida();
$imaxeClasificar = PartidaController::getImaxeClasificar();
$puntuacion = PartidaController::getPuntuacion();

$smarty->assign("categorias", $categorias);
$smarty->assign("imaxeClasificar", $imaxeClasificar);
$smarty->assign("puntuacion", $puntuacion);
if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
if (isset($respostaEquivocada)) {
    $smarty->assign("respostaEquivocada", $respostaEquivocada);
}
$smarty->display("../Vista/actividade.tpl");
