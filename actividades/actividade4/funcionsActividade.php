<?php

/**
 * @author Santiago Calvo Piñeiro
 */


/**
 * @property int $INDEX_CATEGORIA_NOME Indice no que se atopa
 */
define("INDEX_CATEGORIA_NOME", 0);
define("INDEX_CATEGORIA_IMAXE_PRINCIPAL", 1);
define("INDEX_CATEGORIA_INICIO_IMAXES_XOGO", 2);

/* * ******************************************
  FUNCIONS INDEX.PHP
 * ****************************************** */

/**
 * 
 * @return array Array multidimensional que contén as categorías do arquivo "categorias.csv". Cada categoría é un array
 * que contén o seu nome e a súa imaxe principal para mostrar.
 */
function getNomesImaxesCategoriasFicheiro(): array {
    $ficheiro = fopen("categorias.csv", "r");
    while (($lineaFicheiro = fgetcsv($ficheiro, 0, ";")) != false) {
        $categoriasNomeEImaxes[] = array($lineaFicheiro[INDEX_CATEGORIA_NOME], $lineaFicheiro[INDEX_CATEGORIA_IMAXE_PRINCIPAL]);
    }
    fclose($ficheiro);
    return $categoriasNomeEImaxes;
}

/**
 * Devolve as categorías que se usarán na partida. O usuario pode seleccionalas manualmente ou deixar que se
 * seleccionen aleatoriamente
 * @param array $categoriasFicheiro Array multidimensional que contén todas as categorías do ficheiro "categorias.csv".
 * So garda o nome e a imaxe de cada categoria.
 * @param string $dificultade Os posibles valores son: facil, normal, dificil.
 * @return array Array multidimensional que conten as categorias que van a usarse na partida
 * actual. So garda o nome e a imaxe de cada categoria.
 */
function getCategoriasPartida(array $categoriasFicheiro, string $dificultade): array {
    if (isCategoriasSeleccionadasManualmente()) {
        $categoriasPartida = getCategoriasSeleccionadasManualmente($categoriasFicheiro);
    } else {
        $categoriasPartida = getCategoriasSeleccionadasAleatoriamente($categoriasFicheiro, $dificultade);
    }
    return $categoriasPartida;
}

/**
 * Comproba se o usuario seleccionou as categorías ou non.
 * @return bool TRUE se o usuario seleccionou as categorías da partida. FALSE se o usuario non seleccionou as
 * categorias da partida.
 */
function isCategoriasSeleccionadasManualmente(): bool {
    return isset($_GET["categorias"]);
}

/**
 * Obten as categorias que o usuario seleccionou para a partida.
 * @param array $categoriasFicheiro Array multidimensional que contén todas as categorías do ficheiro "categorias.csv".
 * So garda o nome e a imaxe de cada categoria.
 * @return array Array multidimensional que conten as categorias que van a usarse na partida
 * actual. So garda o nome e a imaxe de cada categoria. 
 */
function getCategoriasSeleccionadasManualmente(array $categoriasFicheiro): array {
    $nomesCategoriasSeleccionadasUsuario = explode(",", $_GET["categorias"]);

    //Borra do array que contén todas as categorias, todas aquelas categorias que non teñan un nome que estea
    //na lista que seleccionou o usuario
    for ($i = count($categoriasFicheiro) - 1; $i >= 0; $i--) {
        if (!in_array($categoriasFicheiro[$i][0], $nomesCategoriasSeleccionadasUsuario)) {
            unset($categoriasFicheiro[$i]);
        }
    }
    return $categoriasFicheiro;
}

/**
 * Devolve as categorias que se usaran na partida de forma aleatoria en funcion da dificultade. Se e facil seran 2
 * categorias, 3 se e normal e 4 se e dificil.
 * @param type $categoriasFicheiro Array multidimensional que contén todas as categorías do ficheiro "categorias.csv".
 * So garda o nome e a imaxe de cada categoria.
 * @param type $dificultade Os posibles valores son: facil, normal, dificil.
 * @return array Array multidimensional que conten as categorias que van a usarse na partida
 * actual. So garda o nome e a imaxe de cada categoria.
 */
function getCategoriasSeleccionadasAleatoriamente($categoriasFicheiro, $dificultade): array {
    shuffle($categoriasFicheiro);
    switch ($dificultade) {
        case "facil":
            $categoriasFicheiro = array_slice($categoriasFicheiro, 0, 2);
            break;
        case "normal":
            $categoriasFicheiro = array_slice($categoriasFicheiro, 0, 3);
            break;
        case "dificil":
            $categoriasFicheiro = array_slice($categoriasFicheiro, 0, 4);
            break;
    }
    return $categoriasFicheiro;
}

/* * ******************************************
  FUNCIONS CATEGORIAS.PHP
 * ****************************************** */

/**
 * Evento do botón de envío de formulario da páxina "categorias.php". Comproba que se seleccionaron todas as categorias
 * de acordo á dificultade seleccionada. Se é correcto enviará os nomes da categoría seleccionada ao index da actividade
 * e se non o é modificará a mensaxe de erro recibida como parámetro. Recibe por $_POST varios campos hidden cos nomes das
 * categorias seleccionadas.
 * @param int $numCategoriasSeleccionar facil = 2 | normal = 3 | dificil = 4.
 * @param string $dificultade "facil" | "normal" | "dificil".
 * @param string $mensaxeErro Queda vacío se non hai erros e se os hai amosa o número de categorías que debe seleccionar.
 */
function eventoBotonSeleccionarCategorias(int $numCategoriasSeleccionar, string $dificultade, string &$mensaxeErro): void {
    $listaNomesCategoriasSeleccionadas = getNomesCategoriasSeleccionadas();
    if (count($listaNomesCategoriasSeleccionadas) != $numCategoriasSeleccionar) {
        $mensaxeErro = "Debes seleccionar $numCategoriasSeleccionar categorías";
    } else {
        redirixirPaxinaInicio($listaNomesCategoriasSeleccionadas, $dificultade);
    }
}

/**
 * Obtén o número de categorías a seleccionar dependendo da dificultade.
 * @param string $dificultade "facil" | "normal" | "dificil"
 * @return int Número de categorías que deben seleccionarse.
 */
function getNumCategoriasSeleccionar($dificultade): int {
    switch ($dificultade) {
        case "facil":
            $numCategoriasSeleccionar = 2;
            break;
        case "normal":
            $numCategoriasSeleccionar = 3;
            break;
        case "dificil":
            $numCategoriasSeleccionar = 4;
            break;
    }
    return $numCategoriasSeleccionar;
}

/**
 * Recibe por $_POST todos os campos hidden do formulario da páxina categorias.php. Se eses campos foron seleccionados
 * almacenarán o nome da categoría seleccionada e do contrario o value estará baleiro.
 * @return array Nomes das categorías seleccionadas.
 */
function getNomesCategoriasSeleccionadas(): array {
    $nomesCategoriasSeleccionadas = array();
    for ($i = 0; isset($_POST["nomeCategoriaSeleccionada$i"]); $i++) {
        if (!empty($_POST["nomeCategoriaSeleccionada$i"])) {
            $nomesCategoriasSeleccionadas[] = $_POST["nomeCategoriaSeleccionada$i"];
        }
    }
    return $nomesCategoriasSeleccionadas;
}

/**
 * Leva ao index da actividade pasando por $_GET as categorías seleccionadas e a dificultade.
 * @param array $listaNomesCategoriasSeleccionadas
 * @param string $dificultade "facil" | "normal" | "dificil".
 */
function redirixirPaxinaInicio($listaNomesCategoriasSeleccionadas, $dificultade): void {
    $nomesCategoriasFormatoString = implode(",", $listaNomesCategoriasSeleccionadas);
    header("Location:" . urldecode("index.php?categorias=" . $nomesCategoriasFormatoString . "&dificultade=" . $dificultade));
    exit();
}

/* * ******************************************
  FUNCIONS RESPOSTAS.PHP
 * ****************************************** */

/**
 * Obtén un array co nome, a imaxe principal e as imaxes que se usarán nesta partida.
 * @param string $nomeCategoria Nome da categoría da que se queren os datos.
 * @param int $numImaxes Cantidade de imaxes que se usarán na partida.
 * @return array O nome está na posición 0, a imaxe principal na 1, dende a 2 ata $numImaxes están as imaxes nun
 * orde aleatorio que o usuario ten que acertar.
 */
function getCategoriaPartida(string $nomeCategoria, int $numImaxes): array {
    $ficheiro = fopen("categorias.csv", "r");
    $atopado = false;
    while (($linea = fgetcsv($ficheiro, 0, ";")) != false && $atopado == false) {
        if ($linea[INDEX_CATEGORIA_NOME] == $nomeCategoria) {
            $atopado = true;
            $imaxePrincipalCategoria = "Imagenes/" . $linea[INDEX_CATEGORIA_NOME] . "/" . $linea[INDEX_CATEGORIA_IMAXE_PRINCIPAL];
            $imaxesCategoria = array_slice($linea, INDEX_CATEGORIA_INICIO_IMAXES_XOGO);
            shuffle($imaxesCategoria);
            $imaxesCategoria = array_slice($imaxesCategoria, 0, $numImaxes);
        }
    }
    array_unshift($imaxesCategoria, $nomeCategoria, $imaxePrincipalCategoria);
    return $imaxesCategoria;
}

/**
 * 
 * @return array Nomes das categorías usadas na partida.
 */
function getNomesCategorias(): array {
    return explode(",", $_GET["categorias"]);
}

/* * ******************************************
  FUNCIONS ACTIVIDADE.PHP
 * ******************************************* */

/**
 * 
 * @param int $puntuacion Suma 1 punto se o usuario acerta e resta 1 punto se falla (ata un mínimo de 0 puntos)
 * @param string $nomeCategoriaSeleccionada
 * @param array $imaxesMisturadas Imaxes da partida que o usuario ten que clasificar. Se acerta desaparece o elemento que
 * acertou do array.
 * @param string $elementoClasificar Ruta completa da imaxe que se ten que clasificar.
 * @param string $estiloOcultarErro Queda baleiro se o usuario falla se ten o valor "ocultar" se acerta. Dalle un estilo
 * a unha mensaxe de erro.
 */
function seguinteTurno(int &$puntuacion, string $nomeCategoriaSeleccionada, array &$imaxesMisturadas, string $elementoClasificar, string &$estiloOcultarErro) {
    if (acertouCategoria($nomeCategoriaSeleccionada, $elementoClasificar)) {
        $puntuacion++;
        $estiloOcultarErro = "ocultar";
        unset($imaxesMisturadas[0]);
        $imaxesMisturadas = array_slice($imaxesMisturadas, 0);
    } else {
        if ($puntuacion > 0) {
            $puntuacion--;
        }
        $estiloOcultarErro = "";
    }
}

/**
 * 
 * @param string $nomeCategoriaSeleccionada
 * @param string $elementoClasificar Ruta completa da imaxe que se ten que clasificar.
 * @return bool TRUE se acertou. FALSE se non acertou.
 */
function acertouCategoria(string $nomeCategoriaSeleccionada, string $elementoClasificar): bool {
    $categoriasFicheiro = getCategorias();
    $nomesCategoriasFicheiro = array_column($categoriasFicheiro, INDEX_CATEGORIA_NOME);
    $indexCategoriaSeleccionada = array_search($nomeCategoriaSeleccionada, $nomesCategoriasFicheiro);
    $categoriaSeleccionada = $categoriasFicheiro[$indexCategoriaSeleccionada];
    $datosElementoClasificar = explode("/", $elementoClasificar);
    $nomeElementoClasificar = $datosElementoClasificar[count($datosElementoClasificar) - 1];
    if (in_array($nomeElementoClasificar, $categoriaSeleccionada)) {
        return true;
    } else {
        return false;
    }
}

/**
 * 
 * @return array Imaxes que o xogador ten que clasificar.
 */
function getImaxesPartida(): array {
    for ($i = 0; isset($_POST["imaxe$i"]); $i++) {
        $imaxesPartida[] = $_POST["imaxe$i"];
    }
    return $imaxesPartida;
}

/**
 * 
 * @return array Array multidimensional que contén todos os arrays de categorías do ficheiro
 */
function getCategorias(): array {
    $ficheiro = fopen("categorias.csv", "r");
    while (($datos = fgetcsv($ficheiro, 0, ";")) != false) {
        $categorias[] = $datos;
    }
    fclose($ficheiro);
    return $categorias;
}

/**
 * @todo Redirixir ao usuario para gardar a puntuación e amosar as estadísticas
 * @param int $puntuación puntuacion obtida ao rematar o xogo.
 */
function finalizarXogo(int $puntuacion): void {
    
}
