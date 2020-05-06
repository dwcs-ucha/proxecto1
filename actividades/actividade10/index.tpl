<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        <title>Sinonimos y Antonimos</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}
        <div class="container">
            {if isset($sesion_usuario)}
                <h2><a href="logoff.php">Cerrar Sesion</a></h2>
            {else}
                <h2><a href="login.php">Unirse</a></h2>
            {/if}
            <h1>SINONIMOS Y ANTONIMOS</h1>
            <form action="index.php" method="post">
                <h2>Elixe un xogo</h2>
                <img id="nenos" src="Imagenes/nenos.png">
                <label>Sinonimos</label><input class="seleccion" type="radio" name="juego" value="sinonimos" checked><br/>
                <label>Antonimos</label><input class="seleccion" type="radio" name="juego" value="antonimos">

                <br/><br/>

                <h2>Elixe unha dificultade</h2>
                <label>Fácil</label><input type="radio" class="seleccion" name="dificultad" value="facil" checked><br/>
                <label>Normal</label><input type="radio" class="seleccion" name="dificultad" value="medio"><br/>
                <label>Dificil</label><input type="radio" class="seleccion" name="dificultad" value="dificil">

                <br/><br/>

                <input type="submit" name="jugar" value="Xogar">
                <input type="submit" name="consultar_puntuacion" value="Consultar Puntuación">
            </form>
        </div>
        {include file="../../Vista/layout/pe.tpl"}
    </body>
</html>