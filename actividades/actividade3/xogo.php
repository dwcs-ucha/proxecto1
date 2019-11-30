<?php
$minDificultade = 1;
$maxDificultade = 3;
$dificultade = $minDificultade; //dificultade por defecto
$difPost = isset($_POST['dificultade']) ? $_POST['dificultade'] : NULL;

function validarDificultade($difPost){
 global $minDificultade;
 global $maxDificultade;
 if(filter_var($difPost, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$minDificultade, "max_range"=>$maxDificultade))) === false) {
  return false;
 } else {
  return true;
 }
}

if(!empty($_POST['dificultade'])){
 if(validarDificultade($_POST['dificultade'])){
  $dificultade = $_POST['dificultade'];
 }
}
var_dump($dificultade);
?>
