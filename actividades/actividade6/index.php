<?php 
        /********************************/
	/*	Luis Corral de Cal      */
	/*	3 Febreiro 2020	        */
    	/*	Proxecto 1 Avaliacion	*/
    	/*  	Páxina de acceso        */
    	/*	Version 1		*/
	/********************************/
?>
<?php
$directorioRaiz ="../..";
include("$directorioRaiz/librerias/utils.php");
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
?>
<!doctype html>
<html lang="gl">
<head>
<?php 
    /**
		* @Autor: Luis Corral
		* @GitHub: luiscorraldc
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 3/02/2020
		* @Version: 1.1
    **/
include("../../layout/head.php"); /* Incluimos os enlaces dos estilos */?> 
    <link rel="stylesheet" href="../estilos/estilos.css">
	    <style type="text/css">
			.col { border: solid black 1px; }
			h1 { text-align: center; }
			img { width: 80%; }
			.error { color: red;}
			.clasificacion { margin-left: 15%;
				vertical-align: center;	}
			td,th {padding: 5px;
			       text-align: center;}
		</style>
	<script type="text/javascript" src=""></script>    
	<title>Caderno de Sumas</title>
</head>
<body>
<?php include("../../layout/cabeceira.php"); /* Incluimos a cabeceira */?>
<?php //Formulario de Acceso, Selección do nivel ?>
     <h1>Caderno de Sumas</h1>     
        <form action="index.php" method="post">
        <div class="container-fluid corpo">
        <div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
					<img class="img-thumbnail" src="sumas.jpg">
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
                    <label class="btn btn-secondary btn-success">
			<input type="radio" name="dif" id="dif" value="facil">Fácil
		    </label>
		    <label class="btn btn-secondary btn-warning">
			<input type="radio" name="dif" id="dif" value="medio">Medio
		    </label>
		    <label class="btn btn-secondary btn-danger">
			<input type="radio" name="dif" id="dif" value="dificil">Difícil
		    </label>
		</div>
	    </div>
	</div><br>
	<div class="row">
	   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
	   <button class="btn btn-lg btn-success" type="submit" id="entrar" name="entrar" value="enviar">Xogar</button>
	   <br><span class="error"><?php if($errordif){ ?> Non hay escollida unha dificultade <?php } ?></span>
	   <br><button class="btn btn-lg btn-success" type="submit" id="vercla" name="vercla" value="vercla">Ver Clasificación</button>
	</div>
	</div>
	</div>
	</form>  
     <?php if($mostrarclas){ ?>
	<div class="clasificacion">
	 <table>
	     <tr>
	       <th>Clasificación</th>
	       <th>Usuario</th>
	       <th>Contrasinal</th>
	       <th>Partidas Ganadas</th>
	       <th>Partidas Perdidas</th>
	       <th>Dificultade</th>
	       <th>Puntuacion</th>
	     </tr> 
<?php $resultados = lerCSV('clasificacion.csv','r+',',');
//	$ficheiro = fopen('clasificacion.csv', "r+");  //Cargamos o fichero
//      while($celdas = fgetcsv($ficheiro,',')){ 
/* asignamos os valores de cada rexistro do ficheiro ó array celdas hasta que
	o ficheiro remate */
	for($i=0;$i<sizeof($resultados);$i++){		
	?>
	     <tr>
	        <td><?php echo $resultados[$i][0];?></td>  
	        <td><?php echo $resultados[$i][1];?></td>
	        <td><?php echo $resultados[$i][2];?></td>
	        <td><?php echo $resultados[$i][3];?></td>
	        <td><?php echo $resultados[$i][4];?></td>
	        <td><?php echo $resultados[$i][5];?></td>
	        <td><?php echo $resultados[$i][6];?></td>
         </tr>
<?php /*engadimos as columnas cos valores do array*/
    }  //fclose($ficheiro); //pechamos o ficheiro	?>
	</table>
	</div>
	<?php } ?>
	<?php include("../../layout/pe.php"); ?>  
</body>
</html>
