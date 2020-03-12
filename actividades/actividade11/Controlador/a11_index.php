<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 12/11/2019
* @UltimaModificacion: 10/12/2019
* @Version: 0.0.9b
**/
/*
  set_include_path('../../../smarty/libs');
  require('Smarty.class.php');
  $smarty = new Smarty();
  $smarty->setTemplateDir('../../../smarty/templates');
  $smarty->setCompileDir('../../../smarty/templates_c');
  $smarty->setCacheDir('../../../smarty/cache');
  $smarty->setConfigDir('../../../smarty/configs');
*/
  include_once '../../../Modelo/Config.class.php';
  include_once Config::getRutaRootPHP().'/iniciarsmarty.inc.php';
  $smarty->display('../Vista/a11_index.tpl');
?>
