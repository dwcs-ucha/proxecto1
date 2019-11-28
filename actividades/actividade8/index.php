<html>
<?php
?>
<head> 
<title>Preguntas Estimulantes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div id="cabecera">
<h1>Preguntas Estimulantes</h1>
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
</div>
</body>
</html>