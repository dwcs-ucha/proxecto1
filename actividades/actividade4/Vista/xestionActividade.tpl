<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agrupar elementos</title>
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .ficha:hover{
                background-color: slateblue;
                cursor: default;
            }
            .dificultade {
                border-style: none;
            }
        </style>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="container">
            
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>

