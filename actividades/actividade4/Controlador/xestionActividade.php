<!DOCTYPE html>
<?php
/**
 * @author Santiago Calvo Piñeiro 
 */
include '../../../Modelo/Config.class.php';
include '../Controlador/CategoriaController.class.php';
include Config::getRutaRootPHP() . 'Modelo/DAO.class.php';
include Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
include Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
include Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';
include Config::getRutaRootPHP() . 'actividades/actividade4/Modelo/PartidaVO.class.php';

session_start();
//$usuario = new Usuario("santi", "1234", Usuario::ROL_NORMAL, "2020-03-26", 0);
//Usuario::insertarNovoUsuario($usuario);
//Usuario::loginUsuario("santi", "1234");
$usuario = Usuario::getUsuarioEnSesion();
if ($usuario !== null) {
    if ($usuario->getRol() !== Usuario::ROL_ADMINISTRADOR) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}

if (isset($_POST["nomeCategoriaEliminar"])) {
    $nomeCategoriaEliminar = $_POST["nomeCategoriaEliminar"];
    if (CategoriaController::borrarCategoria($nomeCategoriaEliminar) === false) {
        $mensaxeErro = "Non se puido eliminar a categoría";
    }
}

if (isset($_POST["rutaImaxeEliminar"])) {
    $imaxeEliminar = $_POST["rutaImaxeEliminar"];
    if (file_exists(Config::getRutaRootPHP() . $imaxeEliminar)) {
        CategoriaController::borrarImaxeCategoria($imaxeEliminar);
    } else {
        $mensaxeErro = "Non existe a imaxe que se quere eliminar";
    }
}

if (!empty($_FILES["imaxePrincipal"]["name"]) && isset($_POST["nomeCategoriaMostrar"])) {
    $nomeCategoriaMostrar = $_POST["nomeCategoriaMostrar"];
    $categoria = CategoriaController::getCategoria($nomeCategoriaMostrar);
    $imaxePrincipalNova = $_FILES["imaxePrincipal"];
    if (Validacion::validaImaxe($imaxePrincipalNova["type"])) {
        CategoriaController::actualizarImaxePrincipal($categoria, $imaxePrincipalNova);
    } else {
        $mensaxeErro = "Imaxe non válida";
    }
}

if (!empty($_FILES["imaxesCategoria"]["name"][0]) && isset($_POST["nomeCategoriaMostrar"])) {
    $nomeCategoriaMostrar = $_POST["nomeCategoriaMostrar"];
    $categoria = CategoriaController::getCategoria($nomeCategoriaMostrar);
    $datosImaxes = $_FILES["imaxesCategoria"];
    if (Validacion::validaImaxes($datosImaxes["type"], 0)) {//O número mínimo é 0 porque se presupón que a categoría xa
        //ten o número mínimo de imaxes necesarias
        CategoriaController::engadirImaxes($categoria, $datosImaxes);
    } else {
        $mensaxeErro = "As imaxes non son válidas";
    }
}


if (!empty($_POST["nomeCategoriaMostrar"])) {
    $nomeCategoriaMostrar = $_POST["nomeCategoriaMostrar"];
    $categoriaMostrar = CategoriaController::getCategoria($nomeCategoriaMostrar);
    if ($categoriaMostrar !== null) {
        $imaxePrincipal = $categoriaMostrar->getImaxeCategoria();
        $imaxesCategoriaMostrar = $categoriaMostrar->getImaxesXogo();
    } else { //Se introduce unha categoría que non existe non mostra ningunha categoría
        header("Location: xestionActividade.php");
    }
}

if (isset($_POST["novaCategoria"])) {
    if ($_POST["novaCategoria"] === "novaCategoria") {
        $nomeCategoria = $_POST["nomeCategoria"];
        $imaxePrincipal = $_FILES["imaxePrincipal"];
        $imaxesCategoria = $_FILES["imaxesCategoria"];
        if (!Validacion::validaNomeCategoria($nomeCategoria)) {
            $mensaxeErro = "Nome non válido";
        } else if (!Validacion::validaImaxe($imaxePrincipal["type"])) {
            $mensaxeErro = "Imaxe principal non válida";
        } else if (!Validacion::validaImaxes($imaxesCategoria["type"], PartidaVO::NUMERO_IMAXES_CATEGORIA_MAXIMO)) {
            $mensaxeErro = "Imaxes da categoría non válidas";
        } else {
            CategoriaController::insertarCategoria($nomeCategoria, $imaxePrincipal, $imaxesCategoria);
        }
    }
}


$nomesCategoriasAlmacenadas = CategoriaController::getNomesCategoriasAlmacenadas();
if (isset($mensaxeErro)) {
    $smarty->assign("mensaxeErro", $mensaxeErro);
}
$smarty->assign("nomesCategorias", $nomesCategoriasAlmacenadas);
if (isset($nomeCategoriaMostrar)) {
    $smarty->assign("mostrarCategoria", true);
    $smarty->assign("nomeCategoria", $nomeCategoriaMostrar);
    $smarty->assign("imaxePrincipal", $imaxePrincipal);
    $smarty->assign("imaxesCategoriaMostrar", $imaxesCategoriaMostrar);
}
$smarty->display("../Vista/xestionActividade.tpl");
