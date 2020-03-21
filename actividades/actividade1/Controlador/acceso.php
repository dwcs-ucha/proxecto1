<?php
    // BreoBeceiro:21/03/2020
    // PROXECTO 2º AVALIACIÓN | Versión 1.0

    include('../Modelo/Xogador.class.php');
    include('../Modelo/DAO.class.php');

    include_once '../../Modelo/Config.class.php'; 
    include_once Config::$rutaRootPHP.'iniciarsmarty.inc.php';

    if(isset($_POST['enviar'])){
        $user= $_POST['nomeXogador'];
        $passw= $_POST['contrasinalXogador'];

        // Se algún/s campo/s vai baleiro/s, amosarase unha mensaxe de advertencia.
        if(empty($user) || empty($passw)){
            $camposBaleiros= "<p>Os campos non poden ir baleiros</p>";
        }elseif(isset($user) && isset($passw)){
            $xogador= trim($user);
            $contrasinal= trim($passw);

            if(DAO::comprobaXogador($xogador, $contrasinal)){
                    session_start();
                    $_SESSION['xogador']= $xogador;
                    $_SESSION['contrasinal']= $contrasinal;

                    header('Location: actividadeDoada.php');
            }else{
                $xogadorNonAtopado= "<p>O xogador non está na Base de Datos.</p>";
            }
        }
    }

    // PRIMEIRO CARGAS AS CLAVES CO MÉTODO DE SMARTY assign, LOGO AMOSAS A PLANTILLA:
    $smarty->display("Vista/actividadeDoada.tpl");
?>
