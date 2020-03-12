<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sumas {

    public $numa;
    public $numb;
    public $resultado;

    public function __construct($numa, $numb) {
        $this->numa = $numa;
        $this->numb = $numb;
        $this->resultado = $numa + $numb;
    }

    public function crearPartida($dificultade) {
        $partida = array();     
        $max = 0;
        switch ($dificultade) {
            case 'baixa':
                $max = 9;
                break;
            case 'media' :
                $max = 99;
                break;
            case 'dificil' :
                $max = 999;
                break;
        }
        for($i=0;$i<10;$i++){
            $suma = new Sumas(rand(0, $max), rand(0, $max));
            array_push($partida, $suma);
        }
        return $partida;
    }

}
