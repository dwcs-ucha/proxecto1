
<link href="estilos.css" rel="stylesheet">

<?php 
//Si existe el nivel miramos cual es y cargamos sus correspondientes imagenes

if(isset($_POST['nivel'])){
	
	//Hacemos una validación de si el nombre es alfabetico
	$nombre = ctype_alpha($_POST['nombre']);
	
	if(strlen($_POST['nombre'])==0)
	$nombre=false;

	$name =$_POST['nombre'];

	//Miramos de que nivel se trata
	switch ($_POST['nivel']) {
    case 'bajo':
		if($nombre==true)
		header("Location:partida.php?nivel=bajo&nombre=$name");
        else
        $error=true;
        break;
    case 'medio':
        header("Location:partida.php?nivel=medio&nombre=$name");
        break;
    case 'alto':
        header("Location:partida.php?nivel=alto&nombre=$name");
        break;
	}
}

	
?>


<div id="padre">

	<div id="dificultad">
		
	<form method="post" action="index.php">
		<?php if(isset($error)) echo "<p style='color:red'>Os campos non cumpren o criterio</p>"; ?><br>
		<label>Nome:</label><br>
		<input type="text" name="nombre"><br> 
	
		<h5>Por favor, selecciona o nivel:</h5>
		<input type="radio" name="nivel" value="bajo">baixo<br>
		<input type="radio" name="nivel" value="medio">medio<br>
		<input type="radio" name="nivel" value="alto">alto<br><br>
	
		<input type="submit" value="Comezar" name="empezar">
	
	</form>
	
	</div>
	
	

</div>
