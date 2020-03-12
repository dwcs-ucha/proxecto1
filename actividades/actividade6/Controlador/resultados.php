<?php
/* * *************************** */
/*  Luis Corral de Cal      	 */
/*  10 Marzo 2020		 */
/*  Xogoteca->Actividade6        */
/*  Páxina da Actividade    	 */
/* 	Version 1	         */
/* * *************************** */
?>
<?php
session_start();
include_once '../../../Modelo/Config.class.php';
include_once '../../../iniciarsmarty.inc.php';
include_once '../../../Modelo/Estatisticas.class.php';
include_once '../Modelo/Sumas.class.php';

if(isset($_POST['reintentar'])){
    unset($_SESSION['a6_aciertos']);
    unset($_SESSION['a6_puntuacion']);
    header('location:sumas.php');
}
if(isset($_POST['nova'])){
    unset($_SESSION['a6_aciertos']);
    unset($_SESSION['a6_puntuacion']);
    unset($_SESSION['a6_partida']);
    header('location:sumas.php');
}
if(isset($_POST['gardar'])){
    //Coller os datos de usuario,actividade,crear data, puntuacion, dificultade
    //$estatistica = new Estatisticas($codactividade,$nomexogador,$data,$puntuacion,$dificultade);
    //gardar_estatistica($estatistica);
    
    unset($_SESSION['a6_dif']);
    unset($_SESSION['a6_partida']);
    unset($_SESSION['a6_aciertos']);
    unset($_SESSION['a6_puntuacion']);
    header('location:../index.php');
}
$aciertos = $_SESSION['a6_aciertos'];
$puntuacion = $_SESSION['a6_puntuacion'];
$login = false;


$smarty->assign('aciertos',$aciertos);
$smarty->assign('puntuacion',$puntuacion);
$smarty->assign('login',$login);
$smarty->display('../Vista/resultados.tpl');

