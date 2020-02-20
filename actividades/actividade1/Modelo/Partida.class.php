<?php
    // BreoBeceiro:20/02/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    class Partida{
        // Non é preciso dispoñer dun atributo $xogador porque no momento en que comece a partida
        //   éste vai a estar na sesión.
        private $puntos;
        private $data;

        public function __construct($data){
            $this->data= $data;
        }
    }