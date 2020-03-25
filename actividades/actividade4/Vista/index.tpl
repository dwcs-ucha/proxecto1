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
            <h1>Xogo de agrupar elementos por categorías</h1>
            <div class="container-fluid corpo">
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 imaxe">
                        <img src="icono.png" height="300" width="300"/>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                        <span>Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categoría de
                            vocabulario dada. Primeiro se mostran as categorías e os elementos que pertencen a ela e
                            despois reforzaría o aprendido clasificando eses mesmos elementos. 
                            <a href = "Manual de usuario.pdf" >Descargar manual de usuario</a>
                        </span>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " align="center">
                        <form action="index.php" method="post">
                            <h4>Dificultade</h4>
                            <div class="btn-group dificultade">
                                <label class="btn btn-secondary {if $dificultade == "facil"}active{/if}  btn-success">
                                    <button class="d-none"  type="submit" name="dificultade" value="facil"></button>Fácil
                                </label>
                                <label class="btn btn-secondary {if $dificultade == "normal"}active{/if}  btn-warning">
                                    <button class="d-none" type="submit" name="dificultade" value="normal"></button>Normal
                                </label>
                                <label class="btn btn-secondary {if $dificultade == "dificil"}active{/if} btn-danger">
                                    <button class="d-none"  type="submit" name="dificultade" value="dificil"></button>Difícil
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-right">
                    <div class = "text-center">
                        <h4>Categorías </h4>
                        <div class="d-inline-block">
                            {foreach from = $categoriasPartida item = $categoria}
                                <div class="d-inline-block ficha">
                                    <img src="{$rutaRootHTML}{$categoria->getImaxeCategoria()}" />
                                    <h6>{$categoria->getNome()}</h6>
                                </div>
                            {/foreach}
                        </div>
                        <form action="Controlador/categorias.php" method="post">
                            <button class = "btn btn-secondary m-2" type="submit">Seleccionar categorías</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                        <form action="index.php" method="post">
                            Número imaxes por categoría <input type="number" name="numImaxes" value="{$numImaxes}" min="{$numMinImaxes}" max="{$numMaxImaxes}"/>
                            <br/>
                            <button class="btn btn-lg btn-success" type="submit" name="xogar" value="enviar">Xogar</button>
                        </form>
                        {if isset($mensaxeErro)}
                            <div class="d-flex justify-content-center erro">
                                {$mensaxeErro}
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>
