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
     * 
     * @return PartidaVO
     */
    public static function getPartida() {
        if (!isset($_SESSION["partida"])) {
            return null;
        } else {
            return $_SESSION["partida"];
        }
    }

    public static function crearPartidaNova() {
        $categoriasFicheiro = CategoriaController::getCategorias();
        $categoriasPartida = $categoriasFicheiro;
        shuffle($categoriasPartida);
        $categoriasPartida = array_slice($categoriasPartida, 0, PartidaVO::NUMERO_CATEGORIAS_NORMAL);
        $partida = new PartidaVO($categoriasPartida);
        $_SESSION["partida"] = $partida;
    }

    public static function getFasePartida() {
        $partida = self::getPartida();
        if ($partida === null) {
            $fasePartida = PartidaVO::FASE_CREAR_PARTIDA;
        } else {
            $fasePartida = $partida->getFasePartida();
        }
        return $fasePartida;
    }

    static function iniciarXogo(int $numImaxes) {
        $partida = self::getPartida();
        $partida->setNumImaxesCategoria($numImaxes);
        $partida->seleccionarImaxes();
        $partida->xerarImaxesClasificar();
        $partida->setFasePartida(PartidaVO::FASE_MEMORIZAR_IMAXES);
    }
    
    static function avanzarAFaseClasificarImaxes() {
        $partida = self::getPartida();
        $partida->setFasePartida(PartidaVO::FASE_CLASIFICAR_IMAXES);
    }

    public static function setDificultade(string $dificultade) {
        $partida = self::getPartida();
        $numeroCategorias = PartidaVO::getNumeroCategorias($dificultade);
        $categorias = CategoriaController::getCategoriasAleatoriamente($numeroCategorias);
        $partida->setCategorias($categorias);
        $partida->setDificultade($dificultade);
    }

    public static function setCategoriasSeleccionadas(array $categoriasSeleccionadas) {
        $partida = self::getPartida();
        $partida->setCategorias($categoriasSeleccionadas);
    }

    public static function comprobarResposta(string $nomeCategoria) {
        $partida = self::getPartida();
        $imaxeClasificar = $partida->getImaxesClasificar()[0];
        foreach ($partida->getCategorias() as $categoria) {
            if ($categoria->getNome() == $nomeCategoria) {
                $categoriaSeleccionada = $categoria;
            }
        }
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

    public static function seguinteImaxeClasificar() {
        $partida = self::getPartida();
        $partida->seguinteImaxeClasificar();
    }

    public static function restarPunto() {
        $partida = self::getPartida();
        $partida->restarPunto();
    }

    public static function getImaxeClasificar() {
        $partida = self::getPartida();
        $imaxeClasificar = $partida->getImaxesClasificar()[0];
        return $imaxeClasificar;
    }

    public static function rematouPartida() {
        if (self::getImaxeClasificar() === null) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCategoriasPartida() {
        $partida = self::getPartida();
        $categorias = $partida->getCategorias();
        return $categorias;
    }

    public static function getPuntuacion() {
        $partida = self::getPartida();
        $puntacion = $partida->getPuntuacion();
        return $puntacion;
    }

}
