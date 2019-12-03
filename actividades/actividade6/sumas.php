<?php 
        /********************************/
	    /*      Luis Corral de Cal      */
	    /*	    28 Novembro 2019	    */
    	/*	    Proxecto 1 Avaliacion   */
    	/*      Páxina da Actividade    */
    	/*	    Version 1		        */
    	/********************************/
?>
<?php 
/*Funcion para gardar a puntuacion*/
/* Pasamoslle como parámetro o nome, a dificultade e a puntuacion da partida */
 function gardar($nome,$dif,$punt){
    $rexistros = array();//Array que usaremos para ordear as puntuacións
    $ficheiro = fopen('clasificacion.csv', "r+");//abrimos o ficheiro en lectura
    while($celdas = fgetcsv($ficheiro,',')){
        $celdas = array_reverse($celdas);
        array_push($rexistros,$celdas);
        //gardamos no array de rexistro a fila do ficheiro pero dandolle a volta
    }
    fclose($ficheiro);//pechamos o ficheiro
    $datos = array(0,$nome,$dif,$punt);//Creamos o novo rexistro
    $datos = array_reverse($datos);
    array_push($rexistros,$datos);//O engadimos o array
    rsort($rexistros);//Ordeamos os rexistros de maior a menor
    for($i=0;$i<sizeof($rexistros);$i++){//Agora modificamos os identificadores
        $rexistros[$i] = array_reverse($rexistros[$i]);//O volvemos a colocar en orde
        $rexistros[$i][0] = $i + 1; //Modificamos o identificador
    }
    /*Abrimos o ficheiro en modo escritura e que sobreescriba o que hai*/
    $ficheiro = fopen('clasificacion.csv', "w+");
    for($i=0;$i<sizeof($rexistros);$i++){
      fputcsv($ficheiro,$rexistros[$i]);//Escribimos os rexistros no csv
  }
  fclose($ficheiro);//pechamos o ficheiro
 }
?>
<?php 
$directorioRaiz ="../..";
$num_a='';
$num_b='';
//$nome='';
$dif='';
//recollemos o nome e a dificultade
if(isset($_GET['difi'])){
//    $nome = $_GET['nome'];
    $dif = $_GET['difi'];
}
if(isset($_POST['dif'])){
//    $nome = $_POST['nome'];
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
            gardar($nome,$dif,$aciertos);
        /*Se pulsamos gardar chámase a función e pasamoslle como parámetros
        o nome a dificultade e os aciertos */
        }
 }
?>
<head>
<?php 
    /**
		* @Autor: Luis Corral
		* @GitHub: luiscorraldc
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 3/12/2019
		* @Version: 1.1
    **/
    include("../../layout/head.php"); /* Incluimos os enlaces dos estilos */?> 
<meta charset="utf-8">
	<link rel="stylesheet" href="styles/estilosXogo.css">
	<title>Caderno de Sumas</title> 
</head>
<body>
<?php include("../../layout/cabeceira.php"); /* Incluimos a cabeceira */?>
<?php /*<div class="xogador"> */?>
<?php /* <h3>Xogador : <?php echo $nome ?> </h3> */ ?>
<h2>Dificultade : <?php echo $dif; ?></h2>
<?php /* </div> */ ?>
      <form action="sumas.php" method="post">
<?php /* creamos aleatoriamente as sumas */
        if(!isset($_POST['comp'])){
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
        for($i=1;$i<=10;$i++){ 
?>      
        <label><? /* Se existe unha xogada anterior a recuperamos en pantalla */?>
        <?php if(isset($_POST['comp'])){ 
                echo $nume_a[$i-1];
              }else{ /* Se non existe , creamos unha nova */
                echo $numeros_a[$i-1];
              }?>
        </label>
        + <label>
        <?php if(isset($_POST['comp'])){ 
                echo $nume_b[$i-1];
              }else{
                echo $numeros_b[$i-1];
              }?>
        </label>
        = <input type="text" id="res1" name="res<?php echo $i;?>" size="2" 
            <?php if(isset($_POST['comp'])){ ?> 
            value="<?php echo $_POST["res$i"];?>" <?php } ?>>
            <span style="background-color:
            <?php if($resultados[$i]){ ?>green<?php }else{ ?> red <?php } ?>">
            &nbsp;&nbsp;
            </span>
        <br>
       <?php } ?>
   <input type="submit" id="comp" name="comp" value="Comprobar">
   <input type="submit" id="nova" name="nova" value="Nova Partida">
   <input type="submit" id="gardar" name="gardar" value="Gardar Resultados">
   <input type="hidden" id="num_a" name="num_a" value="<?php echo $num_a;?>">
   <input type="hidden" id="num_b" name="num_b" value="<?php echo $num_b;?>">
<?php /*<input type="hidden" id="nome" name="nome" value="<?php echo $nome;?>">*/?>
   <input type="hidden" id="dif" name="dif" value="<?php echo $dif;?>">    
     </form>
<?php if(isset($_POST['comp'])){ ?>
        <h2>Resultado ---> <?php echo  $aciertos;?> Aciertos </h2>
<?php } ?>
   <?php /*  </div> */ ?>
     <form action="index.php" method="post">
        <input type="submit" id="volver" name="volver" value="Volver ó inicio">
     </form>
     <?php include("../../layout/pe.php"); ?>
</body>
</html>
