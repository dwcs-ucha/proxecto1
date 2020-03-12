<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 18:47:52
  from '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a75c89a0104_17265528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26c0406657fe748dd40ad73976dcb0ed15aeb8e2' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/index.tpl',
      1 => 1584035263,
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
function content_5e6a75c89a0104_17265528 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="gl">
    <head>
        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <style type="text/css">
            .col { border: solid black 1px; }
            h1 { text-align: center; }
            img { width: 80%; }
            .error { color: red;}
            .clasificacion { margin-left: 15%;
                             vertical-align: center;	}
            td,th { padding: 5px;
                    text-align: center;}
            </style>
            <?php echo '<script'; ?>
 type="text/javascript" src=""><?php echo '</script'; ?>
>    
            <title>Caderno de Sumas</title>
        </head>
        <body>
            <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/cabeceira.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <h1>Caderno de Sumas</h1>     
            <form action="index.php" method="post">
                <div class="container-fluid corpo">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
                        <img class="img-thumbnail" src="sumas.jpg">
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                        <span>
                            O xogo consiste en indicar o resultado das sumas que se mostran por pantalla.<br>
                            Consta de 3 dificultades:<br>
                            -Fácil: Sumas de un só díxito. Cada acierto vale 1 punto.<br>
                            -Medio: Sumas con dous díxitos. Cada acierto vale 2 puntos.<br>
                            -Difícil: Sumas de tres díxitos. Cada acierto vale 3 puntos.<br>
                        </span>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
                        <h2>Dificultade</h2>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary btn-success">
                                <input type="radio" name="dif" id="dif" value="baixa">Baixa
                            </label>
                            <label class="btn btn-secondary btn-warning">
                                <input type="radio" name="dif" id="dif" value="media">Media
                            </label>
                            <label class="btn btn-secondary btn-danger">
                                <input type="radio" name="dif" id="dif" value="dificil">Difícil
                            </label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                        <button class="btn btn-lg btn-success" type="submit" id="entrar" name="entrar" value="enviar">Xogar</button>
                        <br><span class="error"><?php if (($_smarty_tpl->tpl_vars['errordif']->value)) {?>Non hay escollida unha dificultade<?php }?></span>
                        <br><button class="btn btn-lg btn-success" type="submit" id="vercla" name="vercla" value="vercla">Ver Clasificación</button>
                    </div>
                </div>
            </div>
        </form>  
        <?php if (($_smarty_tpl->tpl_vars['mostrarclas']->value)) {?>
            <div class="clasificacion">
                <table>
                    <tr>
                        <th>Clasificación</th>
                        <th>Usuario</th>
                        <th>Contrasinal</th>
                        <th>Partidas Ganadas</th>
                        <th>Partidas Perdidas</th>
                        <th>Dificultade</th>
                        <th>Puntuación</th>
                    </tr> 
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estadisticas']->value, 'estatistica');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estatistica']->value) {
?>		
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['estatistica']->value->nome;?>
</td>  
                            <td><?php echo $_smarty_tpl->tpl_vars['estatistica']->value->data;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['estatistica']->value->dificultade;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['estatistica']->value->puntuacion;?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </div>
        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/pe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
</html><?php }
}
