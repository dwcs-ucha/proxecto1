<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 12/03/2020
* @UltimaModificacion: 12/03/2020
* @Version: 0.0.9b
**/

/**
 *
 */
class Partida {

  public $usuario;
  public $baralla;
  public $data;
  public $puntuacion;

  function __construct(Usuario $usuario, Baralla $baralla, $data)  {
    $this->usuario = $usuario;
    $this->baralla = $baralla;
    $this->data = $data;
    $this->$puntuacion = 0;
  }

  function setPuntuacion($puntuacion) {
    $this->puntuacion = $puntuacion;
  }

}

?>
