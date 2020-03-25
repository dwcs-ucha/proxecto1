<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PartidaController
 *
 * @author Santiago
 */
include Config::getRutaRootPHP() . 'actividades/actividade4/Modelo/PartidaVO.class.php';

class PartidaController {

    /**
     * Obtén a partida en sesión.
     * @return PartidaVO|null Devolver a partida en sesión se existe e null en caso contrario
     */
    public static function getPartida() {
        if (!isset($_SESSION["partida"])) {
            return null;
        } else {
            return $_SESSION["partida"];
        }
    }

    /**
     * Crea unha partida nova e a garda en sesión coa configuración por defecto e datos aleatorios.
     */
    public static function crearPartidaNova() {
        $categoriasPartida = CategoriaController::getCategoriasAleatoriamente(PartidaVO::NUMERO_CATEGORIAS_NORMAL);
        $partida = new PartidaVO($categoriasPartida);
        $_SESSION["partida"] = $partida;
    }

    /**
     * Obtén a fase na que se atopa a partida. Isto pode ser que se esté configurando, que haxa iniciado, etc.
     * @return int Constante da clase PartidaVO. O nome do posible resultado comeza con 'FASE_'
     */
    public static function getFasePartida() {
        $partida = self::getPartida();
        if ($partida === null) {
            $fasePartida = PartidaVO::FASE_CREAR_PARTIDA;
        } else {
            $fasePartida = $partida->getFasePartida();
        }
        return $fasePartida;
    }

    /**
     * Selecciona as imaxes que van formar parte da partida e establece que a fase da partida é 'FASE_MEMORIZAR_IMAXES'.
     * @param int $numImaxes Número de imaxes por categoría.
     */
    static function iniciarXogo(int $numImaxes) {
        $partida = self::getPartida();
        $partida->setNumImaxesCategoria($numImaxes);
        $partida->seleccionarImaxes();
        $partida->xerarImaxesClasificar();
        $partida->setFasePartida(PartidaVO::FASE_MEMORIZAR_IMAXES);
    }
    
    /**
     * Establece que a fase da partida é 'FASE_CLASIFICAR_IMAXES'.
     */
    static function avanzarAFaseClasificarImaxes() {
        $partida = self::getPartida();
        $partida->setFasePartida(PartidaVO::FASE_CLASIFICAR_IMAXES);
    }

    /**
     * Cambia a dificultade da partida e obtén aleatoriamente novas categorías da partida cuxo número
     * se corresponde ao número de categorías que teña asinada a dificultade.
     * @param string $dificultade Pode ser 'facil', 'normal' ou 'dificil'
     */
    public static function setDificultade(string $dificultade) {
        $partida = self::getPartida();
        $numeroCategorias = PartidaVO::getNumeroCategorias($dificultade);
        $categorias = CategoriaController::getCategoriasAleatoriamente($numeroCategorias);
        $partida->setCategorias($categorias);
        $partida->setDificultade($dificultade);
    }

    /**
     * Garda na partida as categorías que se van a usar.
     * @param array $categoriasSeleccionadas
     */
    public static function setCategoriasSeleccionadas(array $categoriasSeleccionadas) {
        $partida = self::getPartida();
        $partida->setCategorias($categoriasSeleccionadas);
    }

    /**
     * Comproba se seleccionou a categoría correcta á que pertence o elemento que se ten que clasificar.
     * @param string $nomeCategoria Nome da categoría seleccionada.
     * @return boolean TRUE se a imaxe que ten que clasificar se atopa dentro das imaxes da categoría seleccionada.
     * FALSE do contrario
     */
    public static function comprobarResposta(string $nomeCategoria) {
        $partida = self::getPartida();
        $imaxeClasificar = self::getImaxeClasificar();
        //Obten o obxeto categoría que se corresponde co nome da categoría recibido por parámetro
        foreach ($partida->getCategorias() as $categoria) {
            if ($categoria->getNome() == $nomeCategoria) {
                $categoriaSeleccionada = $categoria;
            }
        }
        //Comproba que a imaxe que o usuario ten que clasificar esté no array de imaxes da categoría que seleccionou
        if (in_array($imaxeClasificar, $categoriaSeleccionada->getImaxesXogo())) {
            return true;
        } else {
            return false;
        }
    }

    public static function sumarPunto() {
        $partida = self::getPartida();
        $partida->sumarPunto();
    }

    /**
     * Avanza á seguinte imaxe da partida que se ten que clasificar.
     */
    public static function seguinteImaxeClasificar() {
        $partida = self::getPartida();
        $partida->seguinteImaxeClasificar();
    }

    public static function restarPunto() {
        $partida = self::getPartida();
        $partida->restarPunto();
    }

    /**
     * Obtén a imaxe que o usuario ten que clasificar neste momento da lista de imaxes que se teñen que clasificar
     * @return string ruta da imaxe a clasificar.
     */
    public static function getImaxeClasificar() {
        $partida = self::getPartida();
        $imaxeClasificar = $partida->getImaxesClasificar()[0];
        return $imaxeClasificar;
    }

    /**
     * Comproba se rematou a partida.
     * @return boolean TRUE se non hai máis elementos que clasificar (e polo tanto rematou a partida).
     * FALSE en caso contrario
     */
    public static function rematouPartida() {
        if (self::getImaxeClasificar() === null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return array Lista das categorías da partida
     */
    public static function getCategoriasPartida() {
        $partida = self::getPartida();
        $categorias = $partida->getCategorias();
        return $categorias;
    }

    /**
     * 
     * @return int Puntuación da partida
     */
    public static function getPuntuacion() {
        $partida = self::getPartida();
        $puntacion = $partida->getPuntuacion();
        return $puntacion;
    }

    /**
     * 
     * @return array Nomes das categorías que forman parte da partida.
     */
    public static function getNomesCategoriasPartida() {
        $categorias = self::getCategoriasPartida();
        $nomesCategorias = array();
        foreach ($categorias as $categoria) {
            $nomesCategorias[] = $categoria->getNome();
        }
        return $nomesCategorias;
    }
    
    /**
     * 
     * @return string Dificultade da partida.
     */
    public static function getDificultade() {
        $partida = self::getPartida();
        return $partida->getDificultade();
    }
    
    /**
     * 
     * @return int Número de categorías que se poden seleccionar para a dificultade da partida.
     */
    public static function getNumeroCategoriasPermitidas() {
        $partida = self::getPartida();
        $dificultade = $partida->getDificultade();
        $numeroCategoriasPermitidas = $partida->getNumeroCategorias($dificultade);
        return $numeroCategoriasPermitidas;
    }
    
    /**
     * 
     * @return int Número de imaxes que terá cada categoría da partida.
     */
    public static function getNumeroImaxesPorCategoria() {
        $partida = self::getPartida();
        $numImaxesCategoria = $partida->getNumeroImaxesCategoria();
        return $numImaxesCategoria;
    }
}
