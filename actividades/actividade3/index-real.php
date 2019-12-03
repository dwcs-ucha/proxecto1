<!doctype html>
<html lang="gl">
	<head>
		<?php
			$directorioRaiz ="../..";
			include '../../layout/head.php';
		?>
		<link rel="stylesheet" href="../estilos/estilos.css">
		<style type="text/css">
			
			.col { border: solid black 1px; }
			h1 { text-align: center; }
			img { width: 80%; }
		</style>
		<script type="text/javascript" src=""></script>
		<title>
			Proposta index para as actividades
		</title>
	</head>
	<body>
		<div class="container">
			<?php
				include '../../layout/cabeceira.php';
			?>
			<div class="row align-items" >
				<div class="col-md-12">
					<h1>Emparella imaxes</h1>
				</div>
				<div class="col-md-12">
					<p>
						Esta actividade consiste en emparellar as cartas de froitas que están viradas boca abaixo, tratando de adiviñar
						onde se atopan ocultas as parellas.
						<br />
						Se queres traballar a túa memoria, sen dúbida esta é a túa actividade, así que non te cortes, proba sorte!
					</p>
				</div>
			</div>
			<div class="row">

					<div class="col-md-6">
	            		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	            			<fieldset>
	            				<legend>Elixe a dificultade</legend>
				                <div class="form-group">
				                    <input type="radio" name="nivel" value="nivel1" id="Nivel1" checked />
				                    <label for="Nivel1">Nivel 1 (baixa), a partir de 2 anos de idade:</label>
				                    <br />

				                    <input type="radio" name="nivel" value="nivel2" id="Nivel2" />
				                    <label for="Nivel2">Nivel 2 (media), a partir de 3 anos de idade:</label>
				                    <br />

				                    <input type="radio" name="nivel" value="nivel3" id="Nivel3" />
				                    <label for="Nivel3">Nivel 3 (alta), a partir de 4 anos de idade:</label>
				                    <br />
				                </div>
			            	</fieldset>

			            	<fieldset>
			            		<legend>Elixe o tema gráfico</legend>
				                <div class="form-group">
				                    <input type="radio" name="tema" value="claro" id="Claro" checked />
				                    <label for="Claro">Claro:</label>
				                    <br />

				                    <input type="radio" name="tema" value="escuro" id="Escuro" />
				                    <label for="Escuro">Escuro:</label>
				                    <br />
				                </div>
			            	</fieldset>

			                <input type="submit" name="xogar" id="Xogar" value="Xogar!" class="btn btn-primary" />
			                <br />

	            		</form>
            		</div>
            		<div class="col-md-6">
            			<img src="../imaxes/proba.png" alt="Imaxe da actividade" />
            		</div>

				<div class="col-md-6">
				</div>
			</div>
			<?php
				include '../../layout/pe.php';
			?>
		</div>
	</body>
</html> 