<!DOCTYPE html>
<html>
<head>
	<?php
		/**
		* @Autor: Santiago Calvo Piñeiro
		**/
		include '../../layout/head.php';
                $directorioRaiz ="../..";
                escribirHead();
	?>
	<meta charset="utf-8">
	<title>Agrupar elementos</title>
</head>
<body>
	<?php
		include '../../layout/cabeceira.php';
                escribirCabeceira();
	?>
	<h1>Xogo de agrupar elementos por categorías</h1>
        <form id="facil" action="actividade.php" method="post">
		<div class="container-fluid corpo">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
					<img src="icono.png" height="300" width="300"/>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
					<span>Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categoría de vocabulario dada.</span>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
					<h4>Dificultade</h4>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active btn-success">
							<input type="radio" name="dificultade" value="facil"/>Fácil
						</label>
						<label class="btn btn-secondary active btn-warning">
							<input type="radio" name="dificultade" value="normal"/>Normal
						</label>
						<label class="btn btn-secondary active btn-danger">
							<input type="radio" name="dificultade" value="dificil"/>Difícil
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                                         <br/>
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