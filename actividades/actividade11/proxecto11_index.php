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
	<form id="facil" action="proxecto11_xogo.php" method="post">
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
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
					<h4>Dificultade</h4>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active btn-success">
							<input type="radio" name="numeroCartas" value="6" checked/>Fácil
						</label>
						<label class="btn btn-secondary active btn-warning">
							<input type="radio" name="numeroCartas" value="12"/>Normal
						</label>
						<label class="btn btn-secondary active btn-danger">
						<input type="radio" name="numeroCartas" value="18"/>Difícil
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
					 <button class="btn btn-lg btn-success" type="submit" name="enviar" value="enviar">Xogar</button>
				</div>
			</div>
		</div>
	</form>
	<?php
		include '../../layout/pe.php';
	?>
</body>
</html>