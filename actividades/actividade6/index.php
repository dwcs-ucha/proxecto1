<?php 
        /********************************/
	/*	Luis Corral de Cal      */
	/*	21 Novembro 2019	*/
    	/*	Proxecto 1 Avaliacion	*/
    	/*      Páxina de acceso        */
    	/*	Version 1		*/
	/********************************/

?>
<?php
// include("../layout/cabeceira.php");   
$errornome="O nome está baleiro";
$errordif="Non hai escollida unha dificultade";
$nome="-";
$dif="-";
/* Cando pulsamos entrar garda o nome e o nivel de dificultade se estan ben, 
   se non ó estan, declara as variables vacias para mostrar o erro no formulario
   en cada caso
 */
if(isset($_POST['entrar'])){
    if($_POST['usuario'] !== ''){                
       $nome=$_POST['usuario'];
    }else{
       $nome='';
    }
    if(isset($_POST['dif'])){
       $dif = $_POST['dif'];                
    }else{
       $dif='';
    }   
/* Se todo esta correcto collemos os valores e rediriximos á paxina adecuada en 
   cada caso. Enviamos os valores de nome e dificultade porlo Get na ruta á
   páxina seguinte para asi poder telos e logo gardar os datos no rexistro de 
   resultados */
     if($_POST['usuario'] !== '' && isset($_POST['dif'])){
       $nome=$_POST['usuario'];
       $dif = $_POST['dif'];
       switch($dif){
        case 'facil':
                header("location:facil.php?nome=$nome&difi=$dif");
                break;
        case 'medio':
                header("location:medio.php?nome=$nome&difi=$dif");
                break;
        case 'dificil':
                header("location:facil.php?nome=$nome&difi=$dif");
                break;       
       }
    }
}
?>
<html>
<head>
        <style>
                #erro { color: red;}
        </style>
</head>
<body>
<?php //Formulario de Acceso, Selección do nivel e do Nome de Usuario ?>
     <div>
        <form action="index.php" method="post">
          <label>Nome de Usuario : </label>          
                <input type="text" id="usuario" name="usuario">
          <br><div id='erro'><?php if($nome=='' && isset($_POST)){echo $errornome;}?></div>
          <label>Dificultade : </label>
          <br>
             Facil ->  <input type="radio" name="dif" id="dif" value="facil">
          <br>
             Medio ->  <input type="radio" name="dif" id="dif" value="medio">
          <br>
             Dificil ->  <input type="radio" name="dif" id="dif" value="dificil">
          <br><div id='erro'><?php if($dif=='' && isset($_POST)){echo $errordif;}?></div><br>
          <input type="submit" id="entrar" name="entrar" value="Empezar o Xogo">
        </form>
     </div>
</body>
</html>
