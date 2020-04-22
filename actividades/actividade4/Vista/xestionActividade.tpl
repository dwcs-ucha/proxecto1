<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agrupar elementos</title>
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <link href="../estilos.css" rel="stylesheet" type="text/css"/>
        <style>
            .categoria {
                border-style: solid;
                border-color: black;
                border-width: 1px;
            }
            form img {
                height: 100px;
                width: 150px;
            }
            label {
                font-weight: bold;
            }
        </style>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="formulario col-9">
                        <form class="border border-dark p-2" action="xestionActividade.php" method="post" enctype="multipart/form-data">
                            <div>
                                <label>
                                    Nome categoría
                                    <input type="text" name="nomeCategoria"
                                           {if isset($mostrarCategoria)}
                                               value="{$nomeCategoria}" readonly
                                           {/if}
                                           />
                                </label>
                            </div>
                            <div>
                                <label>
                                    Imaxe principal da categoría<br>
                                    {if isset($mostrarCategoria)}
                                        <img class="border border-dark" src="{$rutaRootHTML}{$imaxePrincipal}" />
                                        <br>
                                    {/if}
                                    <input type="file" name="imaxePrincipal"
                                           {if isset($mostrarCategoria)}
                                               onchange="this.form.submit()"
                                           {/if}
                                           />
                                    {if isset($mostrarCategoria)}
                                        <noscript>
                                        <div>
                                            <button type="submit">Aplicar cambios</button>
                                        </div>
                                        </noscript>
                                    {/if}
                                </label>
                            </div>
                            <div>
                                {if isset($mostrarCategoria)}
                                    <span class="font-weight-bold">Imaxes categoría</span><br>
                                    <div>
                                        <input type="hidden" name="nomeCategoriaMostrar" value="{$nomeCategoria}"/>
                                        {foreach from=$imaxesCategoriaMostrar item=$imaxeCategoria}
                                            <div class="d-inline-block border border-dark">
                                                <label>
                                                    <img src="{$rutaRootHTML}{$imaxeCategoria}" />
                                                    <br>
                                                    <button type="submit" name="rutaImaxeEliminar" value="{$imaxeCategoria}" class="w-100">
                                                        Eliminar imaxe
                                                    </button>
                                                </label>
                                            </div>
                                        {/foreach}
                                    </div>
                                {/if}
                                <label>
                                    Engadir imaxes<br>
                                    <input type="file" name="imaxesCategoria[]" multiple
                                           {if isset($mostrarCategoria)}
                                               onchange="this.form.submit()"
                                           {/if}/>
                                </label>
                                {if isset($mostrarCategoria)}
                                    <noscript>
                                    <div>
                                        <button type="submit">Aplicar cambios</button>
                                    </div>
                                    </noscript>
                                {/if}
                            </div>
                            <div class="text-center botonNovaCategoria w-100">
                                {if isset($mostrarCategoria)}
                                    <button type="submit" name="nomeCategoriaMostrar" value="">
                                        Nova categoría
                                    </button>
                                {else}
                                    <button type="submit" name="novaCategoria" value="novaCategoria">
                                        Nova categoría
                                    </button>
                                {/if}
                            </div>
                            {if isset($mensaxeErro)}
                                <div class="erro">
                                    {$mensaxeErro}
                                </div>
                            {/if}
                        </form>
                    </div>
                    <div class="col-2 p-0 d-inline-block">
                        {foreach from = $nomesCategorias item = $nomeCategoria}
                            <div class="categoria text-center">
                                <h4>{$nomeCategoria}</h4>
                                <form action="xestionActividade.php" method="post">
                                    <button type="submit" name="nomeCategoriaMostrar" value="{$nomeCategoria}">Seleccionar</button>
                                    <button type="submit" name="nomeCategoriaEliminar" value="{$nomeCategoria}">Eliminar</button>
                                </form>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>

