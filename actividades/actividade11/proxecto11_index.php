<html>
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 28/11/2019
		* @Version: 0.0.8b
		**/
		
		include '../../layout/head.php';
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles/estilosXogo.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<?php
		include '../../layout/cabeceira.php';
	?>
	<h1>Emparella imaxes</h1>
	<div class="container-fluid corpo">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
				<img class="img-thumbnail" src="imaxes/emparella.gif">
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
				<span>Xogo que consiste en emparellar as cartas de froitas que están viradas boca abaixo</span>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
		</div>
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
	</div>
	<?php
		include '../../layout/pe.php';
	?>
</body>
</html>