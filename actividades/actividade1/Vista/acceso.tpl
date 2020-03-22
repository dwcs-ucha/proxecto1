{*
    BreoBeceiro:21/03/2020
    PROXECTO 2º AVALIACIÓN | Versión 1.0
*}

{include file="{$rutaRootPHP}{'Controlador/librerias/utils.php'}"}

<!DOCTYPE html>
<html lang="gl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style type="text/css">
        
            .col-md-4 { float: right; }
        
        </style>
        <link rel="stylesheet" type="text/css" href="" />
        <script type="text/javascript">

            // JS

        </script>
        <title>
            Rexistro de Puntos
        </title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="formularioIngreso border rounded">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <fieldset>
                                <legend>Garda o teu resultado</legend>
                                <div class="form-group">
                                    <label for="Xogador">Xogador:</label>
                                    <input type="text" name="nomeXogador" value="{isset($xogador)? print $xogador : print ""}" id="Xogador" />
                                </div>
                                <div class="form-group">
                                    <label for="Contrasinal">Contrasinal:</label>
                                    <input type="password" name="contrasinalXogador" id="Contrasinal" />
                                </div>
                                {isset($camposBaleiros)? print $camposBaleiros : print ""}
                                {isset($xogadorNonAtopado)? print $xogadorNonAtopado : print ""}

                                <input type="submit" name="enviar" value="Gardar" class="btn btn-primary" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
        </div>
    </body>
</html>