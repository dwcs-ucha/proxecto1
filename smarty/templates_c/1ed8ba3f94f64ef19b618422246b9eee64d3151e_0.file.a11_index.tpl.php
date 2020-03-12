<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 19:04:52
  from '/var/www/html/proxecto/proxecto1/actividades/actividade11/Vista/a11_index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a79c44e14f8_62567148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ed8ba3f94f64ef19b618422246b9eee64d3151e' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/actividades/actividade11/Vista/a11_index.tpl',
      1 => 1584036290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a79c44e14f8_62567148 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="gl">
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../Estilo/estilosA11.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
/Vista/estilos/estilos.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<wrapper class="d-flex flex-column">
	<main class="container-fluid corpo">
		<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value)."Vista/layout/cabeceira.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
		<h1>EmpArellA imaxes</h1>
		<form id="numeroCartas" action="../Controlador/a11_xogo.php" method="post">
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
	</main>
	</wrapper>
	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value)."Vista/layout/pe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>
</html>
<?php }
}
