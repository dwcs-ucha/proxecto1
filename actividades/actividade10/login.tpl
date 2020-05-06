<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}
        {if isset($sesion_usuario)}
            <h2><a href="logoff.php">Cerrar Sesion</a></h2>
        {/if}
        <h1>LOGIN</h1>
        
        <div class="container">
            <form action="login.php" method="post"><!-- Inicio del formulario -->

            <label for="nombre">Nombre:</label><br/>
            <input id="nombre" type="text" name="nombre" maxlength="10">
            {if isset($error_nombre)}{* Si esta variable tiene algún valor, se muestra su contenido *}
                {$error_nombre}
            {/if}
            <br/><br/>

            <label for="contrasena">Contraseña:</label><br/>
            <input id="contrasena" type="password" name="contrasena" maxlength="30">
            {if isset($error_contrasena)}{* Si esta variable tiene algún valor, se muestra su contenido *}
                {$error_contrasena}
            {/if}
            <br/><br/>

            <input id="unirse" type="submit" name="unirse" value="Unirse">
            <input id="volver" type="submit" name="volver" value="Volver al menú">
            {if isset($error_usuario)}{* Si esta variable tiene algún valor, se muestra su contenido *}
                {$error_usuario}
            {/if}
        </div>

        {include file="../../Vista/layout/pe.tpl"}
    </body>
</html>