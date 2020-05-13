<!doctype html>
<html lang="gl">
    <head>
        {include file="../../../Vista/layout/head.tpl"}
        <style>
            .xogo { margin-left: 40%;
                    vertical-align: center;}
            .error { color: red;}
        </style>
        <title>Caderno de Sumas</title> 
    </head>
    <body>
        {include "../../../Vista/layout/cabeceira.tpl"}

        <h2>Aciertos : {$aciertos}</h2>
        <h2>Puntuacion : {$puntuacion}</h2>
        <div class="xogo">
            <form action="resultados.php" method="post">
                <br><br><input class="btn btn-secondary btn-success" type="submit" id="reintentar" name="reintentar" value='Reintentar'>
                <br><br><input class="btn btn-secondary btn-danger" type="submit" id="nova" name="nova" value="Nova Partida">
                {if ($login)}
                    <br><br><input class="btn btn-secondary btn-success" type="submit" id="gardar" name="gardar" value="Gardar Resultados">   
                {/if}
            </form>
        </div>
        <div class='xogo'>
            <form action="../index.php" method="post">
                <br><input class="btn btn-secondary btn-warning" type="submit" id="volver" name="volver" value="Volver ó inicio">
            </form>
        </div>
        {include "../../../Vista/layout/pe.tpl"}
    </body>
</html>