<?php
    // BreoBeceiro:20/02/2020
    // PROXECTO 2º AVALIACIÓN | Versión 1.0

    class Xogador{
        private $codigo;
        private $usuario;
        private $contrasinal;
        public $puntos;
        public $partidasGanadas;
        public $partidasPerdidas;

        public function __construct($id, $user, $passw){
            $this->codigo= $id;
            $this->usuario= $user;
            $this->contrasinal= $passw;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function getContrasinal(){
            return $this->contrasinal;
        }
    }

?>