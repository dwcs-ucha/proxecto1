<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        {if $juego === "sinonimos"}
            <title>Sinónimos</title>
        {/if}
        {if $juego === "antonimos"}
            <title>Antónimos</title>
        {/if}
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}

        <div class="container">
        {if $juego === "sinonimos"}
            <h1 class="titulo">SINONIMOS</h1>
        {/if}
        {if $juego === "antonimos"}
            <h1 class="titulo">ANTONIMOS</h1>
        {/if}
        <img id="nenos2" src="Imagenes/nenos2.jpg">
        <form action="juego.php" method="post">
            {$lista}

            <br/><br/>

            <input type='submit' name='corregir' value='Correxir Datos'>
            <input type='submit' name='volver' value='Volver al menú'>
                
        </form>
        
        </div>
        {include file="../../Vista/layout/pe.tpl"}
    </body>
</html>