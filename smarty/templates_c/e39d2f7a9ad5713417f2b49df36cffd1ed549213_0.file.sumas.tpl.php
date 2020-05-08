<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-08 21:42:06
  from '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/sumas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb5b60e4d79f3_55002802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e39d2f7a9ad5713417f2b49df36cffd1ed549213' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/sumas.tpl',
      1 => 1588966915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../../Vista/layout/head.tpl' => 1,
    'file:../../../Vista/layout/cabeceira.tpl' => 1,
    'file:../../../Vista/layout/pe.php' => 1,
  ),
),false)) {
function content_5eb5b60e4d79f3_55002802 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="gl">
    <head>
        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <style>
	.xogo {	margin-left: 40%;
		vertical-align: center;	}
	.error { color: red;}	
	</style>
	<title>Caderno de Sumas</title> 
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/cabeceira.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h2>Dificultade : <?php echo $_smarty_tpl->tpl_vars['dif']->value;?>
</h2>
	<div class="xogo">	
      <form action="sumas.php" method="post">   
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partida']->value, 'suma');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['suma']->value) {
?>
        <label><?php echo $_smarty_tpl->tpl_vars['suma']->value->numa;?>
</label> + <label><?php echo $_smarty_tpl->tpl_vars['suma']->value->numb;?>
</label>
        = <input type="text" id="res" name="res[]" size="4">            
        <br>
       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
       <span class="error"><?php if (($_smarty_tpl->tpl_vars['errorcampos']->value)) {?>Erro na introdución dos resultados, 
           teñen que ser numeros e estar todos cubertos<?php }?>
       </span><br>
       <br><input class="btn btn-secondary btn-success" type="submit" id="finalizar" name="finalizar" value="Finalizar">         
     </form>
</div>
   <div class='xogo'>
     <form action="../index.php" method="post">
         <br><input class="btn btn-secondary btn-warning" type="submit" id="volver" name="volver" value="Volver ó inicio">
     </form>
</div>
     <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/pe.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
