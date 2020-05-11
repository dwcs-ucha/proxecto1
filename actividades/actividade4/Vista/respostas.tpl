<html>
    <head>
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function temporizador() {
                var t = 60;
                setInterval(function () {
                    document.getElementById("segundosRestantes").innerHTML = "Tes " + t-- + " segundos";
                    if (t == 0) {
                        document.formulario.submit();
                    }
                }, 1000, "JavaScript");
            }
            window.onload = temporizador();
        </script>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <link href="../estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .btn-lg {
                padding: 10 70;
            }
            .respostas img {
                width: 70px;
                height: 70px;
            }
            .ficha:hover{
                background-color: slateblue;
                cursor: default;
            }
        </style>
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="text-center">
            <h1>Memoriza os elementos de cada categoría</h1>
            <h2 id="segundosRestantes"></h2>
            {foreach from = $categorias item = $categoria}
            <a name="{$categoria->getNome()}"/>
            <div class="d-inline-block border border-dark p-1 m-1 respostas">
                <div class="ficha">
                    <img src="{$rutaRootHTML}{$categoria->getImaxeCategoria()}" />
                    <h4 class="text-center">{$categoria->getNome()}</h4>
                </div>
                <div class="m-1">
                    {foreach from = $categoria->getImaxesXogo() item = $imaxe}
                    <div class="d-inline-block border border-dark">
                        <img src="{$rutaRootHTML}{$imaxe}" />
                    </div>
                    {/foreach}
                </div>
            </div>
            {/foreach}
            <form action="respostas.php" method="post" name="formulario">
                <div>
                    <input type="hidden" name="xogar" value="true"/>
                    <button class="btn btn-lg btn-success" type="submit" name="xogar">Xogar xa</button>
                </div>
            </form>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>
