<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 04/03/2020
* @UltimaModificacion: 05/03/2020
* @Version: 0.0.1b
**/

  /**
   *
   */
  class Usuario {
    const ROL_NORMAL = 0;
    const ROL_ADMINISTRADOR = 1;
    private $nome;
    private $contrasinal;
    private $rol;

    function insertarNovoUsuario(Usuario $usuario) {
      $usuario->contrasinal = (crypt($this.contrasinal, '*L0saluMnosTheDAWm0L4n!'));
      $campos = ["nome", "contrasinal", "rol"];
      $valores = [$usuario->nome, $usuario->contrasinal, $usuario->rol];
      DAO::escribirDatos("usuarios", $campos, $valores);
    }

  }

?>
