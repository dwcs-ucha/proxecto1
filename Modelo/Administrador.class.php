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

    function __construct($nome, $contrasinal, $dataAlta) {
      $this->nome = $nome;
      $this->contrasinal = $contrasinal;
      $this->rol = self::ROL_ADMINISTRADOR;
      $this->dataAlta = $dataAlta;
      $this->bloqueado = 0;
    }

    function toString() {
      return 'Nome: '.$this->nome.'<br>Rol: Administrador<br>Data de alta: '.$this->dataAlta;
    }

    function modificarPrivilexios(Usuario $usuario, $novoRol) {
      $usuario->rol = $novoRol;
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $valores = [$usuario->rol];
      DAO::modificarDatos("usuarios", $campos, $valores);
    }

    function eliminarUsuario(Usuario $usuario) {
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $valores = [$usuario->nome, $usuario->contrasinal, $usuario->rol];
      $campos = ["nome", "contrasinal", "rol"];
      $valores = [$usuario->nome, $usuario->contrasinal, $usuario->rol];
      DAO::borrarDatos("usuarios", $campos, $valores);
    }

    function bloquearUSuario(Usuario $usuario, $novoEstado) {
      $usuario->bloqueado = $novoEstado;
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $valores = [$usuario->bloqueado];
      DAO::modificarDatos("usuarios", $campos, $valores);
    }

  }

?>
