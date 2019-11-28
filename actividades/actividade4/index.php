<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once '../../layout/head.php'; /* Cont�n etiquetas coma meta, link, script */
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Agrupar elementos</title>
        <style>
            .btn-lg {
                padding:25px 100px;
            }
            .btn-secondary {
                padding: 0px 30px;
            }
        </style>
    </head>
    <body>
        <?php
        require_once '../../layout/cabeceira.php'; /* Cont�n a cabeceira, que consiste nun men� horizontal <nav> [...] </nav> */
        ?>
        <form action="actividade.php" method="post" class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    <img src="icono.png" height="300" width="300"/>
                </div>
                <div class="col">
                    <h1>Xogo de agrupar elementos por categor�as</h1>
                    <p>
                        Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categor�a de vocabulario dada.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-9">    
                    <h4>Dificultade</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active btn-success">
                            <input type="radio" name="dificultade" value="facil"/>F�cil
                        </label>
                        <label class="btn btn-secondary active btn-warning">
                            <input type="radio" name="dificultade" value="normal" checked/>Normal
                        </label>
                        <label class="btn btn-secondary active btn-danger">
                            <input type="radio" name="dificultade" value="dificil"/>Dif�cil
                        </label>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <button class="btn btn-lg btn-success" type="submit" name="enviar" value="enviar">Xogar</button>
                </div>
                <div class="col"></div>
            </div>
        </form>
        <?php
        require_once '../../layout/pe.php'; /* Cont�n o p� da p�xina (<footer>[...]</footer>) */
        ?>
    </body>
</html>