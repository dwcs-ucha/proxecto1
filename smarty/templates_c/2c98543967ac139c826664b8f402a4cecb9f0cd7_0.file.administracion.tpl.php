<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-05 20:04:00
  from '/var/www/html/proxecto/proxecto1/Vista/administracion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e614d20cc99e7_42815421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c98543967ac139c826664b8f402a4cecb9f0cd7' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/Vista/administracion.tpl',
      1 => 1583435032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e614d20cc99e7_42815421 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Administración Xogoteca</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
  	<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
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
						<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['numeroUsuarios']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['numeroUsuarios']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
							<?php if (isset($_smarty_tpl->tpl_vars['listaUsuarios']->value)) {?>
								<?php if ($_smarty_tpl->tpl_vars['listaUsuarios']->value == $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->nome) {?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->codigo;?>
" selected><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->nome;?>
</option>
								<?php } else { ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->codigo;?>
"><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->nome;?>
</option>
								<?php }?>
							<?php } else { ?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->codigo;?>
"><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['i']->value]->nome;?>
</option>
							<?php }?>
						<?php }
}
?>
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
						<?php if ($_smarty_tpl->tpl_vars['usuarioSeleccionado']->value->rol == 0) {?>
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0" checked></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1"></br>
						<?php } elseif ($_smarty_tpl->tpl_vars['usuarioSeleccionado']->value->rol == 1) {?>
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0"></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1" checked></br>
						<?php } else { ?>
							<label for="normal">Normal</label>
							<input type="radio" name="rol" id="male" value="0"></br>
							<label for="administrador">Administrador</label>
							<input type="radio" name="rol" id="administrador" value="1"></br>
						<?php }?>
					</fieldset>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			</div>
		</form>
	</main>
</wrapper>
</body>
</html>
<?php }
}
