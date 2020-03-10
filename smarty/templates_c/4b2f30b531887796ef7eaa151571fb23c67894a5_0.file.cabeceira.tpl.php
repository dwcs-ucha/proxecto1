<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-10 18:37:53
  from '/var/www/html/2aval/proxecto/proxecto1/Vista/layout/cabeceira.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e67d071d8b1e5_87547995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b2f30b531887796ef7eaa151571fb23c67894a5' => 
    array (
      0 => '/var/www/html/2aval/proxecto/proxecto1/Vista/layout/cabeceira.tpl',
      1 => 1583856569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e67d071d8b1e5_87547995 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar sticky-top container-fluid navbar-expand-lg bg-primary navbar-dark cabeceira">
    <a id="logo-xogoteca" class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
Vista/imaxes/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent,#navbarSupportedContent2,#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con palabras
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade1">Completar sílabas ou palabras</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade3">Que é? Para que serve? Como se utiliza?</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade10">Sinónimos e antónimos</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con imaxes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade11/proxecto11_index.php">Emparellar</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade4">Ordenar obxetos por categoría</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con números
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
actividades/actividade6">Caderno de sumas</a>
        </div>
    </div>
</nav>

<?php }
}
