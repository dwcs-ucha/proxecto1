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
<<<<<<< HEAD
      $this->rol = 0;
      $this->dataAlta = $dataAlta;
      $this->bloqueado = $bloqueado;
    }

    function toString() {
      return 'Nome: '.$this->nome.'<br>Rol: Usuario<br>Data de alta: '.$this->dataAlta.'<br>Bloqueado: '.$this->bloqueado;
    }

    function estaBloqueado() {
      return $this->bloqueado;
=======
      $this->rol = self::ROL_NORMAL;
>>>>>>> 92cb28538536f7d8475b1c23a778056bceecc9c6
    }

  }

?>
