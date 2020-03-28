<!DOCTYPE html>
<?php
/**
 * @author Santiago Calvo Piñeiro
 */
include '../../Modelo/Config.class.php';
include 'Controlador/CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
include Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';

session_start();
//$usuario = new Usuario("santi", "1234", Usuario::ROL_NORMAL, "2020-03-26", 0);
//Usuario::insertarNovoUsuario($usuario);
//Usuario::loginUsuario("santi", "1234");
//$usuario = Usuario::getUsuarioEnSesion();
//var_dump($usuario);

$fasePartida = PartidaController::getFasePartida();
if ($fasePartida !== PartidaVO::FASE_CONFIGURAR) {
    PartidaController::crearPartidaNova();
}

if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
$smarty->display("Vista/index.tpl");
