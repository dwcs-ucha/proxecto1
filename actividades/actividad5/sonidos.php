<!DOCTYPE html>
<html>
<head>
<title>Juego de los Sonidos</title>
<link rel="stylesheet" href="/proxecto1/actividades/actividad5/css/sonidos.css">
</head>
<body>
<?php
$animales=["perro", "vaca", "mono", "cerdo", "leon", "gallo", "burro", "cabra", "elefante", "pajaro", "gato", "caballo"];
$aleatorio=rand(0,11);
?>
<div id="sonidos">
<h3>Presta atención!!!</h3>
<audio controls src="/proxecto1/actividades/actividad5/mp3/<?php echo $animales[$aleatorio]; ?>.mp3" type="audio/mp3"></audio>
<br><br>
<?php
foreach($animales as $key=>$valor){

?>
<a href="sonidos.php?animal=<?php echo $key; ?>&random=<?php echo $aleatorio; ?>"><img id="son" src="/proxecto1/actividades/actividad5/imagenes/<?php echo $valor; ?>.png" alt="<?php echo $valor; ?>"></a>

<?php } ?>
 <br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET"){

	if(isset($_GET['animal']) && isset($_GET['random'])){
	$animal=$_GET['animal'];
	$random=$_GET['random'];

	if ($random == $animal ){

		echo "<span style='color:green;'><p>Enhorabuena, has acertado!!!</p></span>";

	}else{

		echo "<span style='color:red;'><p>Lo siento, has fallado. Inténtalo otra vez!!!</p></span>";

	}

}
}

?>
</div>
</body>
</html>
