<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 9 de Marzo de 2020
 * Descripción: Juego de los sinónimos
 */
require_once '../../iniciarsmarty.inc.php';//Se añade como requerimiento el motor de plantillas "Smarty"
require_once '../../Modelo/DAO.class.php';//Se añade como requerimiento la clase de acceso a datos (DAO)
require_once '../../Modelo/Usuario.class.php';//Se añade como requerimiento la clase de usuarios

session_start();//Se inicializa la sesión

if ($_POST['corregir']) {//Si tiene algo de valor, se pone en esta variable
    $corregir = $_POST['corregir'];
}

/**
 * Nombre: cogerDatosEspecificos
 * Descripción: Coge los datos de la base de datos específicos y se guardan en un array
 */
function cogerDatosEspecificos($tabla, $campos, $tipo_datos) {
  $datos = array();//El array que guarda los datos de la base de datos
  $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" de la clase "DAO" con los parámetros "$tabla" y "$campos" y se recoge el resultado en esta variable ($lista)
  $tipo_palabra = substr($_SESSION['juego'], 0, ($_SESSION['juego'] - 1));//Se separa la última "s" de "sinonimos/antonimos" y se recoge el resto (sinonimo/antonimo)

  for ($cont = 0; $cont < count($lista); $cont++) {//Cada vez que se ejecuta este bucle:
    if ($lista[$cont]["tipo"] === $tipo_palabra) {//Si el tipo de palabra es un sinónimo o un antónimo:
      switch ($tipo_datos) {//Comprobación del tipo de dato:
        case "palabras"://Si es este valor, se guarda la palabra en el array
          $datos[] = $lista[$cont]["nombre"];
          break;
        case "palabras_correctas"://Si es este valor, se guarda la palabra correcta en el array
          $datos[] = $lista[$cont]["palabra_correcta"];
          break;
        case "valores"://Si es este valor:
          $valores = explode(",", $lista[$cont]["valores"]);//Se guarda el conjunto de valores en forma de array
          switch($_SESSION['dificultad']) {//Se comprueba la dificultad:
            case "facil"://Si la dificultad es "facil", se guardan sólo los dos primeros valores, se desordenan y se mete en el array ($datos)
              $valores_facil = array();
              array_push($valores_facil, $valores[0], $valores[1]);
              shuffle($valores_facil);
              $datos[] = $valores_facil;
              break;
            case "medio"://Si la dificultad es "medio", se guardan sólo los tres primeros valores, se desordenan y se mete en el array ($datos)
              $valores_normal = array();
              array_push($valores_normal, $valores[0], $valores[1], $valores[2]);
              shuffle($valores_normal);
              $datos[] = $valores_normal;
              break;
            case "dificil"://Si la dificultad es "dificil", se guardan todos los valores, se desordenan y se mete en el array ($datos)
              shuffle($valores);
              $datos[] = $valores;
          }  
      }
    }
  }

  return $datos;//Se devuelve el array con los datos especificados anteriormente
}

/**
 * Nombre: mostrarDatos()
 * Descripción: Muestra las palabras junto con su lista de posibilidades
 */
function mostrarDatos($boton_corregir, $palabras, $valores, $palabras_correctas) {
  $resultado = "";//Variable donde se da el formato para luego mostrarlo por pantalla

  for ($contA = 0; $contA < count($palabras); $contA++) {//Cada vez que se ejecuta este bucle:
    $resultado .= "<label>" . ucfirst($palabras[$contA]) . "</label><br/><br/><select name='" . $palabras[$contA] . "'>";//Se concatena la palabra y el principio de la lista
    for ($contB = 0; $contB < count($valores[$contA]); $contB++) {//Cada vez que se ejecuta este bucle, se concatena cada uno de las posibilidades en la lista
      $resultado .= "<option value='" . $valores[$contA][$contB] . "'>" . ucfirst($valores[$contA][$contB]) . "</option>";
    }
    $resultado .= "</select>";//Se cierra la lista
    if (isset($boton_corregir)) {//Si se pulsó en el botón de "Correxir Datos":
      $comprobacion_palabra = comprobarPalabra($palabras[$contA], $palabras_correctas[$contA]);//Se ejecuta la función "comprobarPalabra()" con los parámetros "$palabras[$cont]" y "$palabras_correctas[$contA]", y se recoge el resultado en esta variable ($comprobacion_palabra)
      if (!empty($comprobacion_palabra)) {//Si no está vacío ésta variable, se concatena el mensaje de error al resultado
        $resultado .= $comprobacion_palabra;
      }
    }
    
    $resultado .= "<br/><br/>";//Se crean varios saltos de línea
  }
  return $resultado;//Se devuelve el resultado obtenido
}

/**
 * Nombre: comprobarPalabra()
 * Descripción: Se comprueba la palabra dada con la correcta
 */
function comprobarPalabra($nombre, $palabra_correcta) {
    if ($_POST[$nombre] === $palabra_correcta) {//Si la palabra elegida por el usuario coincide con la correcta, se devuelve una cadena vacía
        return "";
    }

    return "<div class=error>Palabra incorrecta, volve a intentalo</div>";//Por el contrario, devuelve un mensaje de error
}

/**
 * Nombre: administrarBotonCorregir()
 * Descripción: Realiza una serie de acciones si se pulsó el botón de "Correxir Datos"
 */
function administrarBotonCorregir($tabla, $campos) {
    $palabra_correcta = true;//Por defecto todas las palabras son correctas
    $comprobacion_palabras = array();//Array con las palabras que estén correctas e incorrectas
    $lista = DAO::leerDatos($tabla, $campos);//Se ejecuta la función "leerDatos()" de la clase "DAO" con los parámetros "$tabla" y "$campos" y se recoge el resultado en esta variable ($lista)
    $tipo_palabra = substr($_SESSION['juego'], 0, ($_SESSION['juego'] - 1));//Se separa la última "s" de "sinonimos/antonimos" y se recoge el resto (sinonimo/antonimo)

    for ($cont = 0; $cont < count($lista); $cont++) {//Cada vez que se ejecuta este bucle:
        if ($lista[$cont]['tipo'] === $tipo_palabra) {//Si la palabra es un sinónimo o un antónimo (no pueden ser los dos a la vez):
          /**
           * Se ejecuta la función "comprobarPalabra()" con los parámetros "$lista[$cont]["nombre"]" y "$lista[$cont]["palabra_correcta"]", y se recoge el resultado en esta variable ($comprobacion_palabras)
           */
          $comprobacion_palabras[] = comprobarPalabra($lista[$cont]["nombre"], $lista[$cont]["palabra_correcta"]);
        }
        
    }
    
    for ($cont = 0; $cont < count($comprobacion_palabras); $cont++) {//Cada vez que se ejecuta este bucle:
        if (!empty($comprobacion_palabras[$cont])) {//Si alguna de las palabras no es correcta, se cambia el valor de $palabra_correcta" a falso (false)
            $palabra_correcta = false;
        }
    }

    if ($palabra_correcta) {//Si todas las palabras son correctas, se envía a la página de elección de guardado de las estadísticas
        header("Location: completado.php");
    } else {//Por el contrario, se suma uno al número de intentos del jugador
      $num_intentos = $_SESSION['num_intentos'];
      $num_intentos++;
      $_SESSION['num_intentos'] = $num_intentos;
    }
}

/**
  * Nombre: irPaginaAnterior()
  * Descripción: Vuelve al menú principal
  */
function irPaginaAnterior() {
  if (isset($_POST['volver'])) {//Si se pulsa el botón de "Volver al Menú" se vuelve al menú principal
      header("Location: index.php");
  }
}

/**
 * Si no está puesto la dificultad, el juego o el número de intentos, se devuelve el usuario a la página de inicio del juego
 */
if (!isset($_SESSION['dificultad']) || !isset($_SESSION['juego']) || !isset($_SESSION['num_intentos'])) {
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

irPaginaAnterior();//Se ejecuta la función "irPaginaAnterior()"

$seleccion_campos = array("nombre", "tipo", "valores", "palabra_correcta");//Array con los campos a elegir en la base de datos

$lista_palabras = cogerDatosEspecificos("actividade10", $seleccion_campos, "palabras");//Se ejecuta la función "cogerDatosEspecificos()" con los parámetros "actividade10", "$seleccion_campos" y "palabras", y se recoge el resultado en esta variable "$lista_palabras"
$lista_valores = cogerDatosEspecificos("actividade10", $seleccion_campos, "valores");//Se ejecuta la función "cogerDatosEspecificos()" con los parámetros "actividade10", "$seleccion_campos" y "valores", y se recoge el resultado en esta variable "$lista_valores"
$lista_palabras_correctas = cogerDatosEspecificos("actividade10", $seleccion_campos, "palabras_correctas");//Se ejecuta la función "cogerDatosEspecificos()" con los parámetros "actividade10", "$seleccion_campos" y "palabras_correctas", y se recoge el resultado en esta variable "$lista_palabras_correctas"

if (isset($corregir)) {//Si se pulsó en el botón de "Correxir Datos", se ejecuta la función "administrarBotonCorregir()" con los parámetros "$corregir", "actividade10" y "$seleccion_campos"
  administrarBotonCorregir("actividade10", $seleccion_campos);
}

$lista = mostrarDatos($corregir, $lista_palabras, $lista_valores, $lista_palabras_correctas);//Se ejecuta la función "mostrarDatos()" con los parámetros "$corregir", "$lista_palabras", "$lista_valores" y "$lista_palabras_correctas", y se recoge el resultado en esta variable "$lista"

$smarty->assign("lista", $lista);//Se asigna el valor de "$lista" a esta etiqueta (lista) y se pasa a Smarty
$smarty->assign("juego", $_SESSION['juego']);//Se asigna el valor de "$_SESSION['juego']" a esta etiqueta (juego) y se pasa a Smarty

$smarty->display('juego.tpl');//Se muestra la plantilla por pantalla con todos los datos asignados anteriormente