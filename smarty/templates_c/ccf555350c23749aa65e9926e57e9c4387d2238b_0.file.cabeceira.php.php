<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-06 01:56:01
  from 'D:\xampp\proxecto\Vista\layout\cabeceira.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e619fa1968605_40325088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccf555350c23749aa65e9926e57e9c4387d2238b' => 
    array (
      0 => 'D:\\xampp\\proxecto\\Vista\\layout\\cabeceira.php',
      1 => 1583454290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e619fa1968605_40325088 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
//03/12/2019 | Versión 1.2
//PROPOSTA DUNHA ESTRUTURA PARA A CABECEIRA DO SITIO CON BootStrap 4.
<?php echo '?>';?>

<nav class="navbar sticky-top container-fluid navbar-expand-sm bg-primary navbar-dark cabeceira">
    <a id="logo-xogoteca" class="navbar-brand" href="<?php echo '<?php ';?>
echo $directorioRaiz; <?php echo '?>';?>
/index.php"><img src="<?php echo '<?php ';?>
echo $directorioRaiz; <?php echo '?>';?>
/Vista/imaxes/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent,#navbarSupportedContent2,#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con palabras
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade1">Completar sílabas ou palabras</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade15">O xogo das pistas</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade8">Preguntas de estimulación</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade3">Que é? Para que serve? Como se utiliza?</a>
			<a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade10">Sinónimos e antónimos</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con imaxes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade11/proxecto11_index.php">Emparellar</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividad9">Ordenar secuencias temporais</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade4">Ordenar obxetos por categoría</a>
            			<a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade12">Estados de animo</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos varios
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade6">Caderno de sumas</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividade10">Sinónimos e antónimos</a>
            <a class="dropdown-item" href="<?php echo '<?php ';?>
echo $directorioRaiz;<?php echo '?>';?>
/actividades/actividad5">Son visual</a>
        </div>
    </div>
</nav>

<?php }
}
