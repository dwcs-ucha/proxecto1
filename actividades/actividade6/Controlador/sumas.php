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
include_once '../../Modelo/Config.class.php';
include_once '../../iniciarsmarty.inc.php';
include_once '../../Modelo/Estatisticas.class.php';
include_once '../Modelo/Sumas.class.php';

$dif = $_SESSION['a6_dif'];
if(isset($_SESSION['a6_partida'])){
    $partida = $_SESSION['a6_partida'];
}else{
    $partida = Sumas::crearPartida($dif); //creamos a partida
}
$_SESSION['a6_partida'] = $partida;
if (isset($_POST['finalizar'])) {
    $aciertos = 0;
    $puntuacion = 0;
    $resultados = $_POST['res'];
    for ($i = 0; $i < sizeof($resultados); $i++) {
        if ($res[$i] == $partida[$i]->resultado) {
            $aciertos++;
        }
    }
    $_SESSION['a6_aciertos'] = $aciertos;
    switch ($dif) {
        case 'baixa':
            $puntuacion = $aciertos;
            break;
        case 'media':
            $puntuacion = $aciertos * 2;
            break;
        case 'dificil':
            $puntuacion = $aciertos * 3;
            break;
    }
    $_SESSION['a6_puntuacion'] = $puntuacion;
    header("location:resultados.php");
}

$smarty->assign('partida', $partida);
$smarty->assign('dif', $dif);
$smarty->display('../Vista/sumas.tpl');
?>
<?php 
    /**
		* @Autor: Luis Corral
		* @GitHub: luiscorraldc
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 05/02/2020
		* @Version: 1.1
    **/


