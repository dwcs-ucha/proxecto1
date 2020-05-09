
<?php

/**
 * @author Santiago Calvo Piñeiro
 */
include '../../../Modelo/Config.class.php';
include 'PartidaController.class.php';
include 'CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';

session_start();

$fasePartida = PartidaController::getFasePartida();
if ($fasePartida !== PartidaVO::FASE_CONFIGURAR) {
    header("Location: ../index.php");
    exit();
}

$partida = PartidaController::getPartida();
$numeroCategoriasPermitidas = PartidaController::getNumeroCategoriasPermitidas();
if (isset($_POST["enviarCategorias"])) {
    if (empty($_POST["nomesCategoriasSeleccionadas"])) {
        $mensaxeErro = "Debes seleccionar $numeroCategoriasPermitidas categorías";
    } else {
        $nomesCategoriasSeleccionadas = $_POST["nomesCategoriasSeleccionadas"];
        $nomesCategoriasAlmacenadas = CategoriaController::getNomesCategoriasAlmacenadas();
        $numeroCategoriasSeleccionadas = count($nomesCategoriasSeleccionadas);
        if (Validacion::validarListaContenDatos($nomesCategoriasSeleccionadas, $nomesCategoriasAlmacenadas)) {
            if ($numeroCategoriasSeleccionadas === $numeroCategoriasPermitidas) {
                $categoriasSeleccionadas = CategoriaController::getCategoriasSeleccionadas($nomesCategoriasSeleccionadas);
                PartidaController::setCategoriasSeleccionadas($categoriasSeleccionadas);
                header("Location: ../index.php");
                exit();
            } else {
                $mensaxeErro = "Debes seleccionar $numeroCategoriasPermitidas categorías";
            }
        } else {
            $mensaxeErro = "Algunha das categorías seleccionadas non é válida";
        }
    }
}

$categorias = CategoriaController::getCategorias();
$smarty->assign("categorias", $categorias);
if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
if (isset($numeroCategoriasPermitidas)) {
    $smarty->assign("numeroCategoriasSeleccionar", $numeroCategoriasPermitidas);
}
$smarty->display("../Vista/categorias.tpl");
