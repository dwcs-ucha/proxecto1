<html>
    <head>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <link href="../estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="container">
            <div>
                <h1>Selecciona a categoria a que pertence o elemento</h1>
            </div>
            <div class="contenedor">
                <div id="puntuacion">
                    <h5>Puntuación: {$puntuacion}</h5>
                </div>
                <div>
                    <h3>Categorías</h3>
                </div>
                <form action="actividade.php" method="post">
                    <div class="categorias">
                        {foreach from = $categorias item = $categoria}
                            <label>
                                <div class="ficha"/>
                                <img src="{$rutaRootHTML}{$categoria->getImaxeCategoria()}"/>
                                <h3>{$categoria->getNome()}</h3>
                                <input class="d-none" type="submit" name="categoriaSeleccionada" value="{$categoria->getNome()}">
                                </div>
                            </label>
                        {/foreach}
                    </div>
                </form>
                <div class="elementos">
                    <img src="{$rutaRootHTML}{$imaxeClasificar}"/>
                    <h3>Elemento</h3>
                </div>
                {if isset($erro)}
                    <div>
                        Inténtao de novo
                    </div>
                {/if}
            </div>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>
