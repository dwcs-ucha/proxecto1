{*
    BreoBeceiro:09/03/2020
    PROXECTO 2º AVALIACIÓN | Versión 1.0
*}

{include file="{$rutaRootPHP}{'Controlador/librerias/utils.php'}"}

<!doctype html>
<html lang="gl">
    <head>
        {include file="{$rutaRootPHP}Vista/layout/head.tpl"}
        <link rel='stylesheet' type='text/css' href='Estilos/estiloClaro.css'>
        <script type="text/javascript" src=""></script>
        <style type="text/css">

            .container { text-align: center; 
            }
            /*.opcions { background-color: #2D39EA; }

            /*form { text-align: center; }*/

            .col {text-align: center; }

            .imaxesNivel1 { height: 42%; }

            .col input[type=text] { width: 45%;
                                    font-size: 30px;
                                    margin: auto; }

            .formPuntos { width: 45%;
                          margin: auto; }

            form fieldset { border: 1px solid black; 
                            padding: 5px;
                            margin: 15px 1px; }

            .row .col-md-12 { margin: 5px 1px; }

            .row input[type=text] { width: 65%; }

            .enviaPuntos { float: left;
                           margin: 1px 3px; }

        </style>
        <title>
            Completar sílabas e palabras | Nivel 1
        </title>
    </head>

    <body>
        <wrapper class="d-flex flex-column">
            {include file="{$rutaRootPHP}Vista/layout/cabeceira.tpl"}
            <main class="container corpo">
                {* Exemplo de uso de arquivos no cliente *}
                <img src="{$rutaRootHTML}Vista/imaxes/logo2.png">

                <h2>Completar Sílabas e Palabras<br />(Fácil)</h2>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    {*
                        A estrutura de INPUTs a continuación permanece estática e habería que modificala para que amose as 
                          sílabas iniciais que haberá que rechear no caso de que as palabras a completar sean as da segunda
                          liña do CSV (pois as que aparecen tal e como está se corresponden coas da primeira liña).
                    *}
                    <input type="text" name="silabaLA" class="opcions" value="LA" readonly="readonly" />
                    <input type="text" name="silabaLE" class="opcions" value="LE" readonly="readonly" />
                    <input type="text" name="silabaLI" class="opcions" value="LI" readonly="readonly" />
                    <input type="text" name="silabaLO" class="opcions" value="LO" readonly="readonly" />
                    <input type="text" name="silabaLU" class="opcions" value="LU" readonly="readonly" />

                    <br /><br />

                    <div class="row align-items">

                        {* Imaxes e caixas de texto a cubrir polo xogador/a *}

                    </div>

                    <input type="submit" name="enviar" id="Enviar" value="Comprobar" />
                    <input type="submit" name="refrescar" id="Refrescar" value="Refrescar" />

                    <input type="hidden" name="silabasFinais" value="<?php isset($silabasFinaisSTRING)? print $silabasFinaisSTRING : print ""; ?>" />
                </form>
            </main>
            {include file="{$rutaRootPHP}Vista/layout/pe.tpl"}
        </wrapper>
    </body>
</html>