<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 18:57:31
  from '/var/www/html/proxecto/proxecto1/Vista/layout/avisoCookies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a780b29f9f5_13787446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1069b8ff85ef4ef4c46900efff79e0d2b8b73d6' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/Vista/layout/avisoCookies.tpl',
      1 => 1583865966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a780b29f9f5_13787446 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    function ocultarAvisoCookies() {
        var elemento = document.getElementById("avisoCookies");
        elemento.setAttribute("style", "display: none");
    }
<?php echo '</script'; ?>
>
<div id='avisoCookies' class="avisoCookies fixed-bottom">
    <p>En Xogoteca facemos uso de Cookies. Podes ver a nosa <a href="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;
echo 'Controlador/politicaCookies.php';?>
">política de cookies aquí.</a></p>
    <button onclick="ocultarAvisoCookies()">Entendido</button>
</div>
<?php }
}
