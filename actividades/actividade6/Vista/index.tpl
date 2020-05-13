<!doctype html>
<html lang="gl">
    <head>
        {include file="../../../Vista/layout/head.tpl"}
        <style type="text/css">
            .col { border: solid black 1px; }
            h1 { text-align: center; }
            img { width: 80%; }
            .error { color: red;}
            .clasificacion { margin-left: 35%;
                             vertical-align: center;	}
            td,th { padding: 5px;
                    text-align: center;}
            .sesion { margin-left: 80%; }
            </style>
            <script type="text/javascript" src=""></script>    
            <title>Caderno de Sumas</title>
        </head>
        <body>
            {include file="../../../Vista/layout/cabeceira.tpl"}           
            <h1>Caderno de Sumas</h1>     
            <form action="index.php" method="post">
                <div class="container-fluid corpo">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
                        <img class="img-thumbnail" src="sumas.jpg">
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                        <span>
                            O xogo consiste en indicar o resultado das sumas que se mostran por pantalla.<br>
                            Consta de 3 dificultades:<br>
                            -Fácil: Sumas de un só díxito. Cada acierto vale 1 punto.<br>
                            -Medio: Sumas con dous díxitos. Cada acierto vale 2 puntos.<br>
                            -Difícil: Sumas de tres díxitos. Cada acierto vale 3 puntos.<br>
                        </span>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
                        <h2>Dificultade</h2>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary btn-success">
                                <input type="radio" name="dif" id="dif" value="baixa">Baixa
                            </label>
                            <label class="btn btn-secondary btn-warning">
                                <input type="radio" name="dif" id="dif" value="media">Media
                            </label>
                            <label class="btn btn-secondary btn-danger">
                                <input type="radio" name="dif" id="dif" value="dificil">Difícil
                            </label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                        <button class="btn btn-lg btn-success" type="submit" id="entrar" name="entrar" value="enviar">Xogar</button>
                        <br><span>{if ($usuario === null)}Tes que iniciar sesión para poder gardar os datos da partida{/if}</span>
                        <br><span class="error">{if ($errordif)}Non hay escollida unha dificultade{/if}</span>
                        <br><button class="btn btn-lg btn-success" type="submit" id="vercla" name="vercla" value="vercla">Ver Clasificación</button>

                    </div>
                </div>
            </div>
        </form>  
        {if ($mostrarclas)}
            <div class="clasificacion">
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Puntos</th>
                        <th>Dificultade</th>
                    </tr> 
                    {foreach from=$estadisticas item=estatistica}		
                        <tr>
                            <td>{$estatistica->nomexogador}</td>  
                            <td>{$estatistica->data}</td>
                            <td>{$estatistica->puntos}</td>
                            <td>{$estatistica->dificultade}</td>                            
                        </tr>
                    {/foreach}
                </table>
            </div>
        {/if}
        {include file="../../../Vista/layout/pe.tpl"}
    </body>
</html>