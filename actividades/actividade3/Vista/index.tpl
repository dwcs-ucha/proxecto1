{*
* @autor Manuel Ángel Calvo Piñeiro
* @version 1.1
* @data 07/03/2020
*}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <title>Que é? Para que serve? Para que se utiliza?</title>
    </head>
    <body>
    <wrapper class="d-flex flex-column">
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <main class="container-fluid">
            <h1>Responde preguntas sobre obxetos</h1>
            <form id="facil" action="xogo.php" method="post">
                <div class="container-fluid corpo">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imaxe">
                            <img class="img-thumbnail" src="icono.png" height="300" width="300"/>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 resumo">
                            <span>Xogo de imaxes con preguntas. Responde correctamente ás preguntas sobre os distintos obxetos amosados na pantalla.</span>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 marxe"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dificultade" align="center">
                            <h4>Dificultade</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary btn-success">
                                    <input type="radio" name="dificultade" value="1" form="facil"/>Fácil
                                </label>
                                <label class="btn btn-secondary active btn-warning">
                                    <input type="radio" name="dificultade" value="2" form="facil"/>Normal
                                </label>
                                <label class="btn btn-secondary btn-danger">
                                    <input type="radio" name="dificultade" value="3" form="facil"/>Difícil
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 xogar" align="center">
                            <br/>
                            <button class="btn btn-lg btn-success" type="submit" form="facil">Xogar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </wrapper>
    {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
</body>
</html>
