<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Juego de los sinónimos
 * Versión: 1.2
 */
require "../Funcionalidad/funcionalidad.inc.php";//Se incluye el fichero con la funcionalidad del programa
irPaginaAnterior();//Dependiendo de que botón se pulse, se vuelve a una página u otra (En este caso se vuelve al menú de sinónimos)

$archivo_sinonimos = "Lista/lista_sinonimos.csv";//Fichero de donde se van a sacar las palabras con sus sinónimos
$lista = ponerPalabras($archivo_sinonimos);//Se ejecuta la función "ponerPalabras()" pasando como parámetro la variable $archivo_sinonimos" guardando lo que devuelve en la variable "$lista"
$palabras = recogerPalabras("palabra", 6);//Se recogen las palabras del formulario en esta variable ($palabras)
$resultados = recogerPalabras("resultado", 6);//Se recogen los resultados del formulario puestas por el usuario en esta variable ($resultados)
$campos_cubiertos = comprobarCampos($palabras);//Se comprueba si los campos están vacíos o no y se guarda el valor de retorno (Verdadero o Falso) en esta variable ($campos_cubiertos)
$comprobacion_campos = array();//Comprueba si los campos están cubiertos correctamente
?>
<html>
    <head>
        <title>Sinónimos</title>
        <?php require "../../../layout/head.php";//Se incluye todo lo relacionado con los estilos y scripts comunes de la página web ?>
        <link rel="stylesheet" type="text/css" href="../Estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../../estilos/estilos.css">
    </head>
    <body>
        <?php require "../../../layout/cabeceira.php";//Se incluye la cabecera de la página web ?>
        <div class="container">
            <h1 class="titulo">SINONIMOS</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <?php
                imprimirFormulario($lista);//Se ejecuta la función imprimirFormulario pasando como parámetro la variable "$lista"
                ?>
                
                <input type="hidden" name="dificultad_oculta" value="<?php echo $dificultad ?>">
                <input type="hidden" name="intentos" value="<?php echo $num_intentos ?>">
                <input type="hidden" name="juego_actual" value="sinonimos">

                <input type='submit' name='corregir' value='Corregir Datos'>
                <input type='submit' name='volver_sinonimos' value='Volver al menú'>
                
            </form>
            <?php
            if (isset($corregir_datos)) {//Si se pulsó el botón y se cubrieron todos los campos, sucede lo siguiente
                if ($campos_cubiertos) {
                    /**
                    * Cada vez que se ejecuta este bucle, se ejecuta la función "corregirPalabra()" con los parámetros "$archivo_sinonimos", "$palabras" y "$resultados" que
                    * corrige cada resultado acorde a la palabra a la que pertenecen
                    */
                    echo "<div class='lista_errores'>";
                    for ($cont = 1; $cont <= count($palabras); $cont++) {
                        $comprobacion_campos[] = corregirPalabra($archivo_sinonimos, $palabras[$cont - 1], $resultados[$cont - 1]);
                    }
                    echo "</div>";

                    echo "<div id='victoria'>";
                    puntuacionJugador($comprobacion_campos);//Se ejecuta la función "puntuacionJugador()" pasando como parámetro la variable "$comprobacion_campos"
                    echo "</div>";
                } else {//Por lo contrario, manda un mensaje de error de que todos los campos tienen que estar cubiertos
                    echo "<div class='error'>Todos os campos ten que estar cubertos</div>";
                }
            
            }
            require "../../../layout/pe.php";//Se incluye el pie de la página web
            ?>
        </div>
    </body>
</html>