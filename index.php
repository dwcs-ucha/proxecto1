<?php
include_once './Modelo/Config.class.php';
include_once './iniciarsmarty.inc.php';
$smarty->display(Config::$rutaRootPHP."/Vista/index.tpl");
?>