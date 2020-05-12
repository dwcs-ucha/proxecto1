<?php

/* * *************************** */
/*  Luis Corral de Cal      	 */
/*  8 Mayo 2020 		 */
/*  Xogoteca->Actividade6        */
/*  Controlador Login    	 */
/* 	Version 1	         */
/* * *************************** */
?>
<?php

//Cargamos os arquivos necesarios
include_once '../Modelo/Config.class.php';
include_once Config::getRutaRootPHP() . 'iniciarsmarty.inc.php';
include_once Config::getRutaRootPHP() . 'Modelo/Usuario.class.php';
include_once Config::getRutaRootPHP() . 'Modelo/Validacion.class.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    if (isset($_POST["volver"])) {
        $paxinaAnterior = $_POST["volver"];
    } else if (isset($_POST["iniciar"])) {
        $paxinaAnterior = $_POST["iniciar"];
    } else {
        $paxinaAnterior = str_replace(Config::getRutaRootPHP(), Config::getRutaRootHTML(), $_SERVER['HTTP_REFERER']);
    }
}
$paxinaRedirixir = isset($paxinaAnterior) ? $paxinaAnterior : Config::getRutaRootHTML() . "index.php";

if (Usuario::getUsuarioEnSesion() !== null) {
    header('Location: ' . $paxinaRedirixir);
    exit();
}

//iniciamos as variables de erro a false
$errornome = false;
$errorcontrasinal = false;
$error_inicio = false;
//se pulsamos volver, redirixe ó index
if (isset($_POST['volver'])) {
    header('Location: ' . $paxinaRedirixir);
    exit();
}

if (isset($_POST['iniciar'])) {//se pulsamos iniciar
    //recollemos o nome e comprobamos que non este vacio
    if (isset($_POST['nome'])) {
        $nome = trim($_POST['nome']);
        if ($nome == '') {
            $errornome = true;
        }
    } else {
        $errornome = true;
    }
    //recollemos o contrasinal e comprobamos que non este vacio
    if (isset($_POST['contrasinal'])) {
        $contr = trim($_POST['contrasinal']);
        if ($contr == '') {
            $errorcontrasinal = true;
        }
    } else {
        $errorcontrasinal = true;
    }
    if (Validacion::validaXogador($nome) === true && Validacion::validaContrasinal($contr) === true) {
        //se o nome e o contrasinal teñen formatos válidos
        //creamos un usuario temporal para comprobar se existe o nome de usuario
        $usuario = new Usuario($nome, $contr, 0, "", 0);
        if (Usuario::existeUsuario($usuario)) {
            //se existe o usuario na base de datos, tentamos iniciar sesion
            if (Usuario::loginUsuario($nome, $contr)) {
                //se todo esta correcto, garda o usuario en sesion e rediriximos o index
                header('location: ' . $paxinaRedirixir);
                exit();
            } else {
                //se hai algun error poñemos a variable de error a true
                $error_inicio = true;
            }
        } else {
            //Se o usuario non existe na base de datos o engadimos.
            //Creamos a data de alta 
            //Poñemos a información de localización en España
            setlocale(LC_TIME, "es_ES.UTF-8");
            //Cramos a data co formato para gardar nas estatisticas (Ano-Mes-Día Horas:Minutos:Segundos)
            $data = strftime("%Y-%m-%d");
            //agora creamos o obxecto usuario que imos meter na base de datos
            $usuario = new Usuario($nome, $contr, Usuario::ROL_NORMAL, $data, 0);

            if (!Usuario::insertarNovoUsuario($usuario)) {
                //se hai error o gardar na base de datos                
                $error_inicio = true;
            } else {
                //Se garda sen errores , iniciamos a sesión e rediriximos o index
                if (Usuario::loginUsuario($nome, $contr) !== false) {
                    header('Location: ' . $paxinaRedirixir);
                    exit();
                } else {
                    //se non inicia sesion
                    $error_inicio = true;
                }
            }
        }
    } else {
        //se o nome ou contrasinal non teñen o formato correcto
        $errornome = true;
        $errorcontrasinal = true;
    }
}
$smarty->assign('paxinaRedirixir', $paxinaRedirixir);
$smarty->assign('errornome', $errornome);
$smarty->assign('errorcontrasinal', $errorcontrasinal);
$smarty->assign('error_inicio', $error_inicio);
$smarty->display(Config::getRutaRootPHP() . 'Vista/login.tpl');
?>