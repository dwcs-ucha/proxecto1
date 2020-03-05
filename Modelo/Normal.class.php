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

    function __construct($nome, $contrasinal) {
      $this->nome = $nome;
      $this->contrasinal = $contrasinal;
      $this->rol = 0;
    }

  }

?>
