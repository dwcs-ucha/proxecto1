<html>
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 02/12/2019
		* @Version: 0.0.9b
		**/
		$directorioRaiz = '../..';
		include '../../layout/head.php';
	?>
	<meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/estilosXogo.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<wrapper class="d-flex flex-column">
	<main class="container corpo">
		<?php
			include '../../layout/cabeceira.php';
		?>
		<h1>EmpArellA imaxes</h1>
		<form id="numeroCartas" action="proxecto11_xogo.php" method="post">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 miniatura">
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
							<input type="radio" name="numeroCartas" value="6"/>Fácil
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
		</form>
	<?php
		include '../../layout/pe.php';
	?>
	</main>
	</wrapper>
</body>
</html>