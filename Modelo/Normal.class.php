<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 05/03/2020
* @UltimaModificacion: 05/03/2020
* @Version: 0.0.1b
**/

  /**
   *
   */
  class Normal extends Usuario {

    function __construct($nome, $contrasinal, $dataAlta, $bloqueado) {
      $this->nome = $nome;
      $this->contrasinal = $contrasinal;
      $this->rol = 0;
      $this->dataAlta = $dataAlta;
      $this->bloqueado = $bloqueado;
    }

    function toString() {
      return 'Nome: '.$this->nome.'<br>Rol: Usuario<br>Data de alta: '.$this->dataAlta.'<br>Bloqueado: '.$this->bloqueado;
    }

    function estaBloqueado() {
      return $this->bloqueado;
    }

  }

?>
