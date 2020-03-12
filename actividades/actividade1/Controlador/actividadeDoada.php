<?php
    // BreoBeceiro:09/03/2020
    // PROXECTO 2º AVALIACIÓN | Versión 1.0

    // FALTA REVISAR A VISUALIZACIÓN DA MENSAXE DE ERRO SE OS CAMPOS COS DATOS DO XOGADOR VAN BALEIROS, POIS
    //   TAL E COMO ESTÁ AGORA, NON SE AMOSA (NIN SE QUERA CHEGA A GARDARSE A VARIABLE QUE CONTÉN A MENSAXE NO
    //   CAMPO OCULTO CORRESPONDENTE). O MÁIS PROBABLE É QUE HAXA QUE GARDAR TODAS AS VARIABLES QUE CONTEÑEN
    //   OS DATOS DO XOGADOR EN CAMPOS OCULTOS.
    // FALTA REVISAR O GARDADO DOS values NAS CAIXAS DE TEXTO DAS SÍLABAS INICIAIS DAS PALABRAS, POIS AO DARLLE
    //   A 'Comprobar', PERMANECEN NAS CAIXAS; SEN EMBARGO, TAMÉN PODE RESULTAR INTERESANTE DEIXALO ASÍ, POIS
    //   LOGO NO SEGUINTE TURNO O XOGADOR TERÁ GARDADO O PROGRESO DA ANTERIOR TIRADA, DE FORMA QUE PODERÁ PROGRESAR
    //   DE FORMA MÁIS DOADA (A FIN DE CONTAS, ESTA É A PÁXINA CO XOGO DE DIFICULTADE MÁIS BAIXA).
    // OPCIONALMENTE, FALTARÍA ENGADIR O CAMBIO DA COR DE FONDO DOS ELEMENTOS input NOS CALES ESTÁN
    //   AS SÍLABAS A ESCRIBIR. A IDEA É QUE INICIALMENTE APAREZAN NUNHA COR, E QUE AO ESCRIBILAS
    //   NAS CAIXAS DE ACERTAR, A COR DE FONDO CAMBIE.

    // ACTUALIZACIÓN (09/12/2019): COA NOVA TANDA DE IMAXES E PALABRAS QUE SE INCLUÍU, APARECEU UN PROBLEMA NAS CAIXAS
    //   DAS PRIMEIRAS SÍLABAS CANDO A LIÑA QUE SE CARGA DO CSV 'actividadeDoada_Contido.csv' É A PRIMEIRA. ESTE 
    //   CONSISTE EN QUE AO CARGARSE A PÁXINA, NOS inputs QUE TERÍA QUE RECHEAR O XOGADOR, VEÑEN XA CARGADAS AS 
    //   SÍLABAS INICIAIS.

    // Módulo de funcións de validación e saneamento:
    include('../Modelo/moduloFuncions.inc.php');

    // Ficheiro de funcións comúns do sitio:
    include('../../../librerias/utils.php');

    include('../Modelo/DAO.class.php');
    include('../Modelo/Xogador.class.php');

    include_once '../../Modelo/Config.class.php'; 
    include_once Config::$rutaRootPHP.'iniciarsmarty.inc.php';

    $smarty->display("Vista/actividadeDoada.tpl");

    // Se o xogador quere gardar a súa puntuación, debe autenticarse, de modo que se non está identificado, envíaselle
    //   á páxina de acceso. Se está identificado, a súa puntuación envíase á BBDD:
    if(isset($_POST['enviaPuntos'])){
        session_start();

        if(!isset($_SESSION['xogador'])){
            header('Location: acceso.php');
        }else{
            $xogador= $_SESSION['xogador'];
            $contrasinal= $_SESSION['contrasinal'];

            // Sabemos que os datos existen na BBDD e que están validados porque comprobáronse no momento de gardalos na
            //   sesión (páxina 'acceso.php', pendente de implementar):
            DAO::gardarPuntuacion($nome, $puntos);
        }
    }

    // A variable $contido recibe os datos do CSV onde se gardan as sílabas finais das palabras do xogo. En cada unha das 
    //   filas, que soamente son dúas, atópanse as sílabas que completan o set de cinco palabras que pode haber nunha partida.
    // Posteriormente, unha variable recibirá aleatoriamente as sílabas da primeira fila ou da segunda, e en función diso,
    //   as imaxes que se amosarán no navegador e as sílabas iniciais que se esperará recibir nas casillas serán unhas ou 
    //   outras.
    $contido;

    if(isset($_POST['enviar'])){
        $silabaLA= $_POST['silabaLA'];
        $silabaLE= $_POST['silabaLE'];
        $silabaLI= $_POST['silabaLI'];
        $silabaLO= $_POST['silabaLO'];
        $silabaLU= $_POST['silabaLU'];

        $puntos= 0;

        // Se os valores introducidos non superan cadanseu filtro, gárdase unha mensaxe de erro que se amosará
        //   embaixo de cada campo; se pasan o filtro, gárdase unha mensaxe de felicitación e increméntanse os
        //   puntos nunha unidade.
        // Valídanse as sílabas iniciais cando estas correspóndense coas da primeira liña do CSV 'actividadeDoada_Contido.csv'.
        if(!validaSilaba(strtoupper($silabaLE), "LE")){
            $erroLE= "A sílaba correcta era LE.";
        }else{
            $noraboaLE= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLA), "LA")){
            $erroLA= "A sílaba correcta era LA.";
        }else{
            $noraboaLA= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLI), "LI")){
            $erroLI= "A sílaba correcta era LI.";
        }else{
            $noraboaLI= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLO), "LO")){
            $erroLO= "A sílaba correcta era LO.";
        }else{
            $noraboaLO= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLU), "LU")){
            $erroLU= "A sílaba correcta era LU.";
        }else{
            $noraboaLU= "Moi ben!";
            $puntos++;
        }

        // A partir de aquí valídanse as sílabas iniciais para os casos da segunda liña do CSV 'actividadeDoada_Contido.csv'.
        // Son consciente de que van moitas estruturas repetidas, pero teño que rematar todavía a presentación e prefiro mandar
        //   esto así aínda que non vaia moi bonito, pois polo menos é funcional.
        if(!validaSilaba(strtoupper($silabaLA), "RA")){
            $erroRA= "A sílaba correcta era RA.";
        }else{
            $noraboaRA= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLE), "RE")){
            $erroRE= "A sílaba correcta era RE.";
        }else{
            $noraboaRE= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLI), "RI")){
            $erroRI= "A sílaba correcta era RI.";
        }else{
            $noraboaRI= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLO), "RO")){
            $erroRO= "A sílaba correcta era RO.";
        }else{
            $noraboaRO= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLU), "RU")){
            $erroRU= "A sílaba correcta era RU.";
        }else{
            $noraboaRU= "Moi ben!";
            $puntos++;
        }
    
        // Recupérase a cadea de texto do campo oculto (ese campo de texto era un array na carga anterior da páxina,
        //   e convertirase de novo nun na presente):
        if(isset($_POST['silabasFinais'])){
            $silabasFinais= explode(",", $_POST['silabasFinais']);
        }
    }

    // Ao array $silabasFinais hai que aplicarlle a función shuffle no corpo da páxina, pois facéndoo no
    //   bloque previo á etiqueta <!doctype html> os seus elementos non cambiaban de posición.

    // Na primeira carga da páxina, defínese o array $silabasFinais e revólvense os seus elementos (se non,
    //   na primeira carga aparecerían sempre na mesma orde, e desta forma, é aleatoria):
    if(!isset($_POST['enviar'])){
        // A variable $silabasFinais é un array que obtén os valores dunha dimensión ao azar da matriz $contido.
        $silabasFinais= $contido[rand(0,1)];
        shuffle($silabasFinais);
    }

    // Cando se pulse en 'Refrescar', revólvense de novo os elementos:
    if(isset($_POST['refrescar'])){
        shuffle($silabasFinais);
    }

    // O array $silabasFinais convértese nunha cadea de texto que se gardará nun campo oculto do formulario 
    //   para gardar o estado do array na seguinte carga da páxina, se esta se produce por premer en 'Comprobar'
    //   xa que se se produce por premer en 'Refrescar', o estado do array cambiará, dado que pasará de novo
    //   pola función shuffle():
    $silabasFinaisSTRING= implode(",", $silabasFinais);
?>