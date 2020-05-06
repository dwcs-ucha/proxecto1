<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 10 de Marzo de 2020
 * Descripción: Administración del juego de los sinónimos y antónimos
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/DAO.class.php';//Se añade como requerimiento la clase de acceso a datos (DAO)
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

session_start();//Se inicializa la sesión

if (isset($_POST['anadir'])) {//Si tiene algo de valor, se le asigna ese mismo valor a esta variable ($anadir_palabra)
    $anadir_palabra = $_POST['anadir'];
}

if (isset($_POST['modificar'])) {//Si tiene algo de valor, se le asigna ese mismo valor a esta variable ($modificar_palabra)
    $modificar_palabra = $_POST['modificar'];
}

if (isset($_POST['borrar'])) {//Si tiene algo de valor, se le asigna ese mismo valor a esta variable ($borrar_palabra)
    $borrar_palabra = $_POST['borrar'];
}

if (isset($_POST['nombre_nuevo'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($nombre_nuevo)
    $nombre_nuevo = trim($_POST['nombre_nuevo']);
}

if (isset($_POST['tipo_nuevo'])) {//Si tiene algo de valor, se le asigna ese mismo valor a esta variable ($tipo_nuevo)
    $tipo_nuevo = $_POST['tipo_nuevo'];
}

if (isset($_POST['lista_nueva'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($lista_nueva)
    $lista_nueva = trim($_POST['lista_nueva']);
}

if (isset($_POST['palabra_correcta_nueva'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($palabra_correcta_nueva)
    $palabra_correcta_nueva = trim($_POST['palabra_correcta_nueva']);
}

if (isset($_POST['palabra_elegida_modificar'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($palabra_correcta_nueva)
    $palabra_elegida_modificar = trim($_POST['palabra_elegida_modificar']);
}

if (isset($_POST['campo_modificar'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($palabra_correcta_nueva)
    $campo_modificar = trim($_POST['campo_modificar']);
}

if (isset($_POST['valor_modificar'])) {//Si tiene algo de valor, se limpian espacios en blanco al principio y final de la cadena y se le asigna ese mismo valor a esta variable ($palabra_correcta_nueva)
    $valor_modificar = trim($_POST['valor_modificar']);
}

if (isset($_POST['palabra_elegida_borrar'])) {//Si tiene algo de valor, se le asigna ese mismo valor a esta variable ($palabra_elegida_borrar)
    $palabra_elegida_borrar = $_POST['palabra_elegida_borrar'];
}
/**
 * Nombre: comprobarNombre()
 * Descripción: Comprueba el nombre de la palabra
 */
function comprobarNombre($nombre_palabra) {
    $expresion = "/^[A-Za-z]{1,20}$/";//Expresión regular a comprobar en el nombre

    if (!preg_match($expresion, $nombre_palabra)) {//Si no coincide el nombre con la expresión, devuelve una cadena con el mensaje de error
        return "<div class='error'>Sólo se pueden poner de 1 a 20 letras</div>";
    } else {//Por el contrario, devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarNombreLista()
 * Descripción: Comprueba el nombre de la palabra en una lista
 */
function comprobarNombreLista($nombre_palabra) {
    if (!isset($nombre_palabra)) {//Si no se puso ningún tipo, se devuelve un mensaje de error
        return "<div class='error'>Se debe especificar un nombre</div>";
    } else {//Por el contrario, se devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarTipo()
 * Descripción: Comprueba el tipo de la palabra
 */
function comprobarTipo($tipo_palabra) {
    if (!isset($tipo_palabra)) {//Si no se puso ningún tipo, se devuelve un mensaje de error
        return "<div class='error'>Se debe poner un tipo</div>";
    } else {//Por el contrario, se devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarLista()
 * Descripción: Comprueba la lista de valores de la palabra
 */
function comprobarLista($lista_palabra) {
    $expresion = "/^[A-Za-z,]{1,60}$/";//Expresión regular a comprobar en la lista

    if (!preg_match($expresion, $lista_palabra)) {//Si no coincide la lista con la expresión, devuelve una cadena con el mensaje de error
        return "<div class='error'>Sólo se pueden poner de 1 a 60 letras</div>";
    } else {//Por el contrario, devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarFormulario()
 * Descripción: Comprueba que el formulario se haya hecho correctamente
 */
function comprobarFormulario($comprobacion_nombre, $comprobacion_tipo, $comprobacion_lista, $comprobacion_palabra_correcta) {

    if (empty($comprobacion_nombre) && empty($comprobacion_tipo) && empty($comprobacion_lista) && empty($comprobacion_palabra_correcta)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Nombre: mostrarPalabrasTabla()
 * Descripción: Muestra las palabras en la tabla
 */
function mostrarPalabrasTabla($tabla, $campos) {
    $resultado = "";//Variable donde se da el formato para luego mostrarlo por pantalla
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$lista"

    for ($cont = 0; $cont < count($lista); $cont++) {//Cada vez que se ejecuta este bucle:
        /**
        * Se concatena cada dato de cada campo de la tabla de la base de datos con cada celda de la tabla
        */
        $resultado .= "<tr><td>" . $lista[$cont]["nombre"] . "</td><td>" . $lista[$cont]["tipo"] . "</td><td>" . $lista[$cont]["valores"] . "</td><td>" . $lista[$cont]["palabra_correcta"] . "</td></tr>";
    }

    return $resultado;//Se devuelve la cadena formateada
}

/**
 * Nombre: mostrarPalabrasLista
 * Descripción: Muestra las palabras en una lista
 */
function mostrarPalabrasLista($tabla, $campos) {
    $resultado = "";//Variable donde se da el formato para luego mostrarlo por pantalla
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$lista"

    for ($contA = 0; $contA < count($lista); $contA++) {//Cada vez que se ejecuta este bucle:
        /**
        * Se concatena el nombre de cada palabra en la lista
        */
        $resultado .= "<option value='" . $lista[$contA]["nombre"] . "'>" . ucfirst($lista[$contA]["nombre"]) . "</option>";
    }

    return $resultado;//Se devuelve la cadena formateada
}

/**
 * Nombre: comprobarPalabra()
 * Descripción: Comprueba si la palabra existe
 */
function comprobarPalabra($nombre, $lista) {
    for ($cont = 0; $cont < count($lista); $cont++) {//Cada vez que se ejecuta este bucle:
        if ($lista[$cont][0] === $nombre) {//Si la palabra de la lista coincide con la puesta por el usuario, devuelve verdadero (true)
            return true;
        }
    }
    return false;//Por el contrario, devuelve falso (false)
}

/**
 * Nombre: anadirPalabra();
 * Descripción: Se añade la palabra correspondiente
 */
function anadirPalabra($nombre, $tabla, $campos, $valores) {
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$lista"

    $comprobar_palabra = comprobarPalabra($nombre, $lista);//Se ejecuta la función "comprobarPalabra()" con los parámetros "$nombre" y "$lista", y se recoge su valor en esta variable ($comprobar_palabra)

    if ($comprobar_palabra) {//Si la palabra existe, se devuelve un mensaje de error
        return "<div class='error'>Ya existe una palabra con ese nombre</div>";
    } else {//Por el contrario, se escribe esa palabra ejecutando la función "escribirDatos()" a partir de la clase "DAO" con los parámetros "$tabla", "$campos" y "$valores"
        DAO::escribirDatos($tabla, $campos, $valores);
    }
}

/**
 * Nombre: modificarPalabra
 * Descripción: Se modifica el valor del campo de la palabra correspondiente
 */
function modificarPalabra($nombre, $tabla, $campos, $campos_modificaciones, $valores_modificaciones, $campos_condiciones, $tipos_condiciones, $valores_condiciones) {
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$lista"

    $comprobar_palabra = comprobarPalabra($nombre, $lista);//Se ejecuta la función "comprobarPalabra()" con los parámetros "$nombre" y "$lista", y se recoge su valor en esta variable ($comprobar_palabra)

    if (!$comprobar_palabra) {//Si la palabra no existe, se devuelve un mensaje de error
        return "<div class='error'>No existe la palabra especificada</div>";
    } else {//Por el contrario, se modifica esa palabra ejecutando la función "modificarDatos()" a partir de la clase "DAO" con los parámetros "$tabla", "$campos_modificaciones", "$valores_modificaciones", "$campos_condiciones", "$tipos_condiciones" y "$valores_condiciones"
        DAO::modificarDatos($tabla, $campos_modificaciones, $valores_modificaciones, $campos_condiciones, $tipos_condiciones, $valores_condiciones);
    }
}

/**
 * Nombre: borrarPalabra()
 * Descripción: Se borra la información de la palabra correspondiente
 */
function borrarPalabra($nombre, $tabla, $campos, $campos_condiciones, $tipos_condiciones, $valores_condiciones) {
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y "$campos", y se recoge el resultado en la variable "$lista"

    $comprobar_palabra = comprobarPalabra($nombre, $lista);//Se ejecuta la función "comprobarPalabra()" con los parámetros "$nombre" y "$lista", y se recoge su valor en esta variable ($comprobar_palabra)

    if (!$comprobar_palabra) {//Si la palabra no existe, se devuelve un mensaje de error
        return "<div class='error'>No existe la palabra especificada</div>";
    } else {//Por el contrario, se elimina esa palabra ejecutando la función "borrarDatos()" a partir de la clase "DAO" con los parámetros "$tabla", "$campos_condiciones", "$tipos_condiciones" y "$valores_condiciones"
        DAO::borrarDatos($tabla, $campos_condiciones, $tipos_condiciones, $valores_condiciones);
    }
}

if (!isset($_SESSION['usuario'])) {//Si no está abierta la sesión de usuario, se lleva a la página de inicio de la actividad
    header("Location: index.php");
} else {//De lo contrario:
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 0) {//Si el rol del usuario es igual a 0 (es usuario), se le devuelve a la página de inicio de la actividad
        header("Location: index.php");
    } else {//Por el contrario, se le pasa ese dato a Smarty
        $smarty->assign('sesion_usuario', $usuario);
    }
}

$seleccion_campos = array("nombre", "tipo", "valores", "palabra_correcta");//Array con los campos a elegir en la base de datos

$lista_palabras = mostrarPalabrasTabla("actividade10", $seleccion_campos);//Se ejecuta la función "mostrarPalabrasTabla()" con los parámetros "actividade10" y "$seleccion_campos", y se recoge el resultado en esta variable ($lista_palabras)

$lista_campos = mostrarPalabrasLista("actividade10", $seleccion_campos);//Se ejecuta la función "mostrarPalabrasLista()" con los parámetros "actividade10" y "$seleccion_campos", y se recoge el resultado en esta variable ($lista_campos)


if (isset($anadir_palabra)) {//Si se pulsó en el botón de "Añadir Palabra":
    $nombre_corregido = filter_var($nombre_nuevo, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);//Se limpia el nombre de la palabra
    $lista_corregida = filter_var($lista_nueva, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);//Se limpia la lista con los valores de la palabra

    $comprobacion_nombre = comprobarNombre($nombre_corregido);//Se ejecuta la función "comprobarNombre()" con el parámetro "$nombre_corregido" y se recoge el resultado en la variable "$comprobacion_nombre"
    $comprobacion_tipo = comprobarTipo($tipo_nuevo);//Se ejecuta la función "comprobarTipo()" con el parámetro "$tipo_palabra" y se recoge el resultado en la variable "$comprobacion_tipo"
    $comprobacion_lista = comprobarLista($lista_corregida);//Se ejecuta la función "comprobarLista()" con el parámetro "$lista_corregida" y se recoge el resultado en la variable "$comprobacion_lista"
    $comprobacion_palabra_correcta = comprobarNombre($palabra_correcta_nueva);//Se ejecuta la función "comprobarNombre()" con el parámetro "$nombre_palabra_correcta" y se recoge el resultado en la variable "$comprobacion_palabra_correcta"

    /**
     * Se ejecuta la función "comprobarFormulario" con los parámetros "$nombre_palabra", "$tipo_palabra", "$lista_palabra", "$nombre_palabra_correcta", "$campos" y "$valores", y se recoge el resultado en la variable "$comprobacion_formulario"
     */
    $comprobacion_formulario = comprobarFormulario($comprobacion_nombre, $comprobacion_tipo, $comprobacion_lista, $comprobacion_palabra_correcta);

    if ($comprobacion_formulario) {//Si no existe ningún mensaje de error:
        $lista_valores_anadir = array($nombre_nuevo, $tipo_nuevo, $lista_nueva, $palabra_correcta_nueva);//Array con los valores a insertar en los campos de la tabla
        /**
         * Se ejecuta la función "anadirPalabra()" con los parámetros "$lista_valores[0]", "actividade10", "$seleccion_campos" y "$lista_valores_anadir", y se recoge el resultado en la variable "$mensaje_error_anadir"
         */
        $mensaje_error_anadir = anadirPalabra($lista_valores_anadir[0], "actividade10", $seleccion_campos, $lista_valores_anadir);

        if (isset($mensaje_error_anadir)) {//Si esta variable tiene algún mensaje de error:
            $smarty->assign("mensaje_error_anadir", $mensaje_error_anadir);//Se asigna el valor de "$mensaje_error_anadir" a esta etiqueta (mensaje_error_anadir) y se pasa a Smarty
        } else {//Por el contrario, se refresca la página para aplicar los cambios nuevos
            header("Refresh: 0");
        }
    }

    if (!empty($comprobacion_nombre)) {//Si esta variable tiene algún mensaje de error:
        $smarty->assign("error_nombre_anadir", $comprobacion_nombre);//Se asigna el valor de "$comprobacion_nombre" a esta etiqueta (error_nombre_anadir) y se pasa a Smarty
    }
    if (!empty($comprobacion_tipo)) {//Si esta variable tiene algún mensaje de error:
        $smarty->assign("error_tipo_anadir", $comprobacion_tipo);//Se asigna el valor de "$comprobacion_tipo" a esta etiqueta (error_tipo_anadir) y se pasa a Smarty
    }
    if (!empty($comprobacion_lista)) {//Si esta variable tiene algún mensaje de error:
        $smarty->assign("error_lista_anadir", $comprobacion_lista);//Se asigna el valor de "$comprobacion_lista" a esta etiqueta (error_lista_anadir) y se pasa a Smarty
    }
    if (!empty($comprobacion_palabra_correcta)) {//Si esta variable tiene algún mensaje de error:
        $smarty->assign("error_palabra_correcta_anadir", $comprobacion_palabra_correcta);//Se asigna el valor de "$comprobacion_palabra_correcta" a esta etiqueta (error_palabra_correcta_anadir) y se pasa a Smarty
    }
}

if (isset($modificar_palabra)) {//Si se pulsó en el botón de "Modificar Palabra":
    $valor_corregido = filter_var($valor_modificar, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);//Se limpia el nombre del valor

    $comprobacion_valor_modificar = comprobarLista($valor_corregido);//Se ejecuta la función "comprobarLista()" con el parámetro "$nombre_corregido" y se recoge el resultado en la variable "$comprobacion_nombre_modificar"

    if (empty($comprobacion_valor_modificar)) {
        $campos_modificaciones = array($campo_modificar);//Array con los campos a modificar
        $valores_modificaciones = array($valor_corregido);//Array con los valores nuevos a meter en esos campos

        $campos_condiciones_modificar = array("nombre");//Array con los campos de condición
        $tipos_condiciones_modificar = array("=");//Array con los tipos de condición
        $valores_condiciones_modificar = array($palabra_elegida_modificar);//Array con los valores de condición

        /**
         * Se ejecuta la función "modificarPalabra()" con los parámetros "$valores_condiciones_modificar[0]", "actividade10", "$seleccion_campos", 
         * "$campos_modificaciones", "$valores_modificaciones", "$campos_condiciones_modificar", "$tipos_condiciones_modificar" y "$valores_condiciones_modificar", 
         * y se recoge el resultado en la variable "$mensaje_error_modificar"
         */
        $mensaje_error_modificar = modificarPalabra($valores_condiciones_modificar[0], "actividade10", $seleccion_campos, $campos_modificaciones, $valores_modificaciones, $campos_condiciones_modificar, $tipos_condiciones_modificar, $valores_condiciones_modificar);
        if (isset($mensaje_error_modificar)) {//Si tiene algún mensaje de error:
            $smarty->assign("mensaje_error_modificar", $mensaje_error_modificar);//Se asigna el valor de "$mensaje_error_modificar" a esta etiqueta (mensaje_error_modificar) y se pasa a Smarty
        } else {//Por el contrario, se refresca la página para aplicar los cambios nuevos
            header("Refresh: 0");
        }
    } else {//Por el contrario:
        $smarty->assign("error_valor_modificar", $comprobacion_valor_modificar);//Se asigna el valor de "$comprobacion_valor_modificar" a esta etiqueta (error_valor_modificar) y se pasa a Smarty
    }
}

if (isset($borrar_palabra)) {//Si se pulsó en el botón de "Borrar Palabra":
    $comprobacion_palabra_elegida_borrar = comprobarNombreLista($palabra_elegida_borrar);//Se ejecuta la función "comprobarNombreLista()" con el parámetro "$palabra_elegida_borrar" y se recoge el resultado en la variable "$comprobacion_palabra_elegida_borrar"

    if (empty($comprobacion_palabra_elegida_borrar)) {//Si no tiene ningún mensaje de error:
        $campos_condiciones_borrar = array("nombre");//Campos de condición para el borrado de datos
        $tipos_condiciones_borrar = array("=");//Tipos de condición para el borrado de datos
        $valores_condiciones_borrar = array($palabra_elegida_borrar);//Valores de condición para el borrado de datos

        /**
         * Se ejecuta la función "borrarPalabra()" con los parámetros "$valores_condiciones_borrar[0]", "actividade10", "$seleccion_campos", "$campos_condiciones_borrar", "$tipos_condiciones_borrar" y "$valores_condiciones_borrar"
         */
        $mensaje_error_borrar = borrarPalabra($valores_condiciones_borrar[0], "actividade10", $seleccion_campos, $campos_condiciones_borrar, $tipos_condiciones_borrar, $valores_condiciones_borrar);
        if (isset($mensaje_error_borrar)) {//Si tiene algún mensaje de error:
            $smarty->assign("mensaje_error_borrar", $mensaje_error_borrar);//Se asigna el valor de "$mensaje_error_borrar" a esta etiqueta (mensaje_error_borrar) y se pasa a Smarty
        } else {//Por el contrario, se refresca la página para aplicar los cambios nuevos
            header("Refresh: 0");
        }
        
    } else {//Por el contrario:
        $smarty->assign("error_nombre_borrar", $comprobacion_palabra_elegida_borrar);//Se asigna el valor de "$comprobacion_palabra_elegida_borrar" a esta etiqueta (error_nombre_borrar) y se pasa a Smarty
    }
}

$smarty->assign("lista_palabras", $lista_palabras);//Se asigna el valor de "$lista_palabras" a esta etiqueta (lista_palabras) y se pasa a Smarty
$smarty->assign("lista_campos", $lista_campos);//Se asigna el valor de "$lista_campos" a esta etiqueta (lista_campos) y se pasa a Smarty

$smarty->display("administracion.tpl");//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente