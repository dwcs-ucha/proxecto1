<html>
    <head>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <link href="../estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="container text-center">
            <h1>Puntuacion: {$puntuacion}</h1>
            {if isset($usuarioLogeado)}
                <form action="estatisticas.php" method="post">
                    <button type="submit" name="gardarPuntuacion" value="true">Gardar puntuación</button>
                </form>
            {else}
                Conéctate ou <a href="{$rutaRootHTML}/Controlador/rexistro.php">rexístrate</a> para gardar a puntuación
            {/if}
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>

