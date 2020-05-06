<html>
    <head>
        {include file="../../Vista/layout/head.tpl"}
        <title>Administración</title>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo.css">
    </head>
    <body>
        {include file="../../Vista/layout/cabeceira.tpl"}
        {if isset($sesion_usuario)}
            <h2><a href="logoff.php">Cerrar Sesion</a></h2>
        {/if}
        <div class="container">
        <h1>Administracion Xogo "Sinonimos e Antonimos"</h1>
        <table id="tabla_palabras">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Valores</th>
                <th>Palabra Correcta</th>
            </tr>
            {$lista_palabras}
        </table>

        <h2>Anadir Palabra:</h2>
        <form action="administracion.php" method="post">
            <label for="nombre_nuevo">Nombre:</label><br/>
            <input id="nombre_nuevo" type="text" name="nombre_nuevo" maxlength="20">
            {if isset($error_nombre_anadir)}
                {$error_nombre_anadir}
            {/if}
            <br/><br/>
            
            <label for="tipo_nuevo">Tipo:</label><br/>
            <select name="tipo_nuevo">
                <option value="sinonimo">Sinónimo</option>
                <option value="antonimo">Antónimo</option>
            </select>
            {if isset($error_tipo_anadir)}
                {$error_tipo_anadir}
            {/if}
            <br/><br/>

            <label for="lista_nueva">Valores (ejemplo -> palabra,palabra,palabra):</label><br/>
            <input id="lista_nueva" type="text" name="lista_nueva" maxlength="60">
            {if isset($error_lista_anadir)}
                {$error_lista_anadir}
            {/if}
            <br/><br/>

            <label for="palabra_correcta_nueva">Palabra Correcta:</label><br/>
            <input id="palabra_correcta_nueva" type="text" name="palabra_correcta_nueva" maxlength="20">
            {if isset($error_palabra_correcta_anadir)}
                {$error_palabra_correcta_anadir}
            {/if}
            <br/><br/>

            <input id="anadir" type="submit" name="anadir" value="Añadir Palabra">
            {if isset($mensaje_error_anadir)}
                {$mensaje_error_anadir}
            {/if}
            <br/><br/>            

            <h2>Modificar Palabra:</h2>
            <label for="palabra_elegida_modificar">Palabra:</label><br/>
            <select name="palabra_elegida_modificar">
                {$lista_campos}
            </select>
            
            <br/><br/>

            <label for="campo_modificar">Campo:</label><br/>
            <select name="campo_modificar">
                <option value="nombre">Nombre</option>
                <option value="tipo">Tipo</option>
                <option value="valores">Valores</option>
                <option value="palabra_correcta">Palabra Correcta</option>
            </select>

            <br/><br/>

            <label for="valor_modificar">Valor:</label><br/>
            <input id="valor_modificar" type="text" name="valor_modificar" maxlength="60">
            {if isset($error_valor_modificar)}
                {$error_valor_modificar}
            {/if}
            <br/><br/>

            <input id="modificar" type="submit" name="modificar" value="Modificar Palabra">

            <br/><br/>           
            {if isset($mensaje_error_modificar)}
                {$mensaje_error_modificar}
            {/if}

            <h2>Borrar Palabra:</h2>
            <label for="palabra_elegida_borrar">Palabra:</label><br/>
            <select name="palabra_elegida_borrar">
                {$lista_campos}
            </select>
            {if isset($error_nombre_borrar)}
                {$error_nombre_borrar}
            {/if}
            <br/><br/>

            <input id="borrar" type="submit" name="borrar" value="Borrar Palabra">
            {if isset($mensaje_error_borrar)}
                {$mensaje_error_borrar}
            {/if}
        </form>
        </div>

        {include file="../../Vista/layout/pe.tpl"}
    </body>
</html>