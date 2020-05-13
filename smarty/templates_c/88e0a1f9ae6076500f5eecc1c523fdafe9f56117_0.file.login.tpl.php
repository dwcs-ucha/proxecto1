<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-13 17:06:58
  from '/var/www/html/Proxecto/proxecto1/Vista/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebc0d12bb2c87_02005262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88e0a1f9ae6076500f5eecc1c523fdafe9f56117' => 
    array (
      0 => '/var/www/html/Proxecto/proxecto1/Vista/login.tpl',
      1 => 1589381826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc0d12bb2c87_02005262 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <?php ob_start();
echo 'Vista/layout/head.tpl';
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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
        <?php ob_start();
echo 'Vista/layout/cabeceira.tpl';
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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

                <button class="btn btn-secondary btn-success"  type="submit" id="iniciar" name="iniciar" value="<?php echo $_smarty_tpl->tpl_vars['paxinaRedirixir']->value;?>
">Conectarse/Rexistrarse</button>
                <button class="btn btn-secondary btn-warning"  type="submit" id="volver" name="volver" value="<?php echo $_smarty_tpl->tpl_vars['paxinaRedirixir']->value;?>
">Volver</button>
                <br><br>
                <span class="error">
                    <?php if (($_smarty_tpl->tpl_vars['error_inicio']->value)) {?>
                        Erro o iniciar a sesión, usuario ou contrasinal incorrectos.
                    <?php }?>
                </span>
        </div>

        <?php ob_start();
echo 'Vista/layout/pe.tpl';
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </body>
</html><?php }
}
