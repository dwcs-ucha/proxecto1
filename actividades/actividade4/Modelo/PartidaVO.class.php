<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PartidaVO
 *
 * @author Santiago
 */
class PartidaVO {

    const NUMERO_CATEGORIAS_FACIL = 2;
    const NUMERO_CATEGORIAS_NORMAL = 3;
    const NUMERO_CATEGORIAS_DIFICIL = 4;
    const NUMERO_IMAXES_CATEGORIA_MINIMO = 5;
    const NUMERO_IMAXES_CATEGORIA_MAXIMO = 10;
    
    const FASE_CREAR_PARTIDA = 0;
    const FASE_CONFIGURAR = 1;
    const FASE_MEMORIZAR_IMAXES = 2;
    const FASE_CLASIFICAR_IMAXES = 3;

    private $categorias;
    private $dificultade;
    private $numImaxesCategoria;
    private $puntuacion;
    private $imaxesClasificar;
    private $fasePartida;

    public function __construct(array $categorias, string $dificultade = "normal", int $numImaxesCategoria = self::NUMERO_IMAXES_CATEGORIA_MINIMO) {
        $this->dificultade = $dificultade;
        $this->numImaxesCategoria = $numImaxesCategoria;
        $this->categorias = $categorias;
        $this->puntuacion = 0;
        $this->fasePartida = self::FASE_CONFIGURAR;
    }
    
    public function getFasePartida() {
        return $this->fasePartida;
    }
    
    public function setFasePartida(int $fasePartida) {
        $this->fasePartida = $fasePartida;
    }

    public function setDificultade(string $dificultade) {
        $this->dificultade = $dificultade;
    }

    public function setCategorias(array $categorias) {
        $this->categorias = $categorias;
    }

    public function setNumImaxesCategoria(int $numImaxesCategoria) {
        $this->numImaxesCategoria = $numImaxesCategoria;
    }

    public function seleccionarImaxes() {
        foreach ($this->categorias as $categoria) {
            $categoria->seleccionarImaxesAleatoriamente($this->numImaxesCategoria);
        }
    }

    public function xerarImaxesClasificar() {
        $this->imaxesClasificar = array();
        foreach ($this->categorias as $categoria) {
            $this->imaxesClasificar = array_merge($this->imaxesClasificar, $categoria->getImaxesXogo());
        }
        shuffle($this->imaxesClasificar);
    }

    public function getImaxesClasificar() {
        return $this->imaxesClasificar;
    }

    public function getNumeroImaxesCategoria() {
        return $this->numImaxesCategoria;
    }

    public function getDificultade() {
        return $this->dificultade;
    }

    public function getCategorias() {
        return $this->categorias;
    }

    public static function getNumeroCategorias(string $dificultade) {
        switch ($dificultade) {
            case "facil":
                $numeroCategorias = self::NUMERO_CATEGORIAS_FACIL;
                break;
            case "normal":
                $numeroCategorias = self::NUMERO_CATEGORIAS_NORMAL;
                break;
            case "dificil":
                $numeroCategorias = self::NUMERO_CATEGORIAS_DIFICIL;
                break;
        }
        return $numeroCategorias;
    }

    public function getPuntuacion() {
        return $this->puntuacion;
    }

    public function sumarPunto() {
        $this->puntuacion++;
    }

    public function restarPunto() {
        if ($this->puntuacion > 0) {
            $this->puntuacion--;
        }
    }

    public function seguinteImaxeClasificar() {
        if (count($this->imaxesClasificar) > 0) {
            $this->imaxesClasificar = array_slice($this->imaxesClasificar, 1);
        } else {
            return null;
        }
    }

}
