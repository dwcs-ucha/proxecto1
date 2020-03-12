<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 19:01:30
  from '/var/www/html/proxecto/proxecto1/Vista/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a78fa43d4b5_87695038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '007ccd0455f0491a90d4876ff43310be9e92af98' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/Vista/index.tpl',
      1 => 1583865966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a78fa43d4b5_87695038 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="gl">
    <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php ob_start();
echo 'Vista/layout/head.tpl';
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php echo '<script'; ?>
 type="text/javascript" src=""><?php echo '</script'; ?>
>
        <style type="text/css">

            h2 { text-align: center;
                 margin-top: 10px; }

            .container p { margin: 5px 1px; }

            .imaxe { display: block;
                     width: 30%;
                     margin: auto; }

        </style>
        <title>
            Xogoteca | Inicio
        </title>
    </head>

    <body>
    <wrapper class="d-flex flex-column">
        <?php ob_start();
echo 'Vista/layout/cabeceira.tpl';
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <main class="container">
            <h2>XogotecA</h2>
            <p>
                Benvid@s ao sitio web de xogos e actividades para nenos e nenas con trastornos do espectro autista (TEA) e outros
                problemas psicosociais.
                <br /><br />
                Este sitio foi desenvolvido polos alumn@s do módulo de <strong>'Desenvolvemento web en contorno servidor'</strong> 
                pertencente ao segundo curso do FP Superior en 'Desenvolvemento de Aplicacións Web', no CIFP Rodolfo Ucha Piñeiro,
                como parte da materia do propio módulo.
                <br /><br />
                Tódolos alumnos do módulo esperamos que disfrutedes moito coas nosas actividades, así que non esperedes máis e 
                comezade xa cos xogos!
            </p>

            <br />
            <img src="<?php echo $_smarty_tpl->tpl_vars['rutaRootHTML']->value;
echo 'Vista/imaxes/nenos.jpg';?>
" alt="Globo con cara feliz" class="imaxe" />
        </main>
    </wrapper>
    <?php ob_start();
echo 'Vista/layout/pe.tpl';
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>
</html><?php }
}
