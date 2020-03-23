<html>
    <head>
        <meta charset="utf-8">
        <title>Categorias</title>
        <script type="text/javascript">
            function seleccionar(elemento) {
                if (elemento.style.backgroundColor != "green") {
                    elemento.setAttribute("style", "background-color: green");
                } else {
                    elemento.removeAttribute("style");
                }
            }
        </script>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <link href="../estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="container">
            <form action="../Controlador/categorias.php" method="post">
                <div class="text-center">
                    {foreach from = $categorias item = $categoria}
                    <div class="ficha" onmouseup="seleccionar(this)">
                        <label>
                            <input class="d-none" type="checkbox" name="nomesCategoriasSeleccionadas[]" value="{$categoria->getNome()}"/>
                            <img src="{$rutaRootHTML}{$categoria->getImaxeCategoria()}" />
                            <h2>{$categoria->getNome()}</h2>
                        </label>
                    </div>
                    {/foreach}
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-lg btn-success" type="submit" name="enviarCategorias" value="enviado">Seleccionar categorías</button>
                </div>
                {if isset($mensaxeErro)}
                    <div class="d-flex justify-content-center erro">
                        {$mensaxeErro}
                    </div>
                {/if}
            </form>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>

