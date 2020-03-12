<?php 
        /********************************/
	/*	Luis Corral de Cal      */
	/*	10 Marzo 2020	        */
    	/*	Xogoteca- Actividade 6	*/
    	/*  	Páxina de acceso        */
    	/*	Version 1		*/
	/********************************/
    /**
		* @Autor: Luis Corral
		* @GitHub: luiscorraldc
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 10/04/2020
		* @Version: 1.1
    **/
?>
<?php
session_start();
if(isset($_SESSION['a6_dif'])){
    unset($_SESSION['a6_dif']);
}
if(isset($_SESSION["a6_partida"])){
    unset($_SESSION["a6_partida"]);
}
/* Para facer funcionar Smarty */
include_once '../../Modelo/Config.class.php'; 
include_once '../../iniciarsmarty.inc.php';
include_once '../../Modelo/Estatisticas.class.php';
$errordif=false;
$dif="-";
$mostrarclas=false;
/* Cando pulsamos entrar garda o nivel de dificultade se estan ben, 
   se non ó estan, declara as variable vacias para mostrar o erro no formulario
   en cada caso */
if(isset($_POST['entrar'])){
    if(isset($_POST['dif'])){
       $dif = $_POST['dif'];
        $_SESSION['a6_dif'] = $dif;
        header("location:Controlador/sumas.php");
        /* Se todo esta correcto collemos o valor da dificultade e rediriximos á paxina da actividade */
    }else{
       $dif='';
	$errordif=true;
    }      
}
if(isset($_POST['vercla'])){
	$mostrarclas = true;
}
$smarty->assign('errordif',$errordif);
$smarty->assign('mostrarclas',$mostrarclas);
$smarty->display('Vista/index.tpl');


?>

