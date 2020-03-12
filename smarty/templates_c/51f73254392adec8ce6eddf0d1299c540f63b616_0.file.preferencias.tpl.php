<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 19:06:09
  from '/var/www/html/proxecto/proxecto1/Vista/preferencias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a7a119e98d5_71082574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51f73254392adec8ce6eddf0d1299c540f63b616' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/Vista/preferencias.tpl',
      1 => 1583865966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a7a119e98d5_71082574 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title>
            Preferencias
        </title>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
        <?php ob_start();
echo 'Vista/layout/head.tpl';
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php ob_start();
echo 'Vista/layout/cabeceira.tpl';
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </head>
    <body>
        <form action="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;
echo 'Controlador/preferencias.php';?>
" method="post">
            Modo oscuro
            <label class="switch">
                <input type="checkbox" name="temaOscuro" value="seleccionado" <?php echo $_smarty_tpl->tpl_vars['temaOscuro']->value;?>
>
                <span class="slider round"></span>
            </label>
            <button type="submit" name="preferencias" value="seleccionadas">Gardar preferencias</button>
        </form>
    </body>
</html><?php }
}
