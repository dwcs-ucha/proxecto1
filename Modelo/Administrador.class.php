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
  class Administrador extends Usuario {

    function __construct($nome, $contrasinal) {
      $this->nome = $nome;
      $this->contrasinal = $contrasinal;
      $this->rol = 1;
    }

    function modificarPrivilexios(Usuario $usuario, $novoRol) {
      usuario->rol = $novoRol;
      $campos = ["nome", "contrasinal", "rol"];
      $valores = [usuario->rol];
      DAO::modificarDatos("usuarios", $campos, $valores);
    }

    function eliminarUsuario(Usuario $usuario) {
      $campos = ["nome", "contrasinal", "rol"];
      $valores = [usuario->nome, usuario->contrasinal, usuario->rol];
      DAO::borrarDatos("usuarios", $campos, $valores);
    }

  }

?>
