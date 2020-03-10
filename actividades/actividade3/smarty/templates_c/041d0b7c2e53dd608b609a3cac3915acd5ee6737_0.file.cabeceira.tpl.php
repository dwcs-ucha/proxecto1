<?php
/* Smarty version 3.1.33, created on 2020-03-05 19:39:36
  from '/var/www/html/2aval/proxecto/proxecto1/Vista/layout/cabeceira.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e614768376803_83956620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '041d0b7c2e53dd608b609a3cac3915acd5ee6737' => 
    array (
      0 => '/var/www/html/2aval/proxecto/proxecto1/Vista/layout/cabeceira.tpl',
      1 => 1583430791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e614768376803_83956620 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar sticky-top container-fluid navbar-expand-sm bg-primary navbar-dark cabeceira">
    <a id="logo-xogoteca" class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/Vista/imaxes/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent,#navbarSupportedContent2,#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con palabras
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade1">Completar sílabas ou palabras</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade15">O xogo das pistas</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade8">Preguntas de estimulación</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade3">Que é? Para que serve? Como se utiliza?</a>
			<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade10">Sinónimos e antónimos</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con imaxes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade11/proxecto11_index.php">Emparellar</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividad9">Ordenar secuencias temporais</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade4">Ordenar obxetos por categoría</a>
            			<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade12">Estados de animo</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos varios
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade6">Caderno de sumas</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividade10">Sinónimos e antónimos</a>
            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['directorioRaiz']->value;?>
/actividades/actividad5">Son visual</a>
        </div>
    </div>
</nav>

<?php }
}
