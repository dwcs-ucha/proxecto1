<html>
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 20/11/2019
		* @Version: 0.0.3b
		**/
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilos/estilosIndex.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<h1>Emparella</h1>
	<h2>Menú principal</h2>
	<form id="facil" action="proxecto11_xogo.php" method="post">
		<input type="submit" id="facil" name="facil" value="Nivel Fácil">
		<input type="hidden" name="numeroCartas" value="6">
	</form>
	<form id="medio" action="proxecto11_xogo.php" method="post">
		<input type="submit" id="medio" name="medio" value="Nivel Medio">
		<input type="hidden" name="numeroCartas" value="12">
	</form>
	<form id="dificil" action="proxecto11_xogo.php" method="post">
		<input type="submit" id="dificil" name="dificil" value="Nivel Difícil">
		<input type="hidden" name="numeroCartas" value="18">
	</form>
</body>
</html>