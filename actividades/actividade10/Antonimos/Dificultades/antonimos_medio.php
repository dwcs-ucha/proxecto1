<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Juego de los antónimos
 * Versión: 1.0
 */
require "../../../../layout/cabeceira.php";
require "../../../../layout/menu.php";
require "../../Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
irPaginaAnterior();//Dependiendo de que botón se pulse, se vuelve a una página u otra (En este caso se vuelve al menú de antónimos)

$archivo_antonimos = "../Lista/lista_antonimos.csv";//Fichero de donde se van a sacar las palabras con sus antónimos
$lista = ponerPalabras($archivo_antonimos);//Se ejecuta la función "ponerPalabras()" pasando como parámetro la variable $archivo_sinonimos" guardando lo que devuelve en la variable "$lista"
$palabras = recogerPalabras("palabra", 5);//Se recogen las palabras del formulario en esta variable ($palabras)
$resultados = recogerPalabras("resultado", 5);//Se recogen los resultados del formulario puestas por el usuario en esta variable ($resultados)
$campos_cubiertos = comprobarCampos($palabras);//Se comprueba si los campos están vacíos o no y se guarda el valor de retorno (Verdadero o Falso) en esta variable ($campos_cubiertos)
?>
<html>
    <head>
        <title>Antónimos</title>
        <link rel="stylesheet" type="text/css" href="../../Estilo/estilo.css">
    </head>
    <body>
        <h1 class="titulo">ANTÓNIMOS</h1>
        <form method="post">
            <?php
            imprimirFormulario($lista);//Se ejecuta la función imprimirFormulario pasando como parámetro la variable "$lista"
            ?>
            <input type="submit" name="corregir" value="Corregir Datos">
            <input type="submit" name="volver_antonimos" value="Volver al menú">
        </form>
        <?php
        if (isset($corregir_datos)) {//Si se pulsó el botón y se cubrieron todos los campos, sucede lo siguiente
            if ($campos_cubiertos) {
                /**
                * Cada vez que se ejecuta este bucle, se ejecuta la función "corregirPalabra()" con los parámetros "$archivo_sinonimos", "$palabras" y "$resultados" que
                * corrige cada resultado acorde a la palabra a la que pertenecen
                */
                for ($cont = 1; $cont <= count($palabras); $cont++) {
                    corregirPalabra($archivo_antonimos, $palabras[$cont - 1], $resultados[$cont - 1], "medio");
                }
            } else {
                echo "<div class='error'>Todos os campos ten que estar cubertos</div>";
            }  
        }
        require "../../../../layout/pe.php";
        ?>
    </body>
</html>