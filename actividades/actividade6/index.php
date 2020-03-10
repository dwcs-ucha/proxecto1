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
    }else{
       $dif='';
	$errordif=true;
    }   
/* Se todo esta correcto collemos o valor da dificultade e rediriximos á paxina da actividae 
   Enviamos o valor polo Get na ruta á páxina seguinte */
     if(isset($_POST['dif'])){
       $dif = $_POST['dif'];
        header("location:sumas.php?difi=$dif");
    }    
}
if(isset($_POST['vercla'])){
	$mostrarclas = true;
}

$smarty->assign('errordif',$errordif);
$smarty->assign('mostrarclas',$mostrarclas);
$smarty->display('../Vista/index.tpl');


?>

