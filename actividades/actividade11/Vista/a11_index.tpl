<html lang="gl">
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 03/03/2020
		* @Version: 0.0.9b
		**/
	?>
	<meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../Estilo/estilosA11.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<wrapper class="d-flex flex-column">
	<main class="container corpo">
		{include file="../../Vista/layout/cabeceira.php"}
		<h1>EmpArellA imaxes</h1>
		<form id="numeroCartas" action="a11_xogo.tpl" method="post">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 miniatura">
					<img class="img-thumbnail" src="../Imaxes/emparella.gif">
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
					<span>Xogo que consiste en emparellar as cartas que están viradas boca abaixo</span>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
					<h4>Dificultade</h4>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary btn-success">
							<input type="radio" name="numeroCartas" value="6"/>Fácil
						</label>
						<label class="btn btn-secondary btn-warning">
							<input type="radio" name="numeroCartas" value="12"/>Normal
						</label>
						<label class="btn btn-secondary btn-danger">
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
	{include file="../../Vista/layout/pe.php"}
	</main>
	</wrapper>
</body>
</html>
