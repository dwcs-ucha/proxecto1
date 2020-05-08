<?php
/* * *************************** */
/*  Luis Corral de Cal      	 */
/*  8 Mayo 2020 		 */
/*  Xogoteca->Actividade6        */
/*  Páxina da Actividade    	 */
/* 	Version 1	         */
/* * *************************** */
?>
<?php
//cargamos as clases necesarias
include_once '../../../Modelo/Config.class.php';
include_once '../../../iniciarsmarty.inc.php';
include_once '../../../Modelo/Estatisticas.class.php';
include_once '../../../Modelo/Usuario.class.php';
include_once '../Modelo/Sumas.class.php';
session_start();//iniciamos a sesion

if(isset($_POST['reintentar'])){//se pulsamos reintentar
    unset($_SESSION['a6_aciertos']);//borramos as variables da session
    unset($_SESSION['a6_puntuacion']);
    header('location:sumas.php');//rediriximos á páxina da partida
}
if(isset($_POST['nova'])){//se pulsamos nova partida
    unset($_SESSION['a6_aciertos']);//borramos as variables de sesion
    unset($_SESSION['a6_puntuacion']);
    unset($_SESSION['a6_partida']);
    header('location:sumas.php');//rediriximos á páxina da partida
}
if(isset($_POST['gardar'])){//sepulsamos en gardar as estatisticas
    //Coller os datos de usuario,actividade,crear data, puntuacion, dificultade
    $usuario = Usuario::getUsuarioEnSesion();   
    //Poñemos a información de localización en España
    setlocale(LC_TIME, "es_ES.UTF-8");
    //Cramos a data co formato para gardar nas estatisticas (Ano-Mes-Día Horas:Minutos:Segundos)
    $data = strftime("%Y-%m-%d %H:%M:%S");
    //creamos ó obxecto de estatisticas
    $estatistica = new Estatisticas('a6',$usuario->getNome(),$data,$_SESSION['a6_puntuacion'],$_SESSION['a6_dif']);
    //gardamos as estatisticas na base de datos
    Estatisticas::gardar_estatistica($estatistica);
    
    //quitamos da sesion as variables da partida
    unset($_SESSION['a6_dif']);
    unset($_SESSION['a6_partida']);
    unset($_SESSION['a6_aciertos']);
    unset($_SESSION['a6_puntuacion']);
    header('location:../index.php');//rediriximos ó inicio
}
//collemos os aciertos e a puntuacion da sesion ó acceder a páxina
$aciertos = $_SESSION['a6_aciertos'];
$puntuacion = $_SESSION['a6_puntuacion'];
//Collemos o usuario da sesion
$login = Usuario::getUsuarioEnSesion();


$smarty->assign('aciertos',$aciertos);
$smarty->assign('puntuacion',$puntuacion);
$smarty->assign('login',$login);
$smarty->display('../Vista/resultados.tpl');

