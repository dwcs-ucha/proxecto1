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
include Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';

session_start();

/*
    CREACIÓN MANUAL DE USUARIO ATA QUE SE COMPLETE A OPCIÓN DE REXISTRO DE USUARIOS
 */
/*
//$usuario = new Usuario("santi", "1234", Usuario::ROL_NORMAL, "2020-03-26", 0);
$usuario = new Usuario("santi", "1234", Usuario::ROL_ADMINISTRADOR, "2020-03-26", 0);
Usuario::insertarNovoUsuario($usuario);
Usuario::loginUsuario("santi", "1234");
 */

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


$dificultade = PartidaController::getDificultade();
$categorias = PartidaController::getCategoriasPartida();
$numeroImaxesCategoria = PartidaController::getNumeroImaxesPorCategoria();

$smarty->assign("dificultade", $dificultade);
$smarty->assign("categoriasPartida", $categorias);
$smarty->assign("numImaxes", $numeroImaxesCategoria);
$smarty->assign("numMinImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MINIMO);
$smarty->assign("numMaxImaxes", PartidaVO::NUMERO_IMAXES_CATEGORIA_MAXIMO);
if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
$smarty->assign("rol", $rol);
$smarty->display("Vista/index.tpl");
?>
        