<html>
	<head>
		<title>Título</title>
	</head>
	<body>
		<form method = "post" action = "prueba.php">
		<?php
			$rutaImagenes = "Imagenes/";
			$categoria = "Animales/";
			for ($i = 1; $i <= 5; $i++){
				//$aleatorio = rand(1, 10);
				$malos[] = $rutaImagenes.$categoria."Mal/$i.JPG";
			}
			for ($i = 1; $i <= 15; $i++){
			//	$aleatorio = rand(1, 10);
				$buenos[] = $rutaImagenes.$categoria."Bien/$i.JPG";
			}
			foreach ($buenos as $bien) {
		?>	
				<button type = "button" name = "contador" value = "correcto"><img src="<?php echo $bien; ?>"/></button>
				<input type = "hidden" name = "aciertos" value= "" />
			<?php } ?>
		 	<input type = "submit" value = "Enviar"/>
		</form>
	</body>
</html>
