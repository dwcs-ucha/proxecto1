<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 19:47:17
  from '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/resultados.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a83b54f5d47_89907748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc03e7f2f0b67f3e6738f899169349998719f8a8' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/resultados.tpl',
      1 => 1584038835,
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
function content_5e6a83b54f5d47_89907748 (Smarty_Internal_Template $_smarty_tpl) {
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

        <h2>Aciertos : <?php echo $_smarty_tpl->tpl_vars['aciertos']->value;?>
</h2>
        <h2>Puntuacion : <?php echo $_smarty_tpl->tpl_vars['puntuacion']->value;?>
</h2>
        <div class="xogo">
            <form action="resultados.php" method="post">
                <br><br><input type="submit" id="reintentar" name="reintentar" value="Reintentar">
                <br><br><input type="submit" id="nova" name="nova" value="Nova Partida">
                <?php if (($_smarty_tpl->tpl_vars['login']->value)) {?>
                 <br><br><input type="submit" id="gardar" name="gardar" value="Gardar Resultados">   
                <?php }?>
            </form>
        </div>
        <div class='xogo'>
            <form action="../index.php" method="post">
                <br><input type="submit" id="volver" name="volver" value="Volver ó inicio">
            </form>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/pe.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
</html><?php }
}
