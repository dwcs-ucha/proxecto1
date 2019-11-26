<?php
/**
 * Nombre: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Colección de funciones para añadir funcionalidad al juego de sinónimos y antónimos
 * Versión: 1.0
 */

$corregir_datos = $_POST['corregir'];//Se recoge la información del botón de corregir para comprobar si se pulsó o no
$indice = 1;//Índice de palabra

/**
  * Nombre: irPaginaAnterior()
  * Descripción: Dependiendo del botón que se pulse en el menú, va a la página de menú correspondiente
  */
function irPaginaAnterior() {
    if (isset($_POST['volver_sinonimos'])) {//Si se pulsa el botón de "volver al menú" en el juego de los sinónimos se va a la página ded menú de sinónimos
        header("Location: ../menu_sinonimos.php");
    }
    if (isset($_POST['volver_antonimos'])) {//Si se pulsa el botón de "volver al menú" en el juego de los antónimos  se va a la página ded menú de antónimos
        header("Location: ../menu_antonimos.php");
    }
    if (isset($_POST['volver_menu_principal_sinonimos'])) {//Si se pulsa el botón de "volver al menú" en el menú de los sinónimos se va a la página ded menú principal
        header("Location: ../index.php");
    }
    if (isset($_POST['volver_menu_principal_antonimos'])) {//Si se pulsa el botón de "volver al menú" en el menú de los antónimos se va a la página ded menú principal
        header("Location: ../index.php");
    }
}
/**
 * Nombre: ponerPalabras()
 * Descripción: Se coge las primeras palabras del archivo .csv que se indique ($archivo) y se pone en el formulario junto con una caja de texto para poner un sinónimo/antónimo
 */
function ponerPalabras($archivo) {
    $fp = fopen($archivo, "r");//Se abre el fichero correspondiente en modo lectura desde el principio
    $palabras = array();//Array con las palabras

    if (!$fp = fopen($archivo, "r")) {//Si no se abrió el fichero con éxito, se imprime un mensaje de error
        echo "<div class='error'>Non se pode ler o ficheiro</div>";
    } else {//De lo contrario, sucede lo siguiente
        while (!feof($fp)) {//Mientras el puntero no se localize al final del fichero, se coge una línea del csv y se pone la primera palabra del array en la variable "$palabras"
            $datos = fgetcsv($fp);
            $palabras[] = $datos[0];
        }
        fclose($fp);//Se cierra la instancia de apertura del fichero
  
        shuffle($palabras);//Se ordenan de manera aleatoria las palabras
        return $palabras;//Se devuelve el array desordenado
    }
}
/**
 * Nombre: imprimirFormulario()
 * Descripción: Imprime el formulario en condición de si se pulsó el boton de corregir o no, pasando como parámetro el array de palabras iniciales a imprimir ($array)
 */
function imprimirFormulario($array) {
    global $corregir_datos;

    if (isset($corregir_datos)) {//Si se pulsó en el botón de corregir datos, sucede lo siguiente
        for ($cont = 1; $cont < count($array); $cont++) {//Cada vez que se ejecuta el bucle se ponen las palabras del input "palabra$cont" y el cuadro del texto al lado de cada uno
            echo "<label class='palabra'>" . $cont . " - " . $_POST['palabra' . $cont] . "</label><br/>";
            echo "<input id='resultado$cont' name='resultado$cont' type='text' value='" . $_POST["resultado" . $cont] . "' autocomplete='off'><br/><br/>";
            echo "<input id='palabra$cont' name='palabra$cont' type='hidden' value='" . $_POST['palabra' . $cont] . "'>";
        }
    } else {//De lo contrario, sucede lo siguiente
        for ($cont = 1; $cont < count($array); $cont++) {//Cada vez que se ejecuta el bucle se ponen las palabras del array "array" y el cuadro del texto al lado de cada uno
            echo "<label    class='palabra'>" . $cont . " - " . $array[$cont - 1] . "</label><br/>";
            echo "<input id='resultado$cont' name='resultado$cont' type='text' value='" . $_POST["resultado" . $cont] . "' autocomplete='off'><br/><br/>";
            echo "<input id='palabra$cont' name='palabra$cont' type='hidden' value='" . $array[$cont - 1] . "'>";
        }
    }
}

/**
 * Nombre: recogerPalabras()
 * Descripción: Recoge determinados datos del formulario, dependiendo del tipo y longitud que se indique
 */
function recogerPalabras($tipo, $longitud) {
    $lista = array();//lista que contendrá el conjunto de datos

    switch ($tipo) {//Dependiendo del tipo, ejecutará una serie de instrucciones u otra
        case "palabra"://En el caso de que el tipo sea "palabra":
        /**
         * Cada vez que se ejecuta este bucle se guarda las palabras del formulario en el array "$lista",
         * eliminando anteriormente espacios al principio y fin de las mismas
         */
            for ($cont = 1; $cont <= $longitud; $cont++) {
                $palabra = trim($_POST['palabra' . $cont]);
                $lista[] = $palabra;
            }
            break;
        case "resultado"://En el caso de que el tipo sea "resultado":
        /**
         * Cada vez que se ejecuta este bucle se guarda los resultados del formulario puestos por los usuarios en el array "$lista",
         * eliminando anteriormente espacios al principio y fin de las mismas
         */
            for ($cont = 1; $cont <= $longitud; $cont++) {
                $resultado = trim($_POST['resultado' . $cont]);
                $lista[] = $resultado;
            }
            break;
    }
    
    return $lista;//Se devuelve la lista con las palabras/resultados del formulario
}

/**
 * Nombre: comprobarCampos()
 * Descripción: Comprueba si todos los campos del formulario se cubrieron y no están vacíos
 */
function comprobarCampos($palabras) {
    $correcto = true;//Por predeterminado todos los campos están cubiertos (verdadero)

    for ($cont = 1; $cont < count($palabras); $cont++) {//Cada vez que se ejecuta este bucle:
        $resultado = trim($_POST['resultado' . $cont]);//Se guarda el resultado eliminando espacios en blanco al principio y fin de la cadena correspondiente
        if (empty($resultado)) {//Si el resultado está vacío, se cambia el valor de la variable "$correcto" a "false" (falso)
            $correcto = false;
        }
    }
    return $correcto;//Se devuelve el valor de la variable "$correcto"
}

/**
 * Nombre: corregirPalabra()
 * Descripción: Corrige el resultado del usuario a partir del archivo ($archivo) indicado, comprobando si la palabra ($palabra) del formulario coincide con la
 * primera palabra de cada linea del fichero, y si es cierto comparando el resultado ($resultado) con la palabra si lo contiene en su propia línea o no
 */
function corregirPalabra($archivo, $palabra, $resultado, $dificultad) {
    global $indice;//Se recoge la variable global "$indice"

    $correcto = false;//Por predeterminado el resultado no concuerda con la palabra del formulario (falso)
    $validacion = "/^[A-Za-z]+$/";//La expresión regular para comprobar que el resultado sólo contiene letras
    $resultado = strtolower($resultado);//Convierte la cadena entera en minúsculas para evitar problemas de comparación

    if (preg_match($validacion, $resultado)) {//Si el patrón coincide con el resultado, se realiza lo siguiente
        $fp = fopen($archivo, "r");//Se abre el fichero correspondiente en modo lectura desde el principio

        if (!$fp = fopen($archivo, "r")) {//Si no se abrió el fichero con éxito, se imprime un mensaje de error
            echo "<div class='error'>Non se pode ler o ficheiro</div>";
        } else {//De lo contrario, sucede lo siguiente
            while (!feof($fp)) {//Mientras el puntero no esté al final del fichero:
                $datos = fgetcsv($fp);//Coge cada línea que contiene el archivo csv

                if ($palabra == $datos[0]) {//Si la palabra coincide con la primera palabra de la línea del csv, se efectúa lo siguiente
                    for ($cont = 1; $cont < count($datos); $cont++) {//Cada vez que se ejecuta este bucle:
                        $dato = trim($datos[$cont]);//Se eliminan los espacios en blanco al principio y al final de la cadena para evitar fallos en las comprobaciones
                        if ($resultado == $dato) {//Si el resultado coincide con uno de los sinónimos/antónimos de la palabra correspondiente, se imprime un mensaje de que se acertó
                            $correcto = true;
                        }
                    }
                    if ($correcto) {//Si el resultado coincide con uno de los sinónimos/antónimos de la palabra correspondiente, se imprime un mensaje de que se acertó
                        echo "<div class='exito'>" . $indice . " - Correcto!</div>";
                        $indice++;//Se suma uno al índice de palabra para la siguiente
                    } else {//Por el contrario, puede suceder lo siguiente:
                        switch($dificultad) {//Dependiendo de la dificultad, sale un mensaje de error u otro
                            case "facil"://Si es facil, se ofrece una pista con las tres primeras letras de todas las palabras
                                $cadena = "<div class='error'>" . $indice . " - Incorrecto, as opcións correctas empiezan por: ";
                                for ($a = 1; $a < count($datos); $a++) {//Bucle con las tres primeras palabras de todas las posibles soluciones que se concatena a la cadena anterior
                                    $cadena .= substr($datos[$a], 0, 4) . ", ";
                                }
                                $cadena .= "</div>";//Se cierra cadena con la etiqueta "div" para que quede el mensaje en un único bloque
                                echo $cadena;//Se imprime la cadena
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                                break;//Se realiza un "break" para no ejecutar lo siguiente si no cumple la condición
                            case "medio"://Si es facil, se ofrece una pista con las tres primeras letras de todas las palabras
                                $cadena = "<div class='error'>" . $indice . " - Incorrecto, as opcións correctas empiezan por: ";
                                for ($a = 1; $a < count($datos); $a++) {//Bucle con la primera palabra de todas las posibles soluciones que se concatena a la cadena anterior
                                    $cadena .= substr($datos[$a], 0, 2) . ", ";
                                }
                                $cadena .= "</div>";//Se cierra cadena con la etiqueta "div" para que quede el mensaje en un único bloque
                                echo $cadena;//Se imprime la cadena
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                                break;//Se realiza un "break" para no ejecutar lo siguiente si no cumple la condición
                            case "dificil"://Si es dificul, simplemente sale un mensaje de error de que está mal
                                echo "<div class='error'>" . $indice . " - Incorrecto</div>";
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                        }
                    } 
                }
            }
        fclose($fp);//Se cierra la instancia de apertura del fichero
        }
    } else {//Por el contrario, se muestra un mensaje de error conforme el campo sólo debe contener letras
        echo "<div class='error'>" . $indice . " - O campo debe conter só letras</div>";
        $indice++;//Se suma uno al índice de palabra para la siguiente
    }
}

