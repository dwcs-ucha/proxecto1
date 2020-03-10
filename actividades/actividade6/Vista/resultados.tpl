<!doctype html>
<html lang="gl">
    <head>
        {include file="../../../Vista/layout/head.tpl"}
        <style>
            .xogo {	margin-left: 40%;
                    vertical-align: center;	}
            .error { color: red;}
        </style>
        <title>Caderno de Sumas</title> 
    </head>
    <body>
        {include "../../../layout/cabeceira.tpl"}
        <div class="xogo">	
            <h2>Aciertos : {$aciertos}</h2>
            <h2>Puntuacion : {$puntuacion}</h2>
            <form action="resultados.php" method="post">
                <input type="submit" id="reintentar" name="reintentar" value="Reintentar">
                <input type="submit" id="nova" name="nova" value="Nova Partida">
                {if ($login)}
                    <input type="submit" id="gardar" name="gardar" value="Gardar Resultados">   
                {/if}
            </form>
        </div>
        <div class='xogo'>
            <form action="index.php" method="post">
                <input type="submit" id="volver" name="volver" value="Volver ó inicio">
            </form>
        </div>
        {include "../../../layout/pe.php"}
    </body>
</html>