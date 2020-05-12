<!DOCTYPE html>
<?php
/**
 * @author Santiago Calvo Piñeiro
 */
include '../../Modelo/Config.class.php';
include 'Controlador/PartidaController.class.php';
include 'Controlador/CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
include_once Config::getRutaRootPHP() . 'Modelo/Estatisticas.class.php';

$usuario = Usuario::getUsuarioEnSesion();
if ($usuario === null) {
    $rol = "invitado";
} else if ($usuario->getRol() === Usuario::ROL_NORMAL) {
    $rol = "normal";
} else if ($usuario->getRol() === Usuario::ROL_ADMINISTRADOR) {
    $rol = "administrador";
}

$fasePartida = PartidaController::getFasePartida();
if ($fasePartida !== PartidaVO::FASE_CONFIGURAR) {
    PartidaController::crearPartidaNova();
}

if (isset($_POST["dificultade"])) {
    $dificultade = $_POST["dificultade"];
    if (Validacion::validarDificultade($dificultade)) {
        PartidaController::setDificultade($dificultade);
    } else {
        $mensaxeErro = "A dificultade non é válida";
    }
}

if (isset($_POST["xogar"])) {
    $numImaxes = $_POST["numImaxes"];
    if (Validacion::validaRangoNumerico($numImaxes, PartidaVO::NUMERO_IMAXES_CATEGORIA_MINIMO, PartidaVO::NUMERO_IMAXES_CATEGORIA_MAXIMO)) {
        PartidaController::iniciarXogo($numImaxes);
        header("Location: Controlador/respostas.php");
        exit();
    } else {
        $mensaxeErro = "O número de imaxes por categoría non é válido";
    }
}

//se pulsamos mostrar a clasificacion
if (isset($_POST['vercla'])) {
    $mostrarclas = true;
}

$dificultade = PartidaController::getDificultade();
$categorias = PartidaController::getCategoriasPartida();
$numeroImaxesCategoria = PartidaController::getNumeroImaxesPorCategoria();

$estadisticas = Estatisticas::estatisticas_actividade('a4');
$smarty->assign('estadisticas', $estadisticas);
$smarty->assign("dificultade", $dificultade);
$smarty->assign("categoriasPartida", $categorias);
$smarty->assign("numImaxes", $numeroImaxesCategoria);
$smarty->assign("numMinImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MINIMO);
$smarty->assign("numMaxImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MAXIMO);
if (isset($mostrarclas)) {
    $smarty->assign("mostrarclas", $mostrarclas);
}
if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
$smarty->assign("rol", $rol);
$smarty->display("Vista/index.tpl");
?>
        