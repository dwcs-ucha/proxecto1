<html>
<?php
?>
<head> 
<title>Preguntas Estimulantes</title>
<?php
	/*
	* Autor:LorenzoOS
	* FechaCreación: 12/11/2019
	* FechaModificación:28/11/2019
	* Version: 0.1
	*/
	
	require_once('../../layout/head.php');
?>
<link rel="stylesheet" href="estilos/estilosPreguntas.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
	require_once('../../layout/cabeceira.php');
?>
<div id="cabecera">
<h1>Preguntas Estimulantes</h1>
</div> 


<div id="dificultad">
<h3>Dificultade</h3>
</div>



<form action="Preguntas_Estimulantes_Facil.php" method="POST" >
<div id="JugarFacil">
<?php
	echo '<input id="btnJugarFacil" class="btn btn-primary" type="submit"  name="btnJugarFacil" value="Facil">';
	
?>
</form>
<br>
<br>
<form action="Preguntas_Estimulantes_Medio.php" method="POST" >
<div id="JugarMedio">
<?php
	echo '<input id="btnJugarMedio" class="btn btn-warning" type="submit"  name="btnJugarMedio" value="Medio">';
	
?>

</form>
<?php
	require_once('../../layout/pe.php');
?>
</div>
</body>
</html>