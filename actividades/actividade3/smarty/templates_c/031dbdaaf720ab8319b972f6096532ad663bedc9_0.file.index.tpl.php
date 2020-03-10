<?php
/* Smarty version 3.1.33, created on 2020-03-05 19:39:36
  from '/var/www/html/2aval/proxecto/proxecto1/actividades/actividade3/Vista/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e61476836ea96_42140453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '031dbdaaf720ab8319b972f6096532ad663bedc9' => 
    array (
      0 => '/var/www/html/2aval/proxecto/proxecto1/actividades/actividade3/Vista/index.tpl',
      1 => 1583432533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../../Vista/layout/head.tpl' => 1,
    'file:../../../Vista/layout/cabeceira.tpl' => 1,
    'file:../../../Vista/layout/pe.tpl' => 1,
  ),
),false)) {
function content_5e61476836ea96_42140453 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
                <?php $_smarty_tpl->_assignInScope('directorioRaiz', "../..");?>
        <?php $_smarty_tpl->_subTemplateRender('file:../../../Vista/layout/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <meta charset="utf-8">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <title>Que é? Para que serve? Para que se utiliza?</title>
    </head>
    <body>
    <wrapper class="d-flex flex-column">
        <?php $_smarty_tpl->_subTemplateRender('file:../../../Vista/layout/cabeceira.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
            <?php $_smarty_tpl->_subTemplateRender('file:../../../Vista/layout/pe.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </main>
    </wrapper>
</body>
</html>
<?php }
}
