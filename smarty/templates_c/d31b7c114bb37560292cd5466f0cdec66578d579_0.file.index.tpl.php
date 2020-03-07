<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-07 01:58:50
  from 'D:\xampp\proxecto\actividades\actividade3\Vista\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e62f1caaef8d3_11014889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd31b7c114bb37560292cd5466f0cdec66578d579' => 
    array (
      0 => 'D:\\xampp\\proxecto\\actividades\\actividade3\\Vista\\index.tpl',
      1 => 1583542527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e62f1caaef8d3_11014889 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <?php ob_start();
echo 'Vista/layout/head.tpl';
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <meta charset="utf-8">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <title>Que é? Para que serve? Para que se utiliza?</title>
    </head>
    <body>
    <wrapper class="d-flex flex-column">
        <?php ob_start();
echo 'Vista/layout/cabeceira.tpl';
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <main class="container-fluid corpo">
            <h1>Responde preguntas sobre obxetos</h1>
            <form id="facil" action="xogo.php" method="post">
                <div class="container-fluid corpo">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
                            <img class="img-thumbnail" src="icono.png" height="300" width="300"/>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                            <span>Responde correctamente ás preguntas sobre o obxeto da imaxe</span>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
                            <h4>Dificultade</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary btn-success">
                                    <input type="radio" name="dificultade" value="1" form="facil"/>Fácil
                                </label>
                                <label class="btn btn-secondary active btn-warning">
                                    <input type="radio" name="dificultade" value="2" form="facil"/>Normal
                                </label>
                                <label class="btn btn-secondary btn-danger">
                                    <input type="radio" name="dificultade" value="3" form="facil"/>Difícil
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                            <br/>
                            <button class="btn btn-lg btn-success" type="submit" form="facil">Xogar</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php ob_start();
echo 'Vista/layout/pe.tpl';
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </main>
    </wrapper>
</body>
</html>
<?php }
}
