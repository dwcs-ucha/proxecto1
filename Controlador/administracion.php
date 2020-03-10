<?php
  require('../Modelo/DAO.class.php');
  require('../Modelo/Normal.class.php');
  require('../Modelo/Administrador.class.php');
  set_include_path('../smarty/libs');
  require('Smarty.class.php');
  $smarty = new Smarty();
  $smarty->setTemplateDir('../smarty/templates');
  $smarty->setCompileDir('../smarty/templates_c');
  $smarty->setCacheDir('../smarty/cache');
  $smarty->setConfigDir('../smarty/configs');

  $hoxe = date("Y-m-d");
  $campos = ['nome', 'contrasinal', 'rol', 'dataAlta', 'bloqueado'];
  $camposObligatorios = ['nome', 'contrasinal', 'rol'];
  $usuarios = DAO::leerDatos('usuarios', $campos);

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

  if (isset($_POST['eliminiar']) && isset($_POST['listaUsuarios'])) {
    $campos_condiciones = ['nome'];
    $tipos_condiciones = ['='];
    $valores_condiciones = [$_POST['listaUsuarios']];
    DAO::borrarDatos('usuarios', $campos_condiciones, $tipos_condiciones, $valores_condiciones);
  } else {
    header('Location:administracion.php');
  }

  $smarty->assign('numeroUsuarios', count($usuarios) - 1);
  $smarty->assign('listaUsuarios', $_POST['listaUsuarios']);
  $smarty->display('../Vista/administracion.tpl');
?>
