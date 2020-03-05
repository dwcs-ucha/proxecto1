<?php
  set_include_path('../smarty/libs');
  require('Smarty.class.php');
  $smarty = new Smarty();
  $smarty->setTemplateDir('../smarty/templates');
  $smarty->setCompileDir('../smarty/templates_c');
  $smarty->setCacheDir('../smarty/cache');
  $smarty->setConfigDir('../smarty/configs');

  $smarty->display('../Vista/administracion.tpl');
?>
