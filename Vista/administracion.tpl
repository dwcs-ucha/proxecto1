<!DOCTYPE html>
<html>
<head>
	<title>Administración Xogoteca</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<wrapper class="d-flex flex-column">
	<main class="container corpo" align="center">
		<h2>Administración de usuarios</h2>
		<form action="../Controlador/administracion.php" method="post">
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align="center">
					<fieldset>
					<legend>Lista de usuarios</legend>
						<select name="listaUsuarios" onchange="this.form.submit()">
						{for $i = 0 to $numeroUsuarios}
							{if isset($listaUsuarios)}
								{if $listaUsuarios eq $usuarios[$i]->nome}
									<option value="{$usuarios[$i]->codigo}" selected>{$usuarios[$i]->nome}</option>
								{else}
									<option value="{$usuarios[$i]->codigo}">{$usuarios[$i]->nome}</option>
								{/if}
							{else}
								<option value="{$usuarios[$i]->codigo}">{$usuarios[$i]->nome}</option>
							{/if}
						{/for}
						</select>
						<input class="botonVer" type="submit" name="ver" value="Ver"></input>
					</fieldset>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" align="center">
					<fieldset>
						<legend>Formulario de usuarios</legend>
						<label for="nome">Nome</label>
						<input type="text" name="nome"><br>
						<label for="contrasinal">Contrasinal</label>
						<input type="password" name="contrasinal"><br>
						{if $usuarioSeleccionado->rol == 0}
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0" checked></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1"></br>
						{elseif $usuarioSeleccionado->rol == 1}
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0"></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1" checked></br>
						{else}
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0"></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1"></br>
						{/if}
					</fieldset>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			</div>
		</form>
	</main>
</wrapper>
</body>
</html>
