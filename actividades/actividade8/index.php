<html>
<?php
?>
<head> 
<title>Preguntas Estimulantes</title>
</head>
<body>

<div id="cabecera">
<h1>Preguntas Estimulantes</h1>
</div> 

<form action="Preguntas_Estimulantes_Facil.php" method="POST" >
<div id="JugarFacil">
<?php
	echo '<input id="btnJugarFacil" type="submit"  name="btnJugarFacil" value="Facil">';
	
?>
</form>
<br>
<br>
<form action="Preguntas_Estimulantes_Medio.php" method="POST" >
<div id="JugarMedio">
<?php
	echo '<input id="btnJugarMedio" type="submit"  name="btnJugarMedio" value="Medio">';
	
?>

</form>
</div>
</body>
</html>