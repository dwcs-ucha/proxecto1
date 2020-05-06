<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        <title>Consultar Puntuacion</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}
        {if isset($sesion_usuario)}
                <h2><a href="logoff.php">Cerrar Sesion</a></h2>
            {else}
                <h2><a href="login.php">Unirse</a></h2>
            {/if}
        <div class="container">
            <h1 class="titulo">Estadisticas:</h1>
            {if !empty($estadisticas)}
                {$estadisticas}
            {else}
            <h3>Non tes estadisticas gardadas</h3>
            {/if}
            <h2><a id="volver_menu" href="index.php">Volver al menu</a></h2>
        </div>

        {include file="../../Vista/layout/pe.tpl"}
    </body>
</html>