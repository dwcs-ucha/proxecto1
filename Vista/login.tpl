<html>
    <head>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <style type="text/css">
            .col { border: solid black 1px; }
            h1 { text-align: center; }
            img { width: 80%; }
            .error { color: red;}
            .clasificacion { margin-left: 15%;
                             vertical-align: center;	}
            td,th { padding: 5px;
                    text-align: center;}
            .sesion { margin-left: 80%; }
            .xogo {	margin-left: 40%;
                    vertical-align: center;	}
            .error { color: red;}	
        </style>
        <title>Login</title>        
    </head>
    <body>
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <div class="sesion">
            {if isset($sesion_usuario)}
                <h4><a href="logoff.php">Cerrar Sesion</a></h4>
            {/if}
        </div>
        <h2>Login</h2>        
        <div class="xogo">
            <form action="login.php" method="post">
                <label for="nome">Nome : </label><br/>
                <input id="nome" type="text" name="nome" maxlength="10">
                <span class="error">
                    {if ($errornome)} 
                        O nome debe ter un mínimo de 4 caracteres e un máximo de 8.
                        Acéptanse caracteres alfabéticos e especiais.
                    {/if}
                </span>
                <br/><br/>

                <label for="contrasinal">Contrasinal : </label><br/>
                <input id="contrasinal" type="password" name="contrasinal" maxlength="8" minlength="4">
                <span class="error">
                    {if ($errorcontrasinal)}
                        O contrasinal ten que ten entre 4 e 8 caracteres.
                    {/if}
                </span>
                <br/><br/>

                <button class="btn btn-secondary btn-success"  type="submit" id="iniciar" name="iniciar" value="{$paxinaRedirixir}">Conectarse/Rexistrarse</button>
                <button class="btn btn-secondary btn-warning"  type="submit" id="volver" name="volver" value="{$paxinaRedirixir}">Volver</button>
                <br><br>
                <span class="error">
                    {if ($error_inicio)}
                        Erro o iniciar a sesión, usuario ou contrasinal incorrectos.
                    {/if}
                </span>
        </div>

        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>