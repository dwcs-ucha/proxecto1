<?php 
        /********************************/
		/*  Luis Corral de Cal      	*/
		/*	05 Febreiro 2020			*/
    	/*	Proxecto 1 Avaliacion   	*/
    	/*  Páxina da Actividade    	*/
    	/*	Version 1	        		*/
    	/********************************/
?>
<?php 
define("semilla", '$5$rounds=5000$qqqwwwsemilla$');
$directorioRaiz ="../..";
include("$directorioRaiz/librerias/utils.php");
$num_a='';
$num_b='';
$dif='';
$errorusu=false;
//recollemos a dificultade
if(isset($_GET['difi'])){
    $dif = $_GET['difi'];
}
if(isset($_POST['dif'])){
    $dif = $_POST['dif'];
}
//recollemos os numeros mostrados para as sumas do POST e os reconvertimos en array
if(isset($_POST['comp']) || isset($_POST['gardar'])){
        $nume_a = explode(',',$_POST['num_a']);
        $nume_b = explode(',',$_POST['num_b']);
        $aciertos=0;
        $resultados = array();
        for($i=1;$i<=10;$i++){
                $a = (int)$nume_a[$i-1];
                $b = (int)$nume_b[$i-1];
                $result = $_POST["res$i"];
       //Comprobamos se o resultado enviado é correcto                
                if($result == ($a + $b)){
                    $aciertos++;
                    $resultados[$i] = true;                        
                }else{
                    $resultados[$i] = false;
                }
        }
        if(isset($_POST['gardar'])){  
 /* Se pulsamos gardar comprobase que o usuario é valido e chamamos a funcion de escribir */
 		
 
        	if(!$_POST['usuario'] || !$_POST['cont']){ 
			$errorusu = true;
        	}else{
        		$usu = trim($_POST['usuario']);
        		$contrasinal = crypt(trim($_POST['cont']),semilla);        		
        		if(!preg_match('/[a-zA-Z]/', $usu)){ 
	        		$errorusu = true;
        		}        	
        		else{
        		    switch($dif){
        				case 'facil':
        					$puntuacion = $aciertos;
        					break;
        				case 'medio':
        					$puntuacion = $aciertos*2;
        					break;
       					case 'dificil':
       						$puntuacion = $aciertos*3;
       						break;        					
        			}  		
		 	   $datos = array($usu,$contrasinal,'-','-',$dif,$puntuacion); 
       		   escribir_ordeadoCSV('clasificacion.csv',$datos);
       		   header("location:index.php");
            }
       }        
    }
 }
?>
<head>
<?php 
    /**
		* @Autor: Luis Corral
		* @GitHub: luiscorraldc
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 05/02/2020
		* @Version: 1.1
    **/
    include("../../layout/head.php"); /* Incluimos os enlaces dos estilos */?> 
<meta charset="utf-8">
	<link rel="stylesheet" href="styles/estilosXogo.css">
	<style>
	.xogo {	margin-left: 40%;
		vertical-align: center;	}
	.error { color: red;}	
	</style>
	<title>Caderno de Sumas</title> 
</head>
<body>
<?php include("../../layout/cabeceira.php"); /* Incluimos a cabeceira */?>
<h2>Dificultade : <?php echo $dif; ?></h2>
	<div class="xogo">
	
      <form action="sumas.php" method="post">
<?php /* creamos aleatoriamente as sumas */
        if(!isset($_POST['comp']) && !isset($_POST['gardar'])){
            $numeros_a = array();
            $numeros_b = array();        
            for($i=1;$i<=10;$i++){
                switch($dif){
                    case 'facil': 
                         array_push($numeros_a,rand(1,9));
                         array_push($numeros_b,rand(1,9));
                         break;
                    case 'medio':
                         array_push($numeros_a,rand(1,99));
                         array_push($numeros_b,rand(1,99));
                         break;
                    case 'dificil':
                         array_push($numeros_a,rand(1,999));
                         array_push($numeros_b,rand(1,999));
                         break;
                }
            }
            for($i=0;$i<sizeof($numeros_a);$i++){
                 $num_a .=$numeros_a[$i] . ',';
                 $num_b .=$numeros_b[$i] . ',';
            }
        }else{
          $num_a = $_POST['num_a'];
          $num_b = $_POST['num_b'];
        }
/* Sacamos as sumas por pantalla */
	for($i=1;$i<=10;$i++){ ?>      
        <label><? /* Se existe unha xogada anterior a recuperamos en pantalla */?>
        <?php if(isset($_POST['comp']) || isset($_POST['gardar'])){ 
                echo $nume_a[$i-1];
              }else{ /* Se non existe , creamos unha nova */
                echo $numeros_a[$i-1];
              }?>
        </label>
        + <label>
        <?php if(isset($_POST['comp']) || isset($_POST['gardar'])){ 
                echo $nume_b[$i-1];
              }else{
                echo $numeros_b[$i-1];
              }?>
        </label>
        = <input type="text" id="res1" name="res<?php echo $i;?>" size="2" 
            <?php if(isset($_POST['comp']) || isset($_POST['gardar'])){ ?> 
            value="<?php echo $_POST["res$i"];?>" <?php } ?>>
            <span style="background-color:
            <?php if($resultados[$i]){ ?>green<?php }else{ ?> red <?php } ?>">
            &nbsp;&nbsp;
            </span>
        <br>
       <?php } ?>
   <input type="submit" id="comp" name="comp" value="Comprobar">
   <input type="submit" id="nova" name="nova" value="Nova Partida">
   <br><br>Usuario :<input type="text" id="usuario" name="usuario" value=''>
   <br><br>Contrasinal : &nbsp;&nbsp;<input type="password" id="cont" name="cont" value=''>
   <input type="submit" id="gardar" name="gardar" value="Gardar Resultados">
   <br><span class="error">&nbsp;&nbsp;<?php if($errorusu){ echo 'Obligatorio introducir un usuario, so valen letras, e un Contrasinal'; } ?></span>
   <input type="hidden" id="num_a" name="num_a" value="<?php echo $num_a;?>">
   <input type="hidden" id="num_b" name="num_b" value="<?php echo $num_b;?>">
   <input type="hidden" id="dif" name="dif" value="<?php echo $dif;?>">    
     </form>
</div>
<?php if(isset($_POST['comp']) || isset($_POST['gardar'])){ ?>
        <h2>Resultado ---> <?php echo  $aciertos;?> Aciertos </h2>
<?php } ?>
   <div class='xogo'>
     <form action="index.php" method="post">
        <input type="submit" id="volver" name="volver" value="Volver ó inicio">
     </form>
</div>
     <?php include("../../layout/pe.php"); ?>
</body>
</html>
