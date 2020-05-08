<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-08 21:44:20
  from '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb5b69420eb89_06824644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee085ea0b0f220f2b49b93ab8a156dc13f554aa' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/actividades/actividade6/Vista/login.tpl',
      1 => 1588967056,
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
function content_5eb5b69420eb89_06824644 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
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
            .sesion { margin-left: 80%; }
            .xogo {	margin-left: 40%;
                    vertical-align: center;	}
            .error { color: red;}	
        </style>
        <title>Login</title>        
    </head>
    <body>
        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/cabeceira.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="sesion">
            <?php if (isset($_smarty_tpl->tpl_vars['sesion_usuario']->value)) {?>
                <h4><a href="logoff.php">Cerrar Sesion</a></h4>
            <?php }?>
        </div>
        <h2>Login</h2>        
        <div class="xogo">
            <form action="login.php" method="post">
                <label for="nome">Nome : </label><br/>
                <input id="nome" type="text" name="nome" maxlength="10">
                <span class="error">
                    <?php if (($_smarty_tpl->tpl_vars['errornome']->value)) {?> 
                        O nome debe ter un mínimo de 4 caracteres e un máximo de 8.
                        Acéptanse caracteres alfabéticos e especiais.
                    <?php }?>
                </span>
                <br/><br/>

                <label for="contrasinal">Contrasinal : </label><br/>
                <input id="contrasinal" type="password" name="contrasinal" maxlength="8" minlength="4">
                <span class="error">
                    <?php if (($_smarty_tpl->tpl_vars['errorcontrasinal']->value)) {?>
                        O contrasinal ten que ten entre 4 e 8 caracteres.
                    <?php }?>
                </span>
                <br/><br/>

                <input class="btn btn-secondary btn-success"  type="submit" id="iniciar" name="iniciar" value="Iniciar">
                <input class="btn btn-secondary btn-warning"  type="submit" id="volver" name="volver" value="Volver ó menú">
                <br><br>
                <span class="error">
                    <?php if (($_smarty_tpl->tpl_vars['error_inicio']->value)) {?>
                        Erro o iniciar a sesión, usuario ou contrasinal incorrectos.
                    <?php }?>
                </span>
        </div>

        <?php $_smarty_tpl->_subTemplateRender("file:../../../Vista/layout/pe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
</html><?php }
}
