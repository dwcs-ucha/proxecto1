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
            <h2>SELECCIONA A CATEGORÍA Á QUE PERTENCE O ELEMENTO</h2>
            <div class="contenedor">
                <div id="puntuacion">
                    <a name="categorias"/>
                    <h5>Puntuación: {$puntuacion}</h5>
                </div>
                <div>
                    <h3>Categorías</h3>
                </div>
                <form action="actividade.php#categorias" method="post">
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
                {if isset($respostaEquivocada)}
                    <div class="d-flex justify-content-center erro">
                        Inténtao de novo
                    </div>
                {/if}
                {if isset($mensaxeErro)}
                    <div class="d-flex justify-content-center erro">
                        {$mensaxeErro}
                    </div>
                {/if}
            </div>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>
