<?php

include 'funciones.php';

//comprobamos si la respuesta es correcta
if(isset($_POST['foto'])){
comprobarRespuesta($_POST['foto'],$_POST['termino'] );
}

if(isset($_POST['nivel'])){
$nivel=$_POST['nivel'];
}else{
$nivel=$_GET['nivel'];
}


?>

<link href="estilos.css" rel="stylesheet">

<div id="padre">
			<?php cargarFotos($nivel) ?>
</div>
