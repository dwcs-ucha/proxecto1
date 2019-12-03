<?php
/**
 * Nombre: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Colección de funciones para añadir funcionalidad al juego de sinónimos y antónimos
 * Versión: 1.1
 */

$nombre_jugador = $_POST['nombre'];//Nombre del jugador
$contrasena_jugador = $_POST['contrasena'];//Contraseña del jugador
$corregir_datos = $_POST['corregir'];//Se recoge la información del botón de corregir para comprobar si se pulsó o no
$guardar_puntuacion = $_POST['guardar'];//Botón de guardar la puntuación del jugador
$juego_usuario = $_POST['juego'];//Juego que eligió el usuario
$dificultad_usuario = $_POST['dificultad'];//Dificultad que eligió el usuario
$jugar_juego = $_POST['jugar'];//Botón para jugar a un juego con su dificultad
$indice = 1;//Índice de palabra
$intentos = 0;//Número de intentos


if (isset($_POST['num_intentos'])) {//Si está inicializada la variable oculta de "num_intentos", se guarda ese valor en una variable
    $num_intentos = $_POST['num_intentos'];
} else {//Por el contrario, se pone un valor de inicio
    $num_intentos = $_GET['num_intentos'];
}

if (isset($_POST['dificultad_oculta'])) {//Si está inicializada la variable oculta de "dificultad", se guarda ese valor en una variable
    $dificultad = $_POST['dificultad_oculta'];
} else {//Por el contrario, se pone un valor de inicio
    $dificultad = $_GET['dificultad'];
}

/**
 * Nombre: irPaginaCorrespondiente()
 * Descripción: Dependiendo de lo que eligió el usuario en el menú principal, se va a un juego con la dificultad correspondiente
 */
function irPaginaCorrespondiente() {
global $jugar_juego, $juego_usuario, $dificultad_usuario, $dificultad;//Se cogen las variables globales "$jugar_juego", "$juego_usuario", "$dificultad_usuario" y "$dificultad"

    if (isset($jugar_juego)) {//Si se pulsó el botón de jugar, sucede lo siguiente
        if (isset($juego_usuario) && isset($dificultad_usuario)) {//Si se puso el juego y la dificultad:
            if ($juego_usuario == "sinonimos") {//Si el juego que se eligió es el de los sinónimos, se pone la dificultad puesta por el usuario y se va a la página de "juego_sinonimos.php"
                switch($dificultad_usuario) {
                    case "facil":
                        $dificultad = "facil";
                        break;
                    case "medio":
                        $dificultad = "medio";
                        break;
                    case "dificil":
                        $dificultad = "dificil";
                }
                header("Location: Sinonimos/juego_sinonimos.php?dificultad=" . $dificultad);
            }
            if ($juego_usuario == "antonimos") {//Si el juego que se eligió es el de los antónimos, se pone la dificultad puesta por el usuario y se va a la página de "juego_antonimos.php"
                switch($dificultad_usuario) {
                    case "facil":
                        $dificultad = "facil";
                        break;
                    case "medio":
                        $dificultad = "medio";
                        break;
                    case "dificil":
                        $dificultad = "dificil";
                }
                header("Location: Antonimos/juego_antonimos.php");
            }
        }
        if (!isset($juego_usuario)) {//Si no se eligió el juego, sale un mensaje de error que pide eligir un juego
            echo "<div class='error'>Elixe un xogo</div>";
        }
        if (!isset($dificultad_usuario)) {//Si no se eligió la dificultad, sale un mensaje de error que pide eligir una dificultad
            echo "<div class='error'>Elixe unha dificultade</div>";
        } 
    }
}

/**
  * Nombre: irPaginaAnterior()
  * Descripción: Dependiendo del botón que se pulse en el menú, va a la página de menú correspondiente
  */
function irPaginaAnterior() {
    if (isset($_POST['volver_sinonimos']) || isset($_POST['volver_antonimos'])) {//Si se pulsa el botón de "volver al menú" en el juego de los sinónimos o antónimos se va a la página del menú principal
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
        for ($cont = 1; $cont <= count($array); $cont++) {//Cada vez que se ejecuta el bucle se ponen las palabras del input "palabra$cont" y el cuadro del texto al lado de cada uno
            echo "<label class='palabra'>" . $cont . " - " . $_POST['palabra' . $cont] . "</label><br/>";
            echo "<input id='resultado$cont' name='resultado$cont' type='text' value='" . $_POST["resultado" . $cont] . "' autocomplete='off'><br/><br/>";
            echo "<input id='palabra$cont' name='palabra$cont' type='hidden' value='" . $_POST['palabra' . $cont] . "'>";
        }
    } else {//De lo contrario, sucede lo siguiente
        for ($cont = 1; $cont <= count($array); $cont++) {//Cada vez que se ejecuta el bucle se ponen las palabras del array "array" y el cuadro del texto al lado de cada uno
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
         * Cada vez que se ejecuta este bucle se guardan las palabras del formulario en el array "$lista",
         * eliminando anteriormente espacios al principio y fin de las mismas
         */
            for ($cont = 1; $cont <= $longitud; $cont++) {
                $palabra = trim($_POST['palabra' . $cont]);
                $lista[] = $palabra;
            }
            break;
        case "resultado"://En el caso de que el tipo sea "resultado":
        /**
         * Cada vez que se ejecuta este bucle se guardan los resultados del formulario puestos por los usuarios en el array "$lista",
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
    $correcto = true;//Por predeterminado todos los campos están cubiertos y sin ningún fallo (verdadero)

    for ($cont = 1; $cont <= count($palabras); $cont++) {//Cada vez que se ejecuta este bucle:
        $resultado = trim($_POST['resultado' . $cont]);//Se guarda el resultado eliminando espacios en blanco al principio y fin de la cadena correspondiente
        if (empty($resultado)) {//Si el resultado está vacío, se cambia el valor de la variable "$correcto" a "false" (falso)
            $correcto = false;
        }
    }
    return $correcto;//Se devuelve el valor de la variable "$correcto"
}

/**
 * Nombre: puntuacionJugador()
 * Descripcion: Dependiendo de si el jugador falla o no, se acumula puntos de intentos o se va a la página de completado y login
 */
function puntuacionJugador($todo_correcto) {
    global $num_intentos;//Se recoge la variable global "$num_intentos"

    $correcto = true;//Por predeterminado todo fue con éxito

    for ($cont = 1; $cont <= count($todo_correcto); $cont++) {//Cada vez que se ejecuta el bucle:
        if ($todo_correcto[$cont - 1] == false) {//Si el "array" en la posición indicada equivale a "false", se pone "$correcto" a falso (false)
            $correcto = false;
        }
    }
    
    if ($correcto) {//Si la variable "$correcto" es true, se va a la página de completado y login
        include("../completado.php");
    } else {//Por lo contrario, se suma uno al número de intentos
        $intentos++;
    }
}

/**
 * Nombre: guardarPuntuacion()
 * Descripcion: Se guarda la puntuación del jugador junto con su nombre y contraseña
 */
function guardarPuntuacion($lista_jugadores) {
    global $guardar_puntuacion, $nombre_jugador, $contrasena_jugador, $dificultad_usuario, $num_intentos;//Se cogen las variables globales "$guardar_puntuacion", "$nombre_jugador", "$contrasena_jugador" y "$num_intentos"

    $datos = array($nombre_jugador, $contrasena_jugador, $dificultad_usuario, $num_intentos);//Se guardan los datos del jugador en un array ($datos)

    if (isset($guardar_puntuacion)) {//Si se pulsó el botón de guardar puntuación, sucede lo siguiente
        if (!empty($nombre_jugador) && !empty($contrasena_jugador)) {//Si no está vacío los campos de nombre y contraseña:
            $fp = fopen($lista_jugadores, "a");//Se abre el archivo en modo escritura desde final del fichero añadiendo al mismo

            if (!$fp = fopen($lista_jugadores, "a")) {//Si no puede abrir el fichero sale un mensaje de error
                echo "<div class='error'>Non se pode ler o ficheiro</div>";
            } else {//Por el contrario, se pone la información en el archivo .csv, se cierra y lleva a la página de inicio
                fputcsv($fp, $datos);
                fclose($fp);
                header("Location: index.php");
            }
        } else {//Por el contrario, sale un mensaje de error
            echo "<div class='error'>Tes que cubrir os dous campos</div>";
        }
    }
}

/**
 * Nombre: consultarPuntuacion()
 * Descripción: Consulta la puntuación de un determinado usuario si existe en el archivo
 */
function consultarPuntuacion() {
    global $guardar_puntuacion, $nombre_jugador, $contrasena_jugador;//Se cogen las variables globales "$guardar_puntuacion", "$nombre_jugador" y "$contrasena_jugador"

    if (isset($guardar_puntuacion)) {//Si se pulsó el botón de consultar puntuación:
        if (!empty($nombre_jugador) && !empty($contrasena_jugador)) {//Si no están vacíos los dos campos se ejecuta lo siguiente
            $fp = fopen($lista_jugadores, "a");//Se abre el fichero en modo escritura desde el final añadiendo a lo que ya había en el fichero

            if (!$fp = fopen($lista_jugadores, "a")) {//Si no existe o no se puede abrir, muestra un mensaje de error
                echo "<div class='error'>Non se pode ler o ficheiro</div>";
            } else {//Por el contrario:
                while (!feof($fp)) {//Mientras el puntero interno no se localize al final del fichero:
                    $jugador = fgetcsv($fp);//Se coge la información de un jugador
                    if ($jugador[0] == $nombre_jugador && $jugador[1] == $contrasena_jugador) {//Si concuerda con lo que escribió el usuario, se muestra el nombre y el número de intentnos de ese jugador
                        echo "<ul>";
                            echo "<li>Nombre: " . $jugador[0] . "</li>";
                            echo "<li>Dificultad: " . $jugador[2] . "</li>";
                            echo "<li>Número de intentos: " . $jugador[3] . "</li>";
                        echo "</ul>";
                    }
                }
                fclose($fp);//Se cierra el fichero
            }
        } else {//Por el contrario, se muestra un mensaje de error para avisar de que es necesario cubrir los dos campos
            echo "<div class='error'>Tes que cubrir os dous campos</div>";
        }
    }
}

/**
 * Nombre: corregirPalabra()
 * Descripción: Corrige el resultado del usuario a partir del archivo ($archivo) indicado, comprobando si la palabra ($palabra) del formulario coincide con la
 * primera palabra de cada linea del fichero, y si es cierto comparando el resultado ($resultado) con la palabra si lo contiene en su propia línea o no
 */
function corregirPalabra($archivo, $palabra, $resultado) {
    global $indice, $num_intentos, $dificultad;//Se recoge la variable global "$indice", "$num_intentos" y "$dificultad"
    $validacion = "/^[A-Za-z]+$/";//La expresión regular para comprobar que el resultado sólo contiene letras
    $correcto = false;//Por predeterminado el resultado no concuerda con la palabra del formulario (falso)
    $resultado = strtolower($resultado);//Convierte la cadena entera en minúsculas para evitar problemas de comparación
    $dificultad = trim($dificultad);

    if (preg_match($validacion, $resultado)) {//Si el patrón coincide con el resultado, se realiza lo siguiente
        $fp = fopen($archivo, "r");//Se abre el fichero correspondiente en modo lectura desde el principio

        if (!$fp = fopen($archivo, "r")) {//Si no se abrió el fichero con éxito, se imprime un mensaje de error
            echo "<div class='error'>Non se pode ler o ficheiro</div>";
        } else {//De lo contrario, sucede lo siguiente:
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
                        return true;
                    } else {//Por el contrario, puede suceder lo siguiente:
                        switch($dificultad) {//Dependiendo de la dificultad, sale un mensaje de error u otro
                            case "facil"://Si es facil, se ofrece una pista con las tres primeras letras de todas las palabras
                                $cadena = "<div class='error'>" . $indice . " - Incorrecto, as opcións correctas empezan por: ";
                                for ($a = 1; $a < count($datos); $a++) {//Bucle con las tres primeras palabras de todas las posibles soluciones que se concatena a la cadena anterior
                                    $cadena .= substr($datos[$a], 0, 4) . ", ";
                                }
                                $cadena .= "</div>";//Se cierra cadena con la etiqueta "div" para que quede el mensaje en un único bloque
                                echo $cadena;//Se imprime la cadena
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                                break;//Se realiza un "break" para no ejecutar lo siguiente si no cumple la condición
                            case "medio"://Si es medio, se ofrece una pista con la primera letra de todas las palabras
                                $cadena = "<div class='error'>" . $indice . " - Incorrecto, as opcións correctas empezan por: ";
                                for ($a = 1; $a < count($datos); $a++) {//Bucle con la primera palabra de todas las posibles soluciones que se concatena a la cadena anterior
                                    $cadena .= substr($datos[$a], 0, 2) . ", ";
                                }
                                $cadena .= "</div>";//Se cierra cadena con la etiqueta "div" para que quede el mensaje en un único bloque
                                echo $cadena;//Se imprime la cadena
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                                break;//Se realiza un "break" para no ejecutar lo siguiente si no cumple la condición
                            case "dificil"://Si es dificil, simplemente sale un mensaje de error de que está mal
                                echo "<div class='error'>" . $indice . " - Incorrecto</div>";
                                $indice++;//Se suma uno al índice de palabra para la siguiente
                        }
                        return false;
                    } 
                }
            }
        fclose($fp);//Se cierra la instancia de apertura del fichero
        }
    } else {//Por el contrario, se muestra un mensaje de error conforme el campo sólo debe contener letras
        echo "<div class='error'>" . $indice . " - O campo debe conter só letras</div>";
        $indice++;//Se suma uno al índice de palabra para la siguiente
        return false;
    }
}

