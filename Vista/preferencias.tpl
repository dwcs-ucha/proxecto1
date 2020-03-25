<!DOCTYPE html>
<html>
    <head>
        <title>
            Preferencias
        </title>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
    </head>
    <body>
        <div class="container text-center border border-dark">
            <form action="{$rutaRootHTML}{'Controlador/preferencias.php'}" method="post">
                <div>
                    Modo oscuro
                    <label class="switch">
                        <input type="checkbox" name="temaOscuro" value="seleccionado" {$temaOscuro}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <button type="submit" name="preferencias" value="seleccionadas">Gardar preferencias</button>
            </form>
        </div>
        {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
    </body>
</html>