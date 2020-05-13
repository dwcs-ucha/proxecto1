<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-13 17:06:04
  from '/var/www/html/Proxecto/proxecto1/Vista/layout/cabeceira.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebc0cdca85eb5_99514690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2e6244f0329e9766c83f423110dcd9698c4a701' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/Vista/layout/cabeceira.tpl',
      1 => 1589381826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc0cdca85eb5_99514690 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="collapse navbar-collapse">
        <a class="enlaceMenu" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
/Controlador/preferencias.php">Preferencias</a>
    </div>
    <?php if (!isset($_smarty_tpl->tpl_vars['logeado']->value)) {?>
        <div class="collapse navbar-collapse">
            <a class="enlaceMenu" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
/Controlador/login.php">Conectarse/Rexistrarse</a>
        </div>
    <?php } else { ?>
        <div class="collapse navbar-collapse">
            <a class="enlaceMenu" href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;?>
/Controlador/logoff.php">Desconectarse</a>
        </div>
    <?php }?>
</nav>

<?php }
}
