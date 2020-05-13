<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 30 de Marzo de 2020
 * Descripción: Página de login
 * Versión: 1.2
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/DAO.class.php';//Se añade como requerimiento la clase de acceso a datos (DAO)
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

if (isset($_POST['nombre'])) {//Si tiene algún valor el nombre del usuario, se guarda en la variable "$nombre"
    $nombre = trim($_POST['nombre']);
}

if (isset($_POST['contrasena'])) {//Si tiene algún valor la contraseña del usuario, se guarda en la variable "$contrasena"
    $contrasena = trim($_POST['contrasena']);
}

if (isset($_POST['unirse'])) {//Si tiene algún valor el botón de "Unirse", se guarda en la variable "$unirse"
    $unirse = trim($_POST['unirse']);
}

if (isset($_POST['volver'])) {//Si tiene algún valor el botón de "Volver al menú", se guarda en la variable "$volver"
    $volver = trim($_POST['volver']);
}
/**
 * Nombre: comprobarNombre()
 * Descripción: Comprueba el nombre del usuario
 */
function comprobarNombre($nombre_usuario) {
    $expresion = "/^[A-Za-z]{1,10}$/";//Expresión regular a comprobar en el nombre

    if (!preg_match($expresion, $nombre_usuario)) {//Si no coincide el nombre con la expresión, devuelve una cadena con el mensaje de error
        return "<div class='error'>Só pódense poñer de 1 a 10 letras</div>";
    } else {//Por el contrario, devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarContrasena()
 * Descripción: Comprueba la contraseña del usuario
 */
function comprobarContrasena($contrasena_usuario) {
    $expresion = "/^[A-Za-z0-9]{1,30}$/";//Expresión regular a comprobar en la contraseña

    if (!preg_match($expresion, $contrasena_usuario)) {//Si no coincide la contraseña con la expresión, devuelve una cadena con el mensaje de error
        return "<div class='error'>A contrasinal debe conter entre 1 e 30 caracteres, que poden ser letras ou números</div>";
    } else {//Por el contrario, devuelve una cadena vacía
        return "";
    }
}

/**
 * Nombre: comprobarFormulario()
 * Descripción: Dependiendo de si el usuario cubre bien el formulario o no, devuelve una cosa u otra
 */
function comprobarFormulario($comprobacion_nombre, $comprobacion_contrasena) {

    if (empty($comprobacion_nombre) && empty($comprobacion_contrasena)) {//Si están correctas todas las comprobaciones, devuelve verdadero (true)
        return true;
    } else {//Por el contrario, devuelve falso (false)
        return false;
    }
}

/**
 * Nombre: iniciarSesionUsuario()
 * Descripción: Se inicializa la sesión de usuario
 */
function iniciarSesionUsuario($nombre_usuario, $contrasena_usuario) {
    $tabla = "usuarios";//Tabla a donde leer los datos
    $campos = array("nome", "contrasinal", "rol", "dataAlta", "bloqueado");//Array con los campos a leer

    $usuarios = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" a partir de la clase "DAO" con los parámetros "$tabla" y $campos" y se recoge el resultado en la variable "$usuarios"

    /**
     * Se ejecuta la función "comprobarUsuario" con los parámetros "$usuarios", "$nombre_usuario" y "$contrasena_usuario" y se recoge el resultado en la variable
     * "$comprobacion_usuario"
     */
    $comprobacion_usuario = comprobarUsuario($usuarios, $nombre_usuario, $contrasena_usuario);

    /**
     * Si la variable es un array, se instancia un objeto de la clase "Usuario" con los datos leídos de la base de datos, se inicializa la sesión de usuario y se lleva
     * a la página de inicio de la actividad
     */
    if (is_array($comprobacion_usuario)) {
        $usuario = new Usuario($comprobacion_usuario[0], $comprobacion_usuario[1], $comprobacion_usuario[2], $comprobacion_usuario[3], $comprobacion_usuario[4]);
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
    } else {//Por el contrario, devuelve el mensaje de error correspondiente
        return $comprobacion_usuario;
    }
}

/**
 * Nombre: comprobarUsuario()
 * Descripción: Comprueba si el usuario existe en la base de datos
 */
function comprobarUsuario($lista_usuarios, $nombre_usuario, $contrasena_usuario) {
    for ($cont = 0; $cont < count($lista_usuarios); $cont++) {//Cada vez que se ejecuta este bucle:
        /**
         * Si el nombre y contraseña de usuario coincide con el de la base de datos, devuelve la información del mismo
         */
        if ($lista_usuarios[$cont]["nome"] === $nombre_usuario && hash_equals($lista_usuarios[$cont]["contrasinal"], crypt($contrasena_usuario, $lista_usuarios[$cont]["contrasinal"]))) {
            return $lista_usuarios[$cont];
        }
    }
    /**
     * Por el contrario, devuelve un mensaje de error
     */
    return "<div class='error'>O usuario especificado non existe</div>";
}

if (isset($volver)) {//Si se pulsa en el botón de "Volver al menú", se va a la página de inicio de la actividad
    header("Location: index.php");
}

if (isset($_SESSION['usuario'])) {//Si existe la sesión de usuario
    $usuario = $_SESSION['usuario'];//Se recoge la información del usuario en sesión y se guarda en esta variable ($usuario)
    if ($usuario->getRol() === 1) {//Si el rol del usuario es igual a 1 (es administrador), se le devuelve a la página de administración
      header("Location: administracion.php");
    } else {//Por el contrario, se le pasa ese dato a Smarty
        $smarty->assign('sesion_usuario', $usuario);
    }
}

if (isset($unirse)) {//Si se pulsó el botón de "Unirse":
    $comprobacion_nombre = comprobarNombre($nombre);//Se ejecuta la función "comprobarNombre()" con el parámetro "$nombre" y se recoge el resultado en esta variable
    $comprobacion_contrasena = comprobarContrasena($contrasena);//Se ejecuta la función "comprobarContrasena()" con el parámetro "$contrasena" y se recoge el resultado en esta variable
    
    /**
     * Se ejecuta la función "comprobarFormulario()" con los parámetros "$comprobacion_nombre" y "$comprobacion_contrasena" y se recoge el resultado en esta variable
     */
    $formulario_correcto = comprobarFormulario($comprobacion_nombre, $comprobacion_contrasena);

    if ($formulario_correcto) {//Si se registró el usuario correctamente:
        $usuario_error = iniciarSesionUsuario($nombre, $contrasena);//Se ejecuta la función "iniciarSesionUsuario()" con los parametros "$nombre", "$contrasena" y "$correo", y se guarda el valor de retorno en esta variable
    }

    if (!empty($comprobacion_nombre)) {//Si tiene algo de valor esta variable, se le pasa ese dato a Smarty
        $smarty->assign('error_nombre', $comprobacion_nombre);
    }

    if (!empty($comprobacion_contrasena)) {//Si tiene algo de valor esta variable, se le pasa ese dato a Smarty
        $smarty->assign('error_contrasena', $comprobacion_contrasena);
    }

    if (isset($usuario_error)) {//Si tiene algo de valor esta variable, se le pasa ese dato a Smarty
        $smarty->assign('error_usuario', $usuario_error);
    }
}

$smarty->display('login.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente