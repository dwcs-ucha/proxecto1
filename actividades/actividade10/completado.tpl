<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        <title>Sinónimos</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}

        <h1 class="titulo">VICTORIA</h1>
        <h2>O CONSEGUICHES, ENHORABOA!!!</h2>
        {if isset($sesion_usuario)}
        <h3>Queres gardar a puntuacion?</h3>

        <a class="enlace" href="guardar_puntuacion.php">Si</a><!-- Lleva a la página de guardar puntuación con la dificultad, número de intentos y juego correspondientes -->
        <a class="enlace" href="index.php">Non</a><!-- Se va a la página de inicio de la actividad -->
        {else}
        <h2>Non estas rexistrado, polo cal non podes gardar estatisticas</h2>
        <h3>Se queres gardar estatisticas, unete <a href="login.php">aqui</a></h3>
        <h3>Se queres volver ao menu principal e non gardar as tuas estatisticas, pulsa <a href="index.php">aqui</a></h3>
        {/if}
        {include file="../../Vista/layout/pe.tpl"}
        </div>
    </body>
</html>
