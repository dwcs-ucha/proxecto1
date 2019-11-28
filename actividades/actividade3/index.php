<?php 
if(!empty($_GET)){
    print_r($_GET);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Testing JS</title>
        <style>
            .hi {
                color: yellow;
            }

            .opcion {
                border: 1px solid;
                border-radius: 3px #333;
                box-shadow: 3px 0px 5px #333;
                font-weight: bold;
                text-align: center;
                user-select: none;
                width: 150px;
            }
            .opcion:hover {
                background-color: grey;
                cursor: pointer;
            }
            .seleccionado{
                background-color: #226666;
                color: red;
            }
        </style>
    </head>
    <body>
        <form id="testform" method="get">
        </form>
        <div id="preg1">
            <select name="animal1" id="animal1" form="testform">
                <option value=""></option>
                <option value="miaw">Cat</option>
                <option value="woof">Dog</option>
                <option value="pika pika">Pikachu</option>
            </select>
            <div>
                <div class="opcion" value="miaw" onclick='seleccionar("preg1", "animal1", this)'>Cat</div>
                <div class="opcion" value="woof" onclick='seleccionar("preg1", "animal1", this)'>Dog</div>
                <div class="opcion" value="pika pika" onclick='seleccionar("preg1", "animal1", this)'>Pikachu</div>
            </div>

            <select name="vehicles1" id="vehicles1" form="testform">
                <option value=""></option>
                <option value="car">Car</option>
                <option value="motorbike">Motorbike</option>
                <option value="plane">Plane</option>
            </select>

            <div>
                <div class="opcion" value="car" onclick='seleccionar("preg1", "vehicles1", this)'>Car</div>
                <div class="opcion" value="motorbike" onclick='seleccionar("preg1", "vehicles1", this)'>Motorbike</div>
                <div class="opcion" value="plane" onclick='seleccionar("preg1", "vehicles1", this)'>Plane</div>
            </div>
        </div>

        <div id="preg2">
            <select name="animal2" id="animal2" form="testform">
                <option value=""></option>
                <option value="miaw">Cat</option>
                <option value="woof">Dog</option>
                <option value="pika pika">Pikachu</option>
            </select>
            <div>
                <div class="opcion" value="miaw" onclick='seleccionar("preg2", "animal2", this)'>Cat</div>
                <div class="opcion" value="woof" onclick='seleccionar("preg2", "animal2", this)'>Dog</div>
                <div class="opcion" value="pika pika" onclick='seleccionar("preg2", "animal2", this)'>Pikachu</div>
            </div>
            
        </div>
        <button form="testform">Test</button>
        <p id="texto"></p>
        <div onclick='seleccionar("Dog")'>Seleccioname</div>
    </body>
    <script src="script.js"></script>
</html>
