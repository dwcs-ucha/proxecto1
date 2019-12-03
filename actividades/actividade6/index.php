<?php 
        /********************************/
	    /*	Luis Corral de Cal          */
	    /*	28 Novembro 2019	        */
    	/*	Proxecto 1 Avaliacion	    */
    	/*  Páxina de acceso            */
    	/*	Version 1		            */
	    /********************************/
?>
<?php
$directorioRaiz ="../..";
$errornome="O nome está baleiro";
$errordif="Non hai escollida unha dificultade";
$nome="-";
$dif="-";
/* Cando pulsamos entrar garda o nome e o nivel de dificultade se estan ben, 
   se non ó estan, declara as variables vacias para mostrar o erro no formulario
   en cada caso */
if(isset($_POST['entrar'])){
  /*  if($_POST['usuario'] !== ''){                
       $nome=$_POST['usuario'];
    }else{
       $nome='';
    }
    */if(isset($_POST['dif'])){
       $dif = $_POST['dif'];                
    }else{
       $dif='';
    }   
/* Se todo esta correcto collemos os valores e rediriximos á paxina da actividae 
   Enviamos os valores de nome e dificultade porlo Get na ruta á páxina seguinte
   para asi poder telos e logo gardar os datos no rexistro de resultados */
     if(/*$_POST['usuario'] !== '' &&*/ isset($_POST['dif'])){
      // $nome = $_POST['usuario'];
       $dif = $_POST['dif'];
      //header("location:sumas.php?nome=$nome&difi=$dif");
        header("location:sumas.php?difi=$dif");
    }
}
?>
<!doctype html>
<html lang="gl">
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
<?php /*
    <style>
        #erro { color: red;}
    </style> 
*/ ?>
    <link rel="stylesheet" href="../estilos/estilos.css">
	    <style type="text/css">
			.col { border: solid black 1px; }
			h1 { text-align: center; }
			img { width: 80%; }
		</style>
	<script type="text/javascript" src=""></script>    
	<title>Caderno de Sumas</title>
</head>
<body>
<?php include("../../layout/cabeceira.php"); /* Incluimos a cabeceira */?>
<?php //Formulario de Acceso, Selección do nivel e do Nome de Usuario ?>
     <h1>Caderno de Sumas</h1>     
        <form action="index.php" method="post">
        <div class="container-fluid corpo">
        <div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
					<img class="img-thumbnail" src="../../imaxes/proba.png">
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
				<span>
				  O xogo consiste en indicar o resultado das sumas que se mostran por pantalla.<br>
					Consta de 3 dificultades:<br>
					  -Fácil: Sumas de un só díxito.<br>
					  -Medio: Sumas con dous díxitos.<br>
					  -Difícil: Sumas de tres díxitos.<br>
					</span>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
			</div>
			<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
				<h2>Dificultade</h2>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active btn-success">
							<input type="radio" name="dif" id="dif" value="facil">Fácil
				    </label>
				   	<label class="btn btn-secondary active btn-warning">
							<input type="radio" name="dif" id="dif" value="medio">Medio
					</label>
						<label class="btn btn-secondary active btn-danger">
						   <input type="radio" name="dif" id="dif" value="dificil">Difícil
						</label>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
					 <button class="btn btn-lg btn-success" type="submit" id="entrar" name="entrar" value="enviar">Xogar</button>
				</div>
			</div>
		</div>
	</form>
   
<?php /*   
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
	  <input type="submit" id="vercla" name="vercla" value="Ver Clasificacion">
        </form>
     </div> 
*/ ?>
     <?php if(isset($_POST['vercla'])){ ?>
	<div>
	 <table>
	     <tr>
	       <th>Ranking</th>
	       <th>Nome</th>
	       <th>Dificultade</th>
	       <th>Puntuacion</th>
	     </tr> 
<?php $ficheiro = fopen('clasificacion.csv', "r+");  //Cargamos o fichero
      while($celdas = fgetcsv($ficheiro,',')){ 
/* asignamos os valores de cada rexistro do ficheiro ó array celdas hasta que
	o ficheiro remate */?>
	     <tr>
	        <td><?php echo $celdas[0];?></td>  
	        <td><?php echo $celdas[1];?></td>
	        <td><?php echo $celdas[2];?></td>
	        <td><?php echo $celdas[3];?></td>
         </tr>
<?php /*engadimos as columnas cos valores do array*/
    }  fclose($ficheiro); //pechamos o ficheiro	?>
	</table>
	</div>
	<?php } ?>
	<?php include("../../layout/pe.php"); ?>  
</body>
</html>
