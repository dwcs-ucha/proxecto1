<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 03/03/2020
* @UltimaModificacion: 03/03/2020
* @Version: 0.0.9b
**/

  /**
   *
   */
  class Baralla {
    private $cartas;

    function __construct(Array $cartas) {
      $this->cartas = $cartas;
    }

    function obterCartas() {
      return $this->cartas;
    }

  }

?>
