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
  class Carta {

    private $ruta;
    public $tema;

    function __construct($ruta, $tema) {
      $this->ruta = $ruta;
      $this->tema = $tema;
    }

    function verRuta() {
      return $this->ruta;
    }

  }

?>
