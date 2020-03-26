
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
//var_dump($usuario);

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
    $puntuacion = PartidaController::getPuntuacion();
    $dificultade = PartidaController::getDificultade();
    $data = date("Y-m-d");
    $estadistica = new Estatisticas('a4', $usuario->getNome(), $data, $puntuacion, $dificultade);
 //   var_dump($estadistica);
  //  Estatisticas::gardar_estatistica($estadistica);
  //  header("Location: ../index.php");
  //  exit();
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
