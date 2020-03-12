<?php
  require('../Modelo/DAO.class.php');
  require('../Modelo/Usuario.class.php');
  require('../Modelo/Normal.class.php');
  require('../Modelo/Administrador.class.php');
  include_once '../Modelo/Config.class.php';
  include_once Config::$rutaRootPHP.'iniciarsmarty.inc.php';

  $hoxe = date("Y-m-d");
  $campos = ['nome', 'contrasinal', 'rol', 'dataAlta', 'bloqueado'];
  $camposObligatorios = ['nome', 'contrasinal', 'rol'];
  $datos = DAO::leerDatos('usuarios', $campos);
  $usuarios = Array();
  for ($i=0; $i < count($datos) ; $i++) {
    $u = new Usuario($datos[$i][0], $datos[$i][1], $datos[$i][2], $datos[$i][3], $datos[$i][4]);
    $usuarios[] = $u;
  }
  var_dump($usuarios);

  if(isset($_POST['listaUsuarios'])) {
    $smarty->assign('usuarioSeleccionado', $_POST['listaUsuarios']);
  }

  if (isset($_POST['crear'])) {
    $erros = Array();
    for ($i=0; $i < count($camposObligatorios) ; $i++) {
      if (empty($_POST[$camposObligatorios[$i]])) {
        $erros[] = $_POST[$camposObligatorios[$i]];
      }
    }
    if (count($erros) > 0) {
      $smarty->assign('erros', $erros);
    } else {
      if ($_POST['rol'] = 1) {
        $a = new Administrador($_POST['nome'], $_POST['contrasinal'], $hoxe);
        if(!Usuario::insertarNovoUsuario($a)) {
          $erros[] = 'existente';
          $smarty->assign('erros', $erros);
        }
      } else {
        $n = new Normal($_POST['nome'], $_POST['contrasinal'], $hoxe, 0);
        if(!Usuario::insertarNovoUsuario($n)) {
          $erros[] = 'existente';
          $smarty->assign('erros', $erros);
        }
      }
    }

  }

  if (isset($_POST['eliminar'])) {
    if (isset($_POST['listaUsuarios'])) {
      $campos_condiciones = ['nome'];
      $tipos_condiciones = ['='];
      $valores_condiciones = [$_POST['listaUsuarios']];
      DAO::borrarDatos('usuarios', $campos_condiciones, $tipos_condiciones, $valores_condiciones);
      header('Location:administracion.php');
    }
  }

  $smarty->assign('numeroUsuarios', count($usuarios) - 1);
  $smarty->assign('usuarios', $usuarios);
  $smarty->display('../Vista/administracion.tpl');
?>
