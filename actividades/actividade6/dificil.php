<?php 
        /********************************/
	    /*      Luis Corral de Cal      */
	    /*      26 Novembro 2019	    */
    	/*	    Proxecto 1 Avaliacion   */
    	/*      Nivel Dificil           */
    	/*	    Version 1		        */
    	/********************************/
?>
<?php /*Funcion para gardar a puntuacion*/
/* Pasamoslle como parámetro o nome , a dificultade e a puntuacion da partida */
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
    //var_dump($rexistros);
    /*Abrimos o ficheiro en modo escritura e que sobreescriba o que hai*/
    $ficheiro = fopen('clasificacion.csv', "w+");
    for($i=0;$i<sizeof($rexistros);$i++){
      fputcsv($ficheiro,$rexistros[$i]);//Escribimos os rexistros no csv
  }
  fclose($ficheiro);//pechamos o ficheiro
 }
?>
<?php 
$num_a='';
$num_b='';
$nome='';
$dif='';
if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
    $dif = $_GET['difi'];
}
if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $dif = $_POST['dif'];
}
if(isset($_POST['comp']) || isset($_POST['gardar'])){
        $nume_a = explode(',',$_POST['num_a']);
        $nume_b = explode(',',$_POST['num_b']);
        $aciertos=0; 
        $resultados = array();
        for($i=1;$i<=10;$i++){
                $a = (int)$nume_a[$i-1];
                $b = (int)$nume_b[$i-1];
                $result = $_POST["res$i"];                
                if($result == ($a + $b)){
                    $aciertos++;
                    $resultados[$i] = true;                        
                }else{
                    $resultados[$i] = false;
                }
        }
        if(isset($_POST['gardar'])){
        //echo $aciertos;
            gardar($nome,$dif,$aciertos);
            
        
        }
 }
 
?>
<html>
<head></head>
<body>
<div class="xogador">
<h3>Xogador : <?php echo $nome ?> </h3>
<h4>Dificultade : Dificil </h4>
</div>
<div>
      <form action="dificil.php" method="post">
<?php /* creamos aleatoriamente as sumas */
        if(!isset($_POST['comp'])){
        $numeros_a = array();
        $numeros_b = array();        
        for($i=1;$i<=10;$i++){
          array_push($numeros_a,rand(1,999));
          array_push($numeros_b,rand(1,999));
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
   <input type="hidden" id="nome" name="nome" value="<?php echo $nome;?>">
   <input type="hidden" id="dif" name="dif" value="<?php echo $dif;?>">    
     </form>
<?php if(isset($_POST['comp'])){ ?>
        <h2>Resultado ---> <?php echo  $aciertos;?> Aciertos </h2>
<?php } ?>
     </div>
     <form action="index.php" method="post">
        <input type="submit" id="volver" name="volver" value="Volver ó inicio">
     </form>
</body>
</html>
